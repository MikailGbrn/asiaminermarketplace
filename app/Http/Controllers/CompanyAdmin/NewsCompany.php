<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Company;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsCompany extends Controller
{
    public function showNews(Request $request)
    {
        $keyword = '%'.$request->input('kw').'%';
        $company_id = Auth::guard('admin-company')->user()->company_id;

        $query = News::where('company_id',$company_id);
        
        if(!empty($keyword)){
            $query->where('title','like',$keyword);
            //->orWhere('keyword','like',$keyword);
        }

        $news = $query->paginate(5);

        return view('CompanyAdmin.news', compact('news'));
    }
    public function showEditNews($id)
    {
        $news = News::where('id', $id)->firstOrFail();
        $company_id = Auth::guard('admin-company')->user()->company_id;
        if ($news->company_id !== $company_id) {
            return redirect()->back();
        }
        return view('CompanyAdmin.edit-news',compact('news'));
    }
    public function editNews(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'unique:news,title,'.$request->input('id'), 'max:255', 'min:10'],
            'description' => 'required',
            'topic' => 'required',
            'author' => 'required',
            'location' => 'required',
            'abstract' => 'required|max:255',
            'photo' => 'file|image|max:3072'
        ]);
        $news = News::find($request->input('id'));

        $path = $news->photo;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $path = 'public/news/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(1000,700)->save('storage/app/'.$path);
        }

        $news->title = $request->input('title');
        $news->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('title'))));
        $news->company_id = Auth::guard('admin-company')->user()->company_id;
        $news->photo = $path;
        $news->author = $request->input('author');
        $news->topic = $request->input('topic');
        $news->location = $request->input('location');
        $news->abstract = $request->input('abstract');
        $news->description = $request->input('description');
        $news->save();

        return redirect('company-profile/news');
    }
    public function showAddNews(Request $request)
    {
        return view('CompanyAdmin.add-news');
    }
    public function addNews(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'unique:news', 'max:255', 'min:10'],
            'description' => 'required',
            'topic' => 'required',
            'author' => 'required',
            'location' => 'required',
            'abstract' => 'required|max:255',
            'photo' => 'file|image|max:3072'
        ]);

        $path = "public/news/defaultProduct.jpg";
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $path = 'public/news/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(1000,700)->save('storage/app/'.$path);
        }
        $news = new News;
        $news->title = $request->input('title');
        $news->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('title'))));
        $news->company_id = Auth::guard('admin-company')->user()->company_id;
        $news->photo = $path;
        $news->author = $request->input('author');
        $news->topic = $request->input('topic');
        $news->location = $request->input('location');
        $news->abstract = $request->input('abstract');
        $news->description = $request->input('description');
        $news->save();

        return redirect('company-profile/news');
    }
    public function deleteNews(Request $request)
    {
        $news = News::find($request->input('id'));

        $company_id = Auth::guard('admin-company')->user()->company_id;
        if ($news->company_id !== $company_id) {
            return redirect('company-profile/news');
        }
        
        if ($news->photo !== "public/news/defaultProduct.jpg") {
            Storage::delete($news->photo);
        }
        $news->delete();
    }
}
