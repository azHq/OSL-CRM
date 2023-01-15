<!-- Main Wrapper -->

<div class="main-wrapper">

	<!-- Header -->
	<div class="header" id="heading">

		<!-- Logo -->
		<div class="header-left">
			<a href="{{url('/')}}" class="logo">
				<img src="{{ URL::asset('/assets/img/cover.jpg')}}" alt="Logo" class="sidebar-logo">
				<img src="{{ URL::asset('/assets/img/cover-sm.jpg')}}" alt="Logo" class="mini-sidebar-logo">
			</a>
		</div>
		<!-- /Logo -->

		<a id="toggle_btn" href="javascript:void(0);">
			<span class="bar-icon">
				<span></span>
				<span></span>
				<span></span>
			</span>
		</a>


		<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

		<!-- Header Menu -->
		<ul class="nav user-menu">


			<!-- Notifications -->
			<li class="nav-item dropdown">
				<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
					<i class="fa fa-bell-o"></i> <span class="badge rounded-pill">{{Auth::user()->notifications->count()}}</span>
				</a>
				<div class="dropdown-menu notifications">
					<div class="topnav-dropdown-header">
						<span class="notification-title">Notifications</span>
						<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
					</div>
					<div class="noti-content">
						<ul class="notification-list">
							@foreach (Auth::user()->notifications as $notification)
							<li class="notification-message">
								<a href="#">
									<div class="media d-flex">
										<div class="media-body flex-grow-1">
											<p class="noti-details"><span class="noti-title">{{$notification->data['title']}}</span> {{$notification->data['description']}}</p>
											<p class="noti-time"><span class="notification-time">{{$notification->updated_at->diffForHumans()}}</span></p>
										</div>
									</div>
								</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="topnav-dropdown-footer">
						@php
						$route = route('notifications.index');
						@endphp
						<a onclick='gotoRoute("{{$route}}", "notifications");' href="javascript:;">View all Notifications</a>
					</div>
				</div>
			</li>

			<li class="nav-item dropdown has-arrow main-drop">
				<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
					<span class="user-img"><img src="{{ URL::asset('/assets/img/profiles/profile.png')}}" alt="">
						<span class="status online"></span></span>
					<span class="">
						{{ Auth::user()->name }} <br>
						{{ Auth::user()->role_name }}
					</span>

				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{url('profile')}}">My Profile</a>
					<a class="dropdown-item" href="{{url('logout')}}">Logout</a>
				</div>
			</li>
		</ul>
		<!-- /Header Menu -->

		<!-- Mobile Menu -->
		<div class="dropdown mobile-user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="{{url('profile')}}">My Profile</a>
				<a class="dropdown-item" href="{{url('logout')}}">Logout</a>
			</div>
		</div>
		<!-- /Mobile Menu -->

	</div>
	<!-- /Header -->