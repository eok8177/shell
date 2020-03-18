<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

use Storage;

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
            'codes' => 'required|mimes:csv,xls,xlsx,txt|max:500000'
        ]);

        Excel::import(new CodesImport, request()->file('codes'));

        return redirect()->route('admin.code.index')->with('success', 'Codes imported');
    }

    public function delDuplicates()
    {
        DB::delete('DELETE c1 FROM codes c1 INNER JOIN codes c2 WHERE c1.id > c2.id AND c1.code = c2.code');
        return redirect()->route('admin.code.index')->with('success', 'Codes cleared');
    }

    public function importFile($file)
    {
        $host = env('DB_HOST', '127.0.0.1');
        $base = env('DB_DATABASE', 'shell');
        $user = env('DB_USERNAME', 'root');
        $pass = env('DB_PASSWORD', 'root');

        $connect = 'mysql -h '.$host.' -u '.$user.' -p'.$pass;
        $comand = 'LOAD DATA LOCAL INFILE \"'.realpath($file).'\" INTO TABLE codes FIELDS TERMINATED by \',\' LINES TERMINATED BY \'\n\' (code);';

        echo exec($connect.' -e "USE '.$base.'; '.$comand.'"');
        echo "OK";
        return;
    }
}