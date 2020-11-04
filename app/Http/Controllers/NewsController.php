<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function detail($companyId,$slug)
    {
        $news = News::where('slug',$slug)->where('company_id',$companyId)->firstOrFail();
        $relatedNews = News::where("company_id",$companyId)->limit(2)->get();

        return view('company_news_detail', compact('relatedNews','news'));
    }
}
