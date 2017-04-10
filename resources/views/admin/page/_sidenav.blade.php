<ul id="section-sidenav" class="nav nav-pills nav-stacked hidden-xs" role="tablist">
    <li class="{{ Request::is('*page') || Request::is('*page/index') ? 'active' : '' }}"><a href="{{ route('admin.page.index') }}"><i class="fa fa-list"></i>&nbsp;&nbsp; 列表</a></li>
    <br>

    <li class="{{ Request::is('*page/create') ? 'active' : '' }}"><a href="{{ route('admin.page.create') }}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp; 创建</a></li>
</ul>

<ul id="section-sidenav" class="nav nav-pills visible-xs-block" role="tablist">
    <li class="{{ Request::is('*page') || Request::is('*page/index') ? 'active' : '' }}"><a href="{{ route('admin.page.index') }}"><i class="fa fa-list"></i>&nbsp;&nbsp; 列表</a></li>
    <li class="{{ Request::is('*page/create') ? 'active' : '' }}"><a href="{{ route('admin.page.create') }}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp; 创建</a></li>
</ul>

<br>
