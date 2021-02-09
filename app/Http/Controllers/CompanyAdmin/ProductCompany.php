<?php

namespace App\Http\Controllers\CompanyAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Product;
use App\PCategory;
use App\ProductPicture;
use App\Company;
use Image;
use Illuminate\Support\Facades\Storage;

class ProductCompany extends Controller
{
    public function showProduct(Request $request)
    {
        $keyword = '%'.$request->input('kw').'%';
        $company_id = Auth::guard('admin-company')->user()->company_id;

        $query = Product::where('company_id',$company_id);

        
        if(!empty($keyword)){
            $query->where('name','like',$keyword);
        }
        $product = $query->paginate(5);
        
        return view('CompanyAdmin.product', compact('product'));
    }
    public function showAddProduct()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $catagory = PCategory::all();
        return view('CompanyAdmin.add-product', compact('catagory'));
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
            $img->save('storage/app/'.$path);
        }

        $product = new Product;
        $product->name = $request->input('name');
        $product->catagory_id = 1;
        $product->photo = $path;
        $product->view = 0;
        $product->embedvid = $request->input('video');
        $product->company_id = Auth::guard('admin-company')->user()->company_id;
        $product->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('name'))));
        $product->description = $request->input('description');;
        $product->save();

        if ($request->hasFile('photo') ) {
            foreach ($request->file('photo') as $file) {
                if ($file->isValid()) {
                    $image = $file;
                    $imgpath = 'public/productimg/'.(string) Str::uuid().'.'.$image->extension();
                    $img = Image::make($image->path());
                    $img->save('storage/app/'.$imgpath);
                    $product->picture()->create([
                        'photo' => $imgpath
                    ]);
                }
            }  
        }

        $product->category()->sync($request->input('catagory'));

        return redirect('company-profile/product');
    }
    public function showEditProduct($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $catagory = PCategory::all();
        $picture = ProductPicture::where('product_id', $product->id)->get();
        if ($product->company_id !== $company_id) {
            return redirect()->back();
        }
        return view('CompanyAdmin.edit-product',compact('product', 'picture', 'catagory'));
    }
    public function editProduct(Request $request)
    {
        $this->validate($request,[
            'name' => ['required','unique:products,name,'.$request->input('id'), 'max:255', 'min:10'],
            'description' => 'required',
            'foto' => 'file|image|max:3072'
        ]);
        $Product = Product::find($request->input('id'));

        $company_id = Auth::guard('admin-company')->user()->company_id;
        if ($Product->company_id !== $company_id) {
            return redirect()->back();
        }

        $path=$Product->photo;
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if ($path !== "public/product/defaultProduct.jpg") {
                Storage::delete($path);
            }
            $image = $request->file('foto');
            $path = 'public/product/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->save('storage/app/'.$path);
        }


        $Product->name = $request->input('name');
        $Product->catagory_id = 1;
        $Product->photo = $path;
        $Product->view = 0;
        $Product->embedvid = $request->input('video');
        $Product->company_id = Auth::guard('admin-company')->user()->company_id;
        $Product->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('name'))));
        $Product->description = $request->input('description');;
        $Product->save();

        $Product->category()->sync($request->input('catagory'));

        return redirect('company-profile/product');
    }
    public function deleteProduct(Request $request)
    {
        $product = Product::find($request->input('id'));

        $company_id = Auth::guard('admin-company')->user()->company_id;
        if ($product->company_id !== $company_id) {
            return redirect()->back();
        }
        
        if ($product->photo !== "public/product/defaultProduct.jpg") {
            Storage::delete($product->photo);
        }

        $picture = ProductPicture::select('photo')->where('product_id',$request->input('id'))->get();
        foreach($picture as $p){
            Storage::delete($p->photo);
        }

        $deletepic = ProductPicture::where('product_id', $request->input('id'))->get();
        foreach ($deletepic as $del) {
            $del->delete();
        }

        $product->delete();
        return redirect('company-profile/product');
    }

        public function deletePicture(Request $request)
    {
        $picture = ProductPicture::where('id', $request->input('id'));
        $picture->delete();
        return redirect()->back()->with(['success' => 'Your account information has been update']);

    }
        public function addPicture(Request $request)
    {
        $product = Product::find($request->input('id'));

        if ($request->hasFile('photo') ) {
            foreach ($request->file('photo') as $file) {
                if ($file->isValid()) {
                    $image = $file;
                    $imgpath = 'public/productimg/'.(string) Str::uuid().'.'.$image->extension();
                    $img = Image::make($image->path());
                    $img->save('storage/app/'.$imgpath);
                    $product->picture()->create([
                        'photo' => $imgpath
                    ]);
                }
            }  
        }

        return redirect()->back()->with(['success' => 'Your account information has been update']);

    }
}
