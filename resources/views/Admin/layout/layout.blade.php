@include('Admin.layout.includes.header')
@include('Admin.layout.includes.top_menu')
@include('Admin.layout.includes.left_sidebar_menu')
@include('Admin.layout.includes.right_sidebar_menu')

@yield('content')

@include('Admin.layout.includes.footer')

@yield('js')