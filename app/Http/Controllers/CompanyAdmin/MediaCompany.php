<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Media;
use App\Company;
use Image;

class MediaCompany extends Controller
{
    public function showMedia()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::where('id', $company_id)->firstOrFail();
        $media = Media::whereHas('company', function ($query) use($company_id) {
            return $query->where('id', $company_id);
        })->paginate(20);

        return view('CompanyAdmin.media', compact('media','company'));
    }
    public function addMedia(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'unique:products', 'max:255', 'min:10'],
            'description' => 'required',
            'foto' => 'file|image|max:3072'
        ]);

        $path="public/product/defaultProduct.jpg";
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $image = $request->file('foto');
            $path = 'public/product/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(800,687)->save('storage/app/'.$path);
        }
    }
}
