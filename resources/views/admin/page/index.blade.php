@extends('layouts.admin')

@section('content')
    <div class="container" class="page-article-index">
        <div class="row">
            <div class="col-sm-2">
                @include('admin.page._sidenav')
            </div>

            <div class="col-sm-10">
                <div id="protavel-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/admin') }}">管理后台</a></li>
                        <li><a href="{{ route('admin.page.index') }}">单页管理</a></li>
                        <li class="active">列表</li>
                    </ol>
                </div>

                <div id="protavel-mainbody">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>名称</th>
                            <th>标题</th>
                            <th>链接</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td>{{ $page->name }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->link }}</td>
                                    <td class="text-nowrap">{{ $page->created_at }}</td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-default btn-xs" href="{{ route('admin.page.show', ['id' => $page->id]) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-default btn-xs" href="{{ route('admin.page.edit', ['id' => $page->id]) }}"><i class="fa fa-edit"></i></a>
                                        <button onclick="protavelDestroy(this)" class="btn btn-danger btn-xs" data-href="{{ route('admin.page.destroy', ['id' => $page->id]) }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div id="protavel-pagination">
                        {!! $pages->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
