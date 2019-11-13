<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>@yield('title')</title>
	<meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo/favicon_saudebrb-1.ico') }}">
    <link rel="icon" href="{{ asset('img/logo/favicon_saudebrb-1.ico') }}" type="image/x-icon">

    <!-- Bootstrap Treeview -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-treeview/dist/bootstrap-treeview.min.css') }}" rel="stylesheet">
    
    <!-- Data table CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <!-- Footable CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/FooTable/compiled/footable.bootstrap.min.css') }}" rel="stylesheet"/>
    
    <!-- Data table CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet"/>

    <!-- Toast CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Colorpicker CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet"/>
    
    <!-- select2 CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- switchery CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/switchery/dist/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- bootstrap-select CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- bootstrap-tagsinput CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- bootstrap-touchspin CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- multi-select CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- Bootstrap Switches CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- Bootstrap Datetimepicker CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
        
    <!-- Bootstrap Daterangepicker CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>

    {{-- STYLE FULLCALENDAR --}}
    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link href='{{ asset('node_modules/fullcalendar/packages/core/main.css') }}' rel='stylesheet'/>
    <link href='{{ asset('node_modules/fullcalendar/packages/bootstrap/main.css') }}' rel='stylesheet'/>
    <link href='{{ asset('node_modules/fullcalendar/packages/timegrid/main.css') }}' rel='stylesheet'/>
    <link href='{{ asset('node_modules/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet'/>
    <link href='{{ asset('node_modules/fullcalendar/packages/list/main.css') }}' rel='stylesheet'/>

    <!-- Bootstrap Dropify CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" type="text/css"/>

    <!--alerts CSS -->
    <link href="{{ asset('Admin_Theme/vendors/bower_components/sweetalert/dist/sweetalert.css') }} " rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('Admin_Theme/Theme/dist/css/style.css') }}" rel="stylesheet" type="text/css">

    {{-- MY CSS --}}
    <link href="{{ asset('css/my_style.css') }}" rel="stylesheet" type="text/css">
    {{-- MY CSS --}}

</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-1-active pimary-color-green">