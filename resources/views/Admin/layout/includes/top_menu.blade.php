<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap pt-0">
						<a href="{{ route('admin.index') }}">
							<img style="width: 200px !important;" class="brand-img" src="{{ asset('img/logo/logo_saude_brb_v3-1.png') }}" alt="Saude BRB"/>
							{{-- <span class="brand-text">Droopy</span> --}}
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				{{-- <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a> --}}
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				{{-- <form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form> --}}
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				@if (\Auth::user())
					<ul class="nav navbar-right top-nav pull-right">
						{{-- <li>
							<a id="open_right_sidebar" href="#"><i class="zmdi zmdi-settings top-nav-icon"></i></a>
						</li> --}}
						{{-- <li class="dropdown app-drp">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-apps top-nav-icon"></i></a>
							<ul class="dropdown-menu app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
								<li>
									<div class="app-nicescroll-bar">
										<ul class="app-icon-wrap pa-10">
											<li>
												<a href="weather.html" class="connection-item">
												<i class="zmdi zmdi-cloud-outline txt-info"></i>
												<span class="block">weather</span>
												</a>
											</li>
										</ul>
									</div>	
								</li>
								<li>
									<div class="app-box-bottom-wrap">
										<hr class="light-grey-hr ma-0"/>
										<a class="block text-center read-all" href="javascript:void(0)"> more </a>
									</div>
								</li>
							</ul>
						</li> --}}
						{{-- <li class="dropdown full-width-drp">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more-vert top-nav-icon"></i></a>
							<ul class="dropdown-menu mega-menu pa-0" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
								<li class="product-nicescroll-bar row">
									<ul class="pa-20">
										<li class="col-md-3 col-xs-6 col-menu-list">
											<a href="javascript:void(0);"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
											<hr class="light-grey-hr ma-0"/>
											<ul>
												<li>
													<a href="index.html">Analytical</a>
												</li>
											</ul>
										</li>
										<li class="col-md-3 col-xs-6 col-menu-list">
											<a href="javascript:void(0);">
												<div class="pull-left">
													<i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">E-Commerce</span>
												</div>	
												<div class="pull-right"><span class="label label-success">hot</span>
												</div>
												<div class="clearfix"></div>
											</a>
											<hr class="light-grey-hr ma-0"/>
											<ul>
												<li>
													<a href="e-commerce.html">Dashboard</a>
												</li>
											</ul>
										</li>
										<li class="col-md-6 col-xs-12 preview-carousel">
											<a href="javascript:void(0);"><div class="pull-left"><span class="right-nav-text">latest products</span></div><div class="clearfix"></div></a>
											<hr class="light-grey-hr ma-0"/>
											<div class="product-carousel owl-carousel owl-theme text-center">
												<a href="#">
													<img src="{{ asset('Admin_Theme/img/chair.jpg') }}" alt="chair">
													<span>Circle chair</span>
												</a>								
											</div>
										</li>
									</ul>
								</li>	
							</ul>
						</li> --}}
						{{-- <li class="dropdown alert-drp">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
							<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
								<li>
									<div class="notification-box-head-wrap">
										<span class="notification-box-head pull-left inline-block">notifications</span>
										<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
										<div class="clearfix"></div>
										<hr class="light-grey-hr ma-0"/>
									</div>
								</li>
								<li>
									<div class="streamline message-nicescroll-bar">
										<div class="sl-item">
											<a href="javascript:void(0)">
												<div class="icon bg-green">
													<i class="zmdi zmdi-flag"></i>
												</div>
												<div class="sl-content">
													<span class="inline-block capitalize-font  pull-left truncate head-notifications">
													New subscription created</span>
													<span class="inline-block font-11  pull-right notifications-time">2pm</span>
													<div class="clearfix"></div>
													<p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
												</div>
											</a>	
										</div>
										<hr class="light-grey-hr ma-0"/>
									</div>
								</li>
								<li>
									<div class="notification-box-bottom-wrap">
										<hr class="light-grey-hr ma-0"/>
										<a class="block text-center read-all" href="javascript:void(0)"> read all </a>
										<div class="clearfix"></div>
									</div>
								</li>
							</ul>
						</li> --}}
						<li class="dropdown auth-drp">
							<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">
								{{-- <img src="{{ asset('Admin_Theme/img/user1.png') }}" alt="user_auth" class="user-auth-img img-circle"/> --}}
								{{-- <span class="user-online-status"></span> --}}
								<span>
									Minha conta
									<i style="font-weight: bold;" class="pl-5 fa fa-angle-down"></i>
								</span>
							</a>
							<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="fadeOut">
								<li>
									<a href="#" style="font-weight: bolder;" class="text-center">
										<span>{{ HelpersUsers::completName(\Auth::user()) }}</span>
										<br>
										<span style="font-weight: normal;">{{ \Auth::user()->Group->name }}</span>
									</a>
								</li>

								<li class="divider"></li>
								
								@if (in_array('admin.user.edit', HelpersUsers::permissionsUser(\Auth::user())))
									<li>
										<a class="" href="{{ route('admin.user.edit', \Auth::user()->id) }}">
											<i class="zmdi zmdi-account"></i>
											<span>Perfil</span>
										</a>
									</li>
								@endif
								{{-- <li class="divider"></li> --}}

								<li>
									<a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										<i class="zmdi zmdi-power"></i>
										<span>Sair</span>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								            {{ csrf_field() }}
								        </form>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				@else
					<ul class="nav navbar-right top-nav pull-right">
						<li>
							<a href="{{ route('login') }}">Login</a>
						</li>

						<li>
							<a href="{{ route('admin.register') }}">Registre-se</a>
						</li>
					</ul>
				@endif

			</div>	
		</nav>
		<!-- /Top Menu Items -->