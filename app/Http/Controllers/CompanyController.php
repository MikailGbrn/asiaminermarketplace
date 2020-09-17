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
            echo "<br>";
            
       }
    }
    public function find(Request $request)
    {       
        
    }
    public function detail($slug)
    {       
        
    }
}
