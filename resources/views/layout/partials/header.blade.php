<!-- Main Wrapper -->

<div class="main-wrapper">

    <head>
        <script>
            var isCleared = false;
        </script>
    </head>

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
					<i class="fa fa-bell-o"></i>
                    @if(Auth::user()->unreadNotifications->count()>0)
                    <span id="notification-count" class="badge rounded-pill">{{Auth::user()->unreadNotifications->count()}}</span>
                    @endif
				</a>
				<div class="dropdown-menu notifications">
                    @php
                        $user = auth()->user();
                    @endphp
					<div class="topnav-dropdown-header">
						<span class="notification-title">Notifications</span>
						<a onclick="clearNotification({{$user->id}})" href="javascript:;" id="notification-clear-btn" class="clear-noti"> Clear All </a>
					</div>
                    <input type="hidden" name="myVar" id="myVar" value="0">
                    <div class="noti-content" id="notifications">
                        <ul class="notification-list">
                            @foreach (Auth::user()->unreadNotifications as $notification)
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
    <script>
        function clearNotification(userId){
            // isCleared=true;
            // var div = document.getElementById("notifications");
            // var div2 = document.getElementById("notification-count");
            // var div3= document.getElementById("notification-clear-btn");
            // if (isCleared) {
            //     div.style.display = "none";
            //     div2.style.display = "none";
            //     div3.style.display = "none";
            // }
            var url = "{{ route('notifications.update', 'id') }}";
            url = url.replace('id', userId);
            $.ajax({
                type: 'GET',
                url: url,
                data: {},
                success: function(data) {
                    window.reload();
                }
            });
        }
    </script>
	<!-- /Header -->
