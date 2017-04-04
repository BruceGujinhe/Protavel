@extends('layouts.admin')

@section('content')
<div class="container" class="page-article-index">
    <div class="row">
        <div class="col-sm-2">
            @include('admin.article._sidenav')
        </div>

        <div class="col-sm-10">
            <div id="protavel-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/admin') }}">管理后台</a></li>
                    <li><a href="{{ route('admin.article.index') }}">文章</a></li>
                    <li class="active">列表</li>
                </ol>
            </div>

            <div id="protavel-mainbody">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>作者</th>
                            <th>标题</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->author->nickname }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="{{ route('admin.article.show', ['id' => $article->id]) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-default btn-xs" href="{{ route('admin.article.edit', ['id' => $article->id]) }}"><i class="fa fa-edit"></i></a>
                                    <button onclick="protavelDestroy(this)" class="btn btn-danger btn-xs" data-href="{{ route('admin.article.destroy', ['id' => $article->id]) }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div id="protavel-pagination">
                    {!! $articles->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
