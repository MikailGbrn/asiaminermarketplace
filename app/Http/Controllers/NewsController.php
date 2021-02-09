<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsLocations;

class NewsController extends Controller
{
	public function find(Request $request)
    {   

        $query = News::select("news.*", "companies.subscription")->where('news.status',1)->join('companies','company_id','=','companies.id')->orderBy('companies.subscription', 'DESC')->orderBy('news.id', 'DESC')->paginate(20);
        $news = $query;
        
       return view('news', compact('news'));

    }
    public function detail($companyId,$slug)
    {
        $news = News::where('slug',$slug)->where('company_id',$companyId)->where('status',1)->firstOrFail();
        $location = NewsLocations::where('news_id',$news->id)->firstOrFail();
        $relatedNews = News::where("company_id",$companyId)->limit(2)->get();

        return view('company_news_detail', compact('relatedNews','news','location'));
    }
}
