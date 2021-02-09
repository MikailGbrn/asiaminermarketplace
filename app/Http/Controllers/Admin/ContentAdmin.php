<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \App\Mail\MailTakeDown;
use \App\Mail\MailReminderSubscription;

class ContentAdmin extends Controller
{
    public function showProduct()
    {
        $product = \App\Product::all()->sortByDesc('id');
        $project = \App\Project::all();

        return view('admin.list-product', compact('product', 'project'));
    }
    public function takedownProduct(Request $request)
    {
        $product = \App\Product::find($request->input('id'));
        $company = \App\Company::find($product->company_id);
        if ($product->status == 1) {
            $product->status = 0;

            $data = [
                "content" =>  "Product",
                "productname" => $product->name,                
            ];

            Mail::to($company->admin->email)->send(new MailTakeDown($data));
        }else{
            $product->status = 1;
        }
        $product->save();
        return redirect('administrator/product');
    }
    public function showMedia()
    {
        $media = \App\Media::all()->sortByDesc('id');
        return view('admin.list-media', compact('media'));
    }
    public function takedownMedia(Request $request)
    {
        $media = \App\Media::find($request->input('id'));
        if ($media->status == 1) {
            $media->status = 0;
        }else{
            $media->status = 1;
        }
        $media->save();
        return redirect('administrator/media');
    }
    public function showNews()
    {
        $news = \App\News::all()->sortByDesc('id');
        return view('admin.list-news', compact('news'));
    }
    public function takedownNews(Request $request)
    {
        $news = \App\News::find($request->input('id'));
        if ($news->status == 1) {
            $news->status = 0;
        }else{
            $news->status = 1;
        }
        $news->save();
        return redirect('administrator/news');
    }
    public function showProject()
    {
        $project = \App\Project::all()->sortByDesc('id');
        return view('admin.list-project', compact('project'));
    }
    public function takedownProject(Request $request)
    {
        $project = \App\Project::find($request->input('id'));
        if ($project->status == 1) {
            $project->status = 0;
        }else{
            $project->status = 1;
        }
        $project->save();
        return redirect('administrator/project');
    }
}
