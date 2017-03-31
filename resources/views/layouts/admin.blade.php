<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" contents="dev4living.com">
    <title>Protavel</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link href="{{ asset('/bower-assets/bootswatch-ustclugFonts/flatly/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower-assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/bower-assets/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/bower-assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @include('layouts.common')
</head>

<body>
<div id="section-notification" style="position:absolute; top:80px; right:20px; z-index:999;">
  <script>
  $(document).ready(function() {
    setTimeout(function() {
      $('#section-notification').fadeOut();
    }, 3000);
  });
  </script>
</div>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('dashboard') }}">Protavel <sup>beta</sup></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('admin') ? 'active' : ''}}"><a href="{{ url('admin') }}">Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::admin()->guest())
                    <li class="{{ Request::is('login') ? 'active' : ''}}"><a href="{{ url('admin/log-in') }}">Login</a></li>
                @else
                    <li class="{{ Request::is('dashboard/guide*') ? 'active' : ''}}"><a href="{{ url('/dashboard/guide') }}"><span class="text-danger"><i class="glyphicon glyphicon-lamp"></i> {{ trans('dashboard.Guide') }}</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::admin()->user()->nickname }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="/">{{ trans('dashboard.Go to domain WebApp') }}</a></li>
                            <li><a href="{{ url('dashboard/log-out') }}">{{ trans('dashboard.Logout') }}</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

    @yield('content')
    @include('layouts.common')

</body>
</html>
