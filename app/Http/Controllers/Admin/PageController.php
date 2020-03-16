<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Page;


class PageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', false);

        $page = Page::orderBy('order','asc');

        if ($search) {
            $page->where('title','LIKE', '%'.$search.'%')
                ->orWhere('text','LIKE', '%'.$search.'%');
        }

        return view('admin.page.index', [
            'pages' => $page->get(),
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('admin.page.create', ['page' => new Page]);
    }

    public function store(Request $request, Page $page)
    {
        $page = $page->create($request->all());

        return redirect()->route('admin.page.index')->with('success', 'Page created');
    }

    public function edit(Page $page)
    {
        return view('admin.page.edit', ['page' => $page]);
    }

    public function update(Request $request, Page $page)
    {
        $page->update($request->all());

        return redirect()->route('admin.page.edit', ['page' => $page->id])->with('success', 'Page updated');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

}