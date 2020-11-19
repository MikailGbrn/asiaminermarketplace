<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Media;
use App\Company;
use App\MCatagory;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MediaCompany extends Controller
{

    public function showMedia(Request $request)
    {
        $keyword = '%'.$request->input('kw').'%';
        $company_id = Auth::guard('admin-company')->user()->company_id;

        $query = Media::where('company_id',$company_id);

        
        if(!empty($keyword)){
            $query->where('title','like',$keyword);
        }

        $media = $query->orderBy('id', 'DESC')->paginate(5);

        return view('CompanyAdmin.media', compact('media'));
    }
    public function showEditMedia($id)
    {
        $media = Media::where('id', $id)->firstOrFail();
        $catagory = MCatagory::all();
        $company_id = Auth::guard('admin-company')->user()->company_id;
        if ($media->company_id !== $company_id) {
            return redirect()->back();
        }
        return view('CompanyAdmin.edit-media',compact('media','catagory'));
    }
    public function editMedia(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'unique:media,title,'.$request->input('id'), 'max:255', 'min:10'],
            'description' => 'required',
            'photo' => 'file|image|max:3072'
        ]);
        $media = Media::find($request->input('id'));

        $company_id = Auth::guard('admin-company')->user()->company_id;
        if ($media->company_id !== $company_id) {
            return redirect()->back();
        }

        $path=$media->photo;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            if ($path !== "public/media/defaultProduct.jpg") {
                Storage::delete($path);
            }
            $image = $request->file('photo');
            $path = 'public/media/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(500,500)->save('storage/app/'.$path);
        }

        $path1=$media->file_name;
        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            if ($path1 !== "resource/default.txt") {
                Storage::delete($path1);
            }
            $path1 = $request->file('media')->store('resource');
        }

        $media->title = $request->input('title');
        $media->photo = $path;
        $media->file_name = $path1;
        $media->uuid = (string) Str::uuid();
        $media->author = $request->input('author');
        $media->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('title'))));
        $media->keyword = $request->input('keyword');
        $media->description = $request->input('description');
        $media->type = $request->input('media_type');
        $media->save();

        $media->catagory()->sync($request->input('catagory'));

        return redirect('company-profile/media');
    }
    public function deleteMedia(Request $request)
    {
        $media = Media::find($request->input('id'));

        $company_id = Auth::guard('admin-company')->user()->company_id;
        if ($media->company_id !== $company_id) {
            return redirect()->back();
        }
        
        if ($media->photo !== "public/media/defaultProduct.jpg") {
            Storage::delete($media->photo);
        }
        $media->delete();
        return redirect('company-profile/media');
    }
    public function showAddMedia()
    {
        $catagory = MCatagory::all();
        return view('CompanyAdmin.add-media', compact('catagory'));
    }
    public function addMedia(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'unique:media', 'max:255', 'min:10'],
            'description' => 'required',
            'photo' => 'file|image|max:3072'
        ]);

        $path = "public/media/defaultProduct.jpg";
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $path = 'public/media/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(500,500)->save('storage/app/'.$path);
        }

        $path1=null;
        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            $path1 = $request->file('media')->store('resource');
        }

        $media = new Media;
        $media->title = $request->input('title');
        $media->company_id = Auth::guard('admin-company')->user()->company_id;
        $media->photo = $path;
        $media->uuid = (string) Str::uuid();
        $media->file_name = $path1;
        $media->author = $request->input('author');
        $media->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('title'))));
        $media->keyword = "";
        $media->description = $request->input('description');
        $media->content_type = "mining";
        $media->type = $request->input('media_type');
        $media->link = $request->input('link');
        $media->view = 0;
        $media->download = 0;
        $media->save();

        $media->catagory()->sync($request->input('catagory'));

        return redirect('company-profile/media');

    }
}
