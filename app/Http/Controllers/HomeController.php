<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class HomeController extends Controller
{
    public function index()
    {
        return view('home',[
            'banners' => Banner::all()
        ]);
    }
}
