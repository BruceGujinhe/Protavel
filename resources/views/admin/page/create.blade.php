@extends('layouts.admin')

@section('content')
    <div class="container" class="page-article-create">
        <div class="row">
            <div class="col-sm-2">
                @include('admin.page._sidenav')
            </div>

            <div class="col-sm-10">
                <div id="protavel-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/admin') }}">管理后台</a></li>
                        <li><a href="{{ route('admin.page.index') }}">单页管理</a></li>
                        <li class="active">创建</li>
                    </ol>
                </div>

                <div id="protavel-mainbody">
                    <p class="h3 text-center">创建单页</p>
                    <br><br>

                    <form action="{{ route('admin.page.store') }}" method="POST" class="form form-horizontal">
                        {{ csrf_field() }}

                        <!-- name -->
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="input-name" class="col-sm-2 control-label">链接名称</label>
                            <div class="col-sm-10">
                                <input type="string" name="name" class="form-control" id="input-name"
                                       placeholder="" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="help-block">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>

                        <!-- link -->
                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                            <label for="input-link" class="col-sm-2 control-label">链接地址</label>
                            <div class="col-sm-10">
                                <input type="string" name="link" class="form-control" id="input-link"
                                       placeholder="" value="{{ old('link') }}">
                                @if ($errors->has('link'))
                                    <div class="help-block">{{ $errors->first('link') }}</div>
                                @endif
                            </div>
                        </div>

                        <!-- title -->
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="input-title" class="col-sm-2 control-label">单页标题</label>
                            <div class="col-sm-10">
                                <input type="string" name="title" class="form-control" id="input-title"
                                       placeholder="" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <div class="help-block">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                        </div>

                        <!-- content -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">单页内容</label>
                            <div class="col-sm-10 {{ $errors->has('content') ? 'has-error' : '' }}">
                                <textarea name="content" id="editor" rows="8" placeholder="">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <div class="help-block">{{ $errors->first('content') }}</div>
                                @endif
                                <!-- editor -->
                                @include('layouts.editor')
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-block btn-default">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
