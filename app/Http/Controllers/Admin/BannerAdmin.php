<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Banner;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannerAdmin extends Controller
{
    public function showBanner()
    {
        $banner = Banner::all();
        return view('admin.list-banner', compact('banner'));
    }
    public function addBanner(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'max:255'],
            'photo' => 'file|image|max:3072|required'
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $path = 'public/banner/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(1280,500)->save('storage/app/'.$path);
        }
        $banner = new Banner;
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->photo = $path;
        $banner->type = "Homepage";
        $banner->save();

        return redirect('administrator/banner');
    }
    public function editBanner(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'max:255'],
            'photo' => 'file|image|max:3072'
        ]);
        $banner = Banner::find($request->input('id'));
        $path = $banner->photo;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $path = 'public/banner/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(1280,500)->save('storage/app/'.$path);
        }
        
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->photo = $path;
        $banner->type = "Homepage";
        $banner->save();

        return redirect('administrator/banner');
    }
    public function deleteBanner(Request $request)
    {
        $banner = Banner::find($request->input('id'));
        Storage::delete($banner->photo);
        $banner->delete();
        return redirect('administrator/banner');
    }
}
