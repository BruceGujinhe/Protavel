<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate();
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         =>      'required|string|min:3',
            'link'         =>      'required|string',
            'title'        =>      'required|string',
            'content'      =>      'required|string',
        ]);

        $data = $request->input();
        $res = Page::create($data);

        if ($res) {
            // @todo 操作处理反馈
            return redirect()->route('admin.page.show', ['id' => $res->id]);
        } else {
            // @todo 操作处理反馈
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'         =>      'required|string|min:3',
            'link'         =>      'required|string',
            'title'        =>      'required|string',
            'content'      =>      'required|string',
        ]);

        $page = Page::findOrFail($id);
        $res = $page->update($request->input());

        if ($res) {
            // @todo 操作处理反馈
            return redirect()->route('admin.page.show', ['id' => $page->id]);
        } else {
            // @todo 操作处理反馈
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        if ($page->delete()) {
            // @todo 操作处理反馈
            return back();
        } else {
            // @todo 操作处理反馈
            return back();
        }
    }
}
