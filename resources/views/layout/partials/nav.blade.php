<?php error_reporting(0); ?>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<form action="search" class="mobile-view">
			<input class="form-control" type="text" placeholder="Search here">
			<button class="btn" type="button"><i class="fa fa-search"></i></button>
		</form>
		<div id="sidebar-menu" class="sidebar-menu">

			<ul>
				<li id="dashboard" class="nav-li {{ Request::is('/') ? 'active' : '' }}">
					<a data-nav="dashboard" data-href="{{url('/')}}" class="url"><i class="feather-home"></i> <span>Dashboard</span></a>
				</li>
				<li id="leads" class="nav-li {{ Request::is('leads') ? 'active' : '' }}">
					<a data-nav="leads" data-href="{{url('leads')}}" class="url"><i class="feather-target"></i> <span>All Leads</span></a>
				</li>
				@foreach(App\Models\Category::all() as $category)
				<li class="submenu">
					<a href="#">{!! $category->icon !!}<span> {{$category->name}} </span> <span class="menu-arrow"></span></a>
					<ul class="sub-menus">
						@foreach(App\Models\Subcategory::where('category_id', $category->id)->get() as $subcategory)
						<li id="{{$subcategory->slug}}" class="nav-li {{ Request::is('leads/status/'.$subcategory->slug) ? 'active' : '' }}">
							<a data-nav="{{$subcategory->slug}}" data-href="{{url('leads/status/'.$subcategory->slug)}}" class="url"> {{$subcategory->name}} </a>
						</li>
						@endforeach
					</ul>
				</li>
				@endforeach
                <li id="applications" class="nav-li {{ Request::is('applications*') ? 'active' : '' }}">
                    <a data-nav="applications" data-href="{{url('applications')}}" class="url"><i class="fa fa-file-text" aria-hidden="true"></i> <span>Applications</span></a>
                </li>
				<li id="pending-docs" class="nav-li {{ Request::is('documents*') ? 'active' : '' }}">
					<a data-nav="pending-docs" data-href="{{url('documents')}}" class="url"><i class="feather-file-text"></i> <span>Pending Docs</span></a>
				</li>
				<li id="tasks" class="nav-li {{ Request::is('tasks*') ? 'active' : '' }}">
					<a data-nav="tasks" data-href="{{url('tasks')}}" class="url"><i class="feather-check-square"></i> <span>Tasks</span></a>
				</li>
				<li id="reports" class="nav-li {{ Request::is('reports*') ? 'active' : '' }}">
					<a data-nav="reports" data-href="{{url('reports')}}" class="url"><i class="feather-bar-chart"></i> <span>Reports</span></a>
				</li>
				@if (Auth::user()->hasRole('super-admin'))
				<li id="users" class="nav-li {{ Request::is('users*') ? 'active' : '' }}">
					<a data-nav="users" data-href="{{url('users')}}" class="url"><i class="feather-users"></i> <span>Counsellors</span></a>
				</li>
				@endif
				@if (Auth::user()->hasRole('super-admin'))
				<li id="universities" class="nav-li {{ Request::is('universities*') ? 'active' : '' }}">
					<a data-nav="universities" data-href="{{url('universities')}}" class="url"><i class="fa fa-university" aria-hidden="true"></i> <span>Universities</span></a>
				</li>
				@endif
                @if (Auth::user()->hasRole('super-admin'))
                    <li id="universities" class="nav-li {{ Request::is('reports*') ? 'active' : '' }}">
                        <a data-nav="universities" data-href="{{url('reports')}}" class="url"><i class="fa fa-code" aria-hidden="true"></i> <span>Parameters</span></a>
                    </li>
                @endif
				<li id="notifications" class="nav-li {{ Request::is('notifications*') ? 'active' : '' }}">
					<a data-nav="notifications" data-href="{{url('notifications')}}" class="url"><i class="fa fa-bell" aria-hidden="true"></i> <span>Notifications</span></a>
				</li>
				@if (Auth::user()->hasRole('super-admin'))
				<li id="activities" class="nav-li {{ Request::is('activities*') ? 'active' : '' }}">
					<a data-nav="activities" data-href="{{url('activities')}}" class="url"><i class="fa fa-history" aria-hidden="true"></i> <span>Activities</span></a>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->
