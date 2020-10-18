<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Media;
use App\Product;
use App\CCatagory;

class CompanyController extends Controller
{
    public function show()
    {
       $company = Company::paginate(20);
       foreach ($company as $c){
            echo $c->name." <br>";
            echo $c->email." <br>";
            echo $c->business_hour." <br>";
            foreach ($c->address as $a){
                echo $a->address." <br>";
            }
            
            echo "<br>";
            echo "<br>";
            echo "<br>";
            
       }
    }
    public function find(Request $request)
    {       
        $keyword = '%'.$request->input('kw').'%';
        $catagory = $request->input('cat');

        $query = Company::with('address')->where('name','like',$keyword);
        
        if(!empty($catagory)){
            $query->where('catagory_id','=',$catagory);
        }
        $company = $query->paginate(21);
        $catList = CCatagory::all();

       return view('directory',compact('company','catList'));

    }
    public function detail($slug)
    {       
        $company = Company::where('slug',$slug)->firstOrFail();
        return view('detail-directory', compact('company'));
    }
    public function showCompanyMedia($slug)
    {
        $company = Company::where('slug',$slug)->firstOrFail();
        $media = Media::whereHas('company', function ($query) use($slug) {
            return $query->where('slug', $slug);
        })->paginate(8);
        
        return view('company_media', compact('media','company'));
    }
    public function showCompanyProduct($slug)
    {
        $company = Company::where('slug',$slug)->firstOrFail();
        $product = Product::whereHas('company', function ($query) use($slug) {
            return $query->where('slug', $slug);
        })->paginate(20);
        
        return view('company_product', compact('product','company'));
    }
}
