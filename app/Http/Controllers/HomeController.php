<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){
        return view('home');

    }
    public function about ()
    {
        return view('about');
    }
    public function skillset ()
    {
        return view('skillset');
    }
}
