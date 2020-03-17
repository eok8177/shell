<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Code;
use App\Imports\CodesImport;


class CodeController extends Controller
{
    public function index()
    {
        return view('admin.code.index', [
            'codes' => Code::paginate(10)
        ]);
    }

    public function destroy(Code $code)
    {
        $code->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function add()
    {
        return view('admin.code.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'codes' => 'required|mimes:csv,xls,xlsx,txt'
        ]);

        // $file = file($request->file('codes')->getRealPath());
        // dd($file);
        // exit();

        Excel::import(new CodesImport, request()->file('codes'));

        return redirect()->route('admin.code.index')->with('success', 'Codes imported');
    }
}