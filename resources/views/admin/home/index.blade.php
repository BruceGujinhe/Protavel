@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            @include('admin.home._sidenav')
        </div>

        <div class="col-sm-10">
            <div id="section-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/admin') }}">Node 1</a></li>
                    <li><a href="{{ url('/admin') }}">Node 2</a></li>
                    <li class="active">Node 3</li>
                </ol>
            </div>

            <div id="section-mainbody">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Imgs</th>
                            <th>Like Num</th>
                            <th>Comment Num</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
