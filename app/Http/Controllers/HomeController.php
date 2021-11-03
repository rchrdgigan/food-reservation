<?php

namespace App\Http\Controllers;
use App\Models\{Business,Food,Link};
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $business = Business::first();
        $link = Link::first();
        $foods = Food::get();
        return view('home',compact('business','link','foods'));
    }
 
}

