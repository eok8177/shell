<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Banner;


class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banner.index', [
            'banners' => Banner::all()
        ]);
    }

    public function create()
    {
        return view('admin.banner.create', ['banner' => new Banner]);
    }

    public function store(Request $request, Banner $banner)
    {
        $banner = $banner->create($request->all());

        return redirect()->route('admin.banner.index')->with('success', 'Banner created');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    public function update(Request $request, Banner $banner)
    {
        $banner->update($request->all());

        return redirect()->route('admin.banner.edit', ['banner' => $banner->id])->with('success', 'Banner updated');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

}