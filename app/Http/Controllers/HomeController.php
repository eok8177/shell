<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Page;
use App\Message;

class HomeController extends Controller
{
    public function index()
    {
        return view('home',[
            'banners' => Banner::where('show', 1)->get(),
            'left_text' => Page::where('slug', 'left-text')->first(),
            'right_text' => Page::where('slug', 'right-text')->first(),
            'header_left' => Page::where('slug', 'header-left')->first(),
            'header_right' => Page::where('slug', 'header-right')->first(),
            'footer' => Page::where('slug', 'footer')->first(),
            'popup' => Page::where('slug', 'pop-up')->first(),
            'messages' => Message::pluck('value', 'key')
        ]);
    }
}
