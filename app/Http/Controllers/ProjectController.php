<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\product;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function detail($companyId,$slug)
    {
        $news = Project::where('slug',$slug)->where('company_id',$companyId)->where('status',1)->firstOrFail();
        $relatedNews = Project::where("company_id",$companyId)->limit(2)->get();
        $product = Product::where('id',"=",$news->product_id)->firstOrFail();

        return view('company_project_detail', compact('product','relatedNews','news'));
    }
}
