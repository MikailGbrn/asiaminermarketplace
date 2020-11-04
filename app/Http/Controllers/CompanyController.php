<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Media;
use App\Product;
use App\News;
use App\CCatagory;
use App\Project;

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
        $company = $query->orderBy('id', 'DESC')->paginate(21);
        $catList = CCatagory::all();

       return view('directory',compact('company','catList'));

    }
    public function detail($slug)
    {       
        $company = Company::where('slug',$slug)->firstOrFail();
        $product = Product::where('company_id',$company->id)->limit(6)->get();
        $media = Media::where('company_id',$company->id)->limit(6)->get();
        
    

        $timeline =  DB::select("
            (SELECT name, photo, slug, view, description, null as download, 'product' as type, updated_at from products where company_id = '$company->id')
            UNION
            (SELECT title, photo, slug, view, description, download, 'media' as type, updated_at from media where company_id = '$company->id')
            order by updated_at limit 20
        ");
        return view('detail-directory', compact('company','media','product','timeline'));
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
    public function showCompanyNews($slug)
    {
        $company = Company::where('slug',$slug)->firstOrFail();
        $news = News::where('company_id', $company->id)->paginate(20);
        
        return view('company_news', compact('news','company'));
    }

    public function showCompanyProject($slug)
    {
        $company = Company::where('slug',$slug)->firstOrFail();
        $project = Project::where('company_id', $company->id)->paginate(20);
        
        return view('company_project', compact('project','company'));
    }
    public function showCompanyAbout($slug)
    {
        $company = Company::where('slug',$slug)->firstOrFail();
        return view('company_about', compact('company'));
    }
}
