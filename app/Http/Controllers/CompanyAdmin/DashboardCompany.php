<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardCompany extends Controller
{
    public function index()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::where('id', $company_id)->firstOrFail();
        return view('CompanyAdmin.dashboard', compact('company'));
    }
    public function showEditCompany()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::where('id', $company_id)->firstOrFail();
        return view('CompanyAdmin.edit-company', compact('company'));
    }
    public function editCompany(Request $request)
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::find($company_id);

        $path=$company->header;
        if ($request->hasFile('header') && $request->file('header')->isValid()) {
            if ($path !== "public/header/default.jpeg") {
                Storage::delete($path);
            }
            $image = $request->file('header');
            $path = 'public/header/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(1200,400)->save('storage/app/'.$path);
        }

        $path1=$company->logo;
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            if ($path1 !== "public/logo/default.jpg") {
                Storage::delete($path1);
            }
            $image1 = $request->file('logo');
            $path1 = 'public/logo/'.(string) Str::uuid().'.'.$image1->extension();
            $img1 = Image::make($image1->path());
            $img1->fit(500,500)->save('storage/app/'.$path1);
        }

        $company->logo = $path1;
        $company->header = $path;
        $company->description = $request->input('description');
        $company->website = $request->input('website');
        $company->business_hour = $request->input('business_hour');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->save();

        return redirect('company-profile')->with(['success' => 'Edit company profile successfully']);
    }
    public function editAbout(Request $request)
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::find($company_id);
        $company->about = $request->input('about');
        $company->save();
        return redirect()->back()->with(['success' => 'Edit about company successfully']);
    }
}
