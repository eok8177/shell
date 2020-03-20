<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.message', [
            'messages' => Message::all(),
        ]);
    }


    public function update(Request $request)
    {
        Message::updateMessages($request->except('_token'));
        return redirect()->route('admin.messages')->with('success', 'Updated');
    }

}
