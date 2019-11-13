<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Login</title>
        <meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
        <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
        <meta name="author" content="hencework"/>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/logo/favicon_saudebrb-1.ico') }}">
        <link rel="icon" href="{{ asset('img/logo/favicon_saudebrb-1.ico') }}" type="image/x-icon">
        
        <!-- vector map CSS -->
        <link href="{{ asset('Admin_Theme/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        
        
        
        <!-- Custom CSS -->
        <link href="{{ asset('Admin_Theme/Theme/dist/css/style.css') }}" rel="stylesheet" type="text/css">
        {{-- MY CSS --}}
        <link href="{{ asset('css/my_style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->
        
        <div class="wrapper pa-0">
            <header class="sp-header">
                <div class="sp-logo-wrap pull-left div_logo_register_login">
                    {{-- <a href="{{ route('admin.index') }}">
                        <img style="width: 50%;" class="brand-img mr-10" src="{{ asset('img/logo/logo_saude_brb_v3-1.png') }}" alt="brand"/>
                        <span class="brand-text">Droopy</span>
                    </a> --}}
                </div>
                <div class="btn_register_login form-group mb-0 pull-right">
                    <span  style="color: black;" class="inline-block pr-10"><b>Ainda não possui um registro?</b></span>
                    <a style="font-weight: bolder; background-color: white !important" class="inline-block btn btn-primary btn-rounded btn-outline" href="{{ route('register') }}"><b>Registre-se</b></a>
                </div>
                <div class="clearfix"></div>
            </header>
            
            <!-- Main Content -->
            <div style="background-color: #f5f5f5" class="page-wrapper pa-0 ma-0 auth-page">
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form  ml-auto mr-auto no-float">
                                <div style="background-color: white; border-radius: 10px; border-radius: 10px; border: solid 2px #e4e4e4;" class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="mt-20 mb-30">
                                            <p style="text-align: center;">
                                                <img class="brand-img mr-10" src="{{ asset('img/logo/logo_saude_brb_v3-1.png') }}" alt="brand"/>
                                            </p>
                                            <h6 class="text-center nonecase-font txt-grey">Faça login para ter acesso ao sistema</h6>
                                        </div>  
                                        <div class="form-wrap">

                                            <form method="POST" action="{{ route('login') }}">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label class="txt-cap-unset control-label mb-10" for="email">E-mail / Login</label>

                                                    <input id="email" type="text" class="form-control" name="username" value="{{ old('email') }}" required autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif

                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10" for="password">Senha:</label>

                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                @if ($errors->has('auth'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('auth') }}</strong>
                                                    </span>
                                                @endif
                                                
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-primary  btn-rounded">Entrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->   
                </div>
                
            </div>
            <!-- /Main Content -->
        
        </div>
        <!-- /#wrapper -->
        
        <!-- JavaScript -->
        
        <!-- jQuery -->
        <script src="{{ asset('Admin_Theme/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('Admin_Theme/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('Admin_Theme/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
        
        <!-- Slimscroll JavaScript -->
        <script src="{{ asset('Admin_Theme/Theme/dist/js/jquery.slimscroll.js') }}"></script>
        
        <!-- Init JavaScript -->
        <script src="{{ asset('Admin_Theme/Theme/dist/js/init.js') }}"></script>
    </body>
</html>
