<ul id="section-sidenav" class="nav nav-pills nav-stacked hidden-xs" role="tablist">
    <li class="{{ Request::is('*article') || Request::is('*article/index') ? 'active' : '' }}"><a href="{{ route('admin.article.index') }}">列表</a></li>
    <br>

    <li class="{{ Request::is('*article/create') ? 'active' : '' }}"><a href="{{ route('admin.article.create') }}">创建</a></li>
</ul>

<ul id="section-sidenav" class="nav nav-pills visible-xs-block" role="tablist">
    <li class="{{ Request::is('*article') || Request::is('*article/index') ? 'active' : '' }}"><a href="{{ route('admin.article.index') }}">列表</a></li>
    <li class="{{ Request::is('*article/create') ? 'active' : '' }}"><a href="{{ route('admin.article.create') }}">创建</a></li>
</ul>

<br>
