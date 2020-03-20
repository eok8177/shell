<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Code;
use App\Message;

class CodeController extends Controller
{
    public function index()
    {
        return response()->json([
            'type' => 'Get',
            'status' => 'OK',
        ], 200);
    }

    public function check(Request $request)
    {
        $messages = Message::pluck('value', 'key');

        $code = $request->get('code', 0);
        $res = Code::where('code',$code)->first();
        if ($res) {
            if ($res->used == 1) {
                $msg = $messages['code_used'];
            } else {
                $msg = $messages['code_success'];
                $res->used = 1;
                $res->save();
            }
        } else {
            $msg = $messages['code_wrong'];
        }

        return response()->json([
            'msg' => $msg
        ], 200);
    }
}
