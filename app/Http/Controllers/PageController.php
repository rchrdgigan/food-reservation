<?php

namespace App\Http\Controllers;
use App\Models\{Business,FoodPackage,Food,Link};
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function mainPage()
    {

        $business = Business::first();
        $link = Link::first();
        $foods = Food::get();
        $foods_desert = Food::where('categories', 'Desert')->get();
        return view('homepage',compact('business','link','foods','foods_desert'));
    }
}
