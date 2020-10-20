<?php

namespace App\Http\Controllers\CompanyAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Company;

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
            'name' => ['required', 'unique:products', 'max:255'],
            'description' => 'required',
        ]);

        $path="public/product/defaultProduct.jpg";
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $path = $request->file('foto')->store('public/product');
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

        return redirect();
    }
}
