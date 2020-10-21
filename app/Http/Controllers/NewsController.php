<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function show($id)
    {
        $news = News::where('company_id',$id)->paginate(10);

    }
    public function detail($slug)
    {
        
    }
}
