@extends('layouts.admin')

@section('content')
    <div class="container" class="page-page-create">
        <div class="row">
            <div class="col-sm-2">
                @include('admin.page._sidenav')
            </div>

            <div class="col-sm-10">
                <div id="protavel-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/admin') }}">管理后台</a></li>
                        <li><a href="{{ route('admin.page.index') }}">单页管理</a></li>
                        <li class="active">详情</li>
                    </ol>
                </div>

                <div id="protavel-mainbody">
                    <p class="h3 text-center">单页详情</p>
                    <br><br>

                    <table class="table table-striped">
                        <tr>
                            <th style="width: 8em">ID</th>
                            <td>{{ $page->id }}</td>
                        </tr>

                        <tr>
                            <th style="width: 4em">名称</th>
                            <td>{{ $page->name }}</td>
                        </tr>

                        <tr>
                            <th style="width: 4em">标题</th>
                            <td>{{ $page->title }}</td>
                        </tr>

                        <tr>
                            <th style="width: 4em">链接</th>
                            <td>{{ $page->link }}</td>
                        </tr>

                        <tr>
                            <th style="width: 4em">内容</th>
                            <td>{!! $page->content !!}</td>
                        </tr>

                        <tr>
                            <th style="width: 4em">创建时间</th>
                            <td>{{ $page->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
