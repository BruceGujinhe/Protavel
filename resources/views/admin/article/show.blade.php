@extends('layouts.admin')

@section('content')
    <div class="container" class="page-article-create">
        <div class="row">
            <div class="col-sm-2">
                @include('admin.article._sidenav')
            </div>

            <div class="col-sm-10">
                <div id="protavel-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/admin') }}">管理后台</a></li>
                        <li><a href="{{ route('admin.article.index') }}">文章</a></li>
                        <li class="active">详情</li>
                    </ol>
                </div>

                <div id="protavel-mainbody">
                    <p class="h3 text-center">文章详情</p>
                    <br><br>

                    <table class="table table-striped">
                        <tr>
                            <th style="width: 8em">ID</th>
                            <td>{{ $article->id }}</td>
                        </tr>

                        <tr>
                            <th style="width: 4em">作者</th>
                            <td>{{ $article->author->nickname }}</td>
                        </tr>

                        <tr>
                            <th style="width: 4em">标题</th>
                            <td>{{ $article->title }}</td>
                        </tr>

                        <tr>
                            <th style="width: 4em">内容</th>
                            <td>{!! $article->content !!}</td>
                        </tr>

                        <tr>
                            <th style="width: 4em">创建时间</th>
                            <td>{{ $article->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
