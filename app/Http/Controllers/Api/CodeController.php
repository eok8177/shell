<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Code;

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
        $code = $request->get('code', 0);
        $res = Code::where('code',$code)->first();

        return response()->json([
            'msg' => $res ? 'Поздравляем! Товар подлинный' : 'Нет такого кода'
        ], 200);
    }
}
