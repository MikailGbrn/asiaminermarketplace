<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function detail($companyId,$slug)
    {
        $news = Project::where('slug',$slug)->where('company_id',$companyId)->firstOrFail();
        $relatedNews = Project::where("company_id",$companyId)->limit(2)->get();

        return view('company_project_detail', compact('relatedNews','news'));
    }
}
