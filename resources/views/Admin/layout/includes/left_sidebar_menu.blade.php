<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				@foreach (SideMenuAdmin::SideMenu() as $option)
                    @if ($option['login'] == false OR \Auth::user())
                        @if ($option['permission'] == '#' OR in_array($option['permission'], HelpersUsers::permissionsUser(\Auth::user())))
                            @if (isset($option['name_menu']))
                                <li class="navigation-header">
                                    <span>{{ $option['name_menu'] }}</span> 
                                    <i class="zmdi zmdi-more"></i>
                                </li>
                            @else
                                @if (isset($option['sub_menu']))
                                    <li>
                                        <a class="{{ $option['active'] }}" href="javascript:void(0);" data-toggle="collapse" data-target="#{{ $option['link_btn'] }}"><div class="pull-left"><i class="{{ $option['icon'] }} mr-20"></i><span class="right-nav-text">{{ $option['label'] }}</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                        <ul id="{{ $option['link_btn'] }}" class="collapse collapse-level-1 two-col-list">
                                            @foreach ($option['sub_menu'] as $submenu)
                                                <li>
                                                    <a class="{{ $submenu['active_page'] }}" href="{{ route($submenu['url']) }}">{{ $submenu['label'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>                            
                                @else
                                    <li>
                                        <a class="{{ $option['active'] }}" href="{{ route($option['url']) }}">
                                            <div class="pull-left">
                                                <i class="{{ $option['icon'] }} mr-20"></i>
                                                <span class="right-nav-text">{{ $option['label'] }}</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </li>
                                @endif
                                @if ($option['line'])
                                    <li><hr class="light-grey-hr mb-10"/></li>
                                @endif
                            @endif
                        @endif
                    @endif
                @endforeach
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->