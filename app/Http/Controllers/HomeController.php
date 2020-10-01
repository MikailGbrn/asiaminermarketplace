<?php

namespace App\Http\Controllers;

use App\MCatagory;
use Illuminate\Http\Request;

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
        return view('homee',compact('MCatagory'));
    }
}
