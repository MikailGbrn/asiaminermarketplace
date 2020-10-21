<?php

namespace App\Http\Controllers\CompanyAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Product;
use App\Company;
use Image;

class ProductCompany extends Controller
{
    public function showProduct()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::where('id', $company_id)->firstOrFail();
        $product = Product::whereHas('company', function ($query) use($company_id) {
            return $query->where('id', $company_id);
        })->paginate(20);
        
        return view('CompanyAdmin.product', compact('product','company'));


        
    }
    public function addProduct(Request $request)
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

        $product = new Product;
        $product->name = $request->input('name');
        $product->catagory_id = 1;
        $product->photo = $path;
        $product->view = 0;
        $product->company_id = Auth::guard('admin-company')->user()->company_id;
        $product->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('name'))));
        $product->description = $request->input('description');;
        $product->save();

        return redirect('company-profile/product');
    }
}
