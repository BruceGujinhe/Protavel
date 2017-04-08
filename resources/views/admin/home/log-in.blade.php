@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <br>
        <br>
        <br>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>登录失败</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br>

        {!! Form::open(array('url' => url('admin/log-in'), 'method' => 'POST', 'class' => 'form form-horizontal')) !!}
          <div class="form-group">
              <label class="col-sm-3 control-label" for="title">用户名或邮箱</label>
              <div class="col-sm-9">
                  <input class="form-control" type="text" name="username" value="{{ old('username') }}" placeholder="username">
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-3 control-label" for="title">密码</label>
              <div class="col-sm-9">
                  <input class="form-control" type="password" name="password" value="" placeholder="password">
              </div>
          </div>


          <div class="form-group">
              <div class="col-sm-9 col-sm-offset-3">
                  <button type="submit" class="btn btn-primary btn-block">提交</button>
              </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>
@endsection
