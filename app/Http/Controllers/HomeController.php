<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Page;

class HomeController extends Controller
{
    public function index()
    {
        return view('home',[
            'banners' => Banner::where('show', 1)->get(),
            'left_text' => Page::where('slug', 'left-text')->first(),
            'right_text' => Page::where('slug', 'right-text')->first(),
        ]);
    }
}
