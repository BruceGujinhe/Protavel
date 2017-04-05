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
                    <li class="active">创建</li>
                </ol>
            </div>

            <div id="protavel-mainbody">
                <p class="h3 text-center">创建新文章</p>
                <br><br>

                <form action="{{ route('admin.article.store') }}" method="POST" class="form form-horizontal">
                    {{ csrf_field() }}

                    <!-- title -->
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="input-site-name" class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <input type="string" name="title" class="form-control" id="input-title" placeholder="" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <div class="help-block">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                    </div>

                    <!-- content -->
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="input-site-name" class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <textarea name="content" class="form-control" id="input-content" rows="8" placeholder="">{{ old('content') }}</textarea>
                            @if ($errors->has('content'))
                                <div class="help-block">{{ $errors->first('content') }}</div>
                            @endif
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
