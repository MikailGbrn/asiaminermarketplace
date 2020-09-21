<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

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
            $query->where('catagory','=',$catagory);
        }
        $company = $query->paginate(20);

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
    public function detail($slug)
    {       
        
    }
}
