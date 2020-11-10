<?php

namespace App\Http\Controllers;

use App\MCatagory;
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
        //$this->middleware('auth');
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
        return view('homee',compact('MCatagory'));
    }
    public function contact()
    {
        return view('contact');
    }
}
