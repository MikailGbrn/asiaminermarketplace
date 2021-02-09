<?php

namespace App\Http\Controllers;

use App\MCatagory;
use App\Media;
use App\News;
use App\Product;
use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // , ['except' => ['index', 'show']]
        $this->middleware(['auth', 'verified'], ['except' => ['index', 'show']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $MCatagory = MCatagory::all();
        // $timeline =  DB::select("
        //     (SELECT p.name as title, c.name , c.slug as Cslug, company_id, photo, p.slug, p.description, 'product' as type, p.created_at from products p join companies c on c.id = company_id)
        //     UNION
        //     (SELECT title, c.name, c.slug as Cslug, company_id, photo, m.slug, m.description, 'resource' as type, m.created_at from media m join companies c on c.id = company_id)
        //     UNION
        //     (SELECT title, c.name, c.slug as Cslug, company_id, photo, n.slug, n.abstract, 'news' as type, n.created_at from news n join companies c on c.id = company_id )
        //     UNION
        //     (SELECT title, c.name, c.slug as Cslug, company_id, photo, t.slug, t.description, 'project' as type, t.created_at from projects t join companies c on c.id = company_id)
        //     order by created_at desc limit 6
        // ");
        $media = Media::with('company')->select("media.*", "companies.subscription")
        ->where('media.status',1)
        ->join('companies','company_id','=','companies.id')
        ->orderBy('companies.subscription', 'DESC')->orderBy('media.id', 'DESC')
        ->limit(4)
        ->get();

        $news = News::with('company')->select("news.*", "companies.subscription")
        ->where('news.status',1)
        ->join('companies','company_id','=','companies.id')
        ->orderBy('companies.subscription', 'DESC')->orderBy('news.id', 'DESC')
        ->limit(3)
        ->get();

        $product = Product::select("products.*", "companies.subscription")
        ->where('products.status',1)
        ->join('companies','company_id','=','companies.id')
        ->orderBy('companies.subscription', 'DESC')
        ->orderBy('products.id', 'DESC')
        ->limit(3)
        ->get();

        $project = Project::select("projects.*", "companies.subscription")
        ->where('projects.status',1)
        ->join('companies','company_id','=','companies.id')
        ->orderBy('companies.subscription', 'DESC')
        ->orderBy('projects.id', 'DESC')
        ->limit(3)
        ->get();

        $company = Company::where('logo',"!=",'public/logo/default.jpg')->limit(10)->get();

        return view('homee',compact('MCatagory','media','product','company', 'news', 'project'));
    }
    public function contact()
    {
        return view('contact');
    }
}
