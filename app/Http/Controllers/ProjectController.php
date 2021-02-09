<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectLocation;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
        public function find(Request $request)
    {   

        $query = Project::select("projects.*", "companies.subscription")->where('projects.status',1)->join('companies','company_id','=','companies.id')->orderBy('companies.subscription', 'DESC')->orderBy('projects.id', 'DESC')->paginate(20);
        $project = $query;
       return view('project', compact('project'));

    }
    public function detail($companyId,$slug)
    {
        $news = Project::where('slug',$slug)->where('company_id',$companyId)->where('status',1)->firstOrFail();
        $relatedNews = Project::where("company_id",$companyId)->limit(2)->get();
        $location = ProjectLocation::where('project_id',$news->id)->firstOrFail(); 
        
        if (!empty($news->embedvid)) {
        $embed = explode("=", $news->embedvid);
        }else {
        $embed = array('0' => 1, '1' => 1 );
        }

        return view('company_project_detail', compact('relatedProduct','relatedNews','news','embed','location'));
    }
}
