<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign['articles'] = Article::latest()->paginate();

        return view('admin.article.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
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
            'title'         =>      'required|string|min:3',
            'content'       =>      'required|string',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::admin()->user()->id;
        $article = Article::create($data);

        if ($article) {
            // @todo 操作处理反馈
            return redirect()->action('Admin\ArticleController@getIndex');
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
        $assign['article'] = Article::findOrFail($id);

        return view('admin.article.show', $assign);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assign['article'] = Article::findOrFail($id);

        return view('admin.article.edit', $assign);
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
        $article = Article::findOrFail($id);

        if ($article->update($request->all())) {
            // @todo 操作处理反馈
            return redirect()->route('admin.article.show', ['id' => $article->id]);
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
        $article = Article::findOrFail($id);

        if ($article->delete()) {
            // @todo 操作处理反馈
            return back();
        } else {
            // @todo 操作处理反馈
            return back();
        }
    }
}
