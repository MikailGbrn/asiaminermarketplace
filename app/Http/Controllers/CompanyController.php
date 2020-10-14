<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Media;
use APp\Prodcut;
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

    //     foreach ($company as $c){
    //         echo $c->name." <br>";
    //         echo $c->email." <br>";
    //         echo $c->business_hour." <br>";
    //         foreach ($c->address as $a){
    //             echo $a->address." <br>";
    //         }
    //         echo "<a href='".url("/company/$c->slug")."'>tombol</a>";
    //         echo "<br>";
    //         echo "<br>";
    //         echo "<br>";
            
    //    }
       return view('directory',compact('company','catList'));

    }
    public function detail($slug)
    {       
        $company = Company::where('slug',$slug)->firstOrFail();
        return view('detail-directory', compact('company'));
    }
    public function showCompanyMedia()
    {
        # code...
    }
    public function showComapanyProduct()
    {
        # code...
    }
}
