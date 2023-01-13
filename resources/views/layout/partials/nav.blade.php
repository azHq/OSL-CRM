<?php error_reporting(0); ?>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<form action="search" class="mobile-view">
			<input class="form-control" type="text" placeholder="Search here">
			<button class="btn" type="button"><i class="fa fa-search"></i></button>
		</form>
		<div id="sidebar-menu" class="sidebar-menu">

			<ul></ul>
				<li class="nav-item nav-profile">
					<a href="#" class="nav-link">
						<div class="nav-profile-image">
							<img src="{{ URL::asset('/assets/img/profiles/profile.png')}}" alt="profile">
						</div>
						<div class="nav-profile-text d-flex flex-column">
							<span class="font-weight-bold">{{ Auth::user()->name }}</span>
							<span class="text-white text-small"> {{ Auth::user()->role_name }} </span>
						</div>
						<i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
					</a>
				</li>
				<li id="dashboard" class="nav-li {{ Request::is('/') ? 'active' : '' }}">
					<a data-nav="dashboard" data-href="{{url('/')}}" class="url"><i class="feather-home"></i> <span>Dashboard</span></a>
				</li>
				<!-- <li id="leads" class="nav-li {{ Request::is('/leads') ? 'active' : '' }}">
					<a data-nav="leads" data-href="{{url('/leads')}}" class="url"><i class="feather-users"></i> <span>All Leads</span></a>
				</li> -->
				<li class="nav-li {{ Request::is('leads*') ? 'active' : '' }}">
					<a data-bs-toggle="collapse" href="#leads-item" role="button" aria-expanded="false" aria-controls="leads" class="url"><i class="feather-target"></i> <span>Leads</span><i class="feather-corner-arrow-down"></i></a>
					<ul class="sub-category collapse" id="leads-item">
						<li id="leads" class="nav-li {{ Request::is('/leads') ? 'active' : '' }}">
							<a data-nav="leads" data-href="{{url('/leads')}}" class="url"><i class="feather-users"></i> <span>All Leads</span></a>
						</li>
						<li id="leads-new" class="nav-li {{ Request::is('leads/new*') ? 'active' : '' }}"><a data-nav="leads-new" data-href="{{url('/leads/new')}}" class="url"><i class="feather-plus-circle"></i> <span> New Leads</span></a></li>
						<li id="leads-first-contact" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads-first-contact" data-href="{{url('/leads/first-contact')}}" class="url"><i class="feather-user-check"></i> <span> First Contact</span></a></li>
						<!-- <li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-user-check"></i> <span> Second Contact</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-user-check"></i> <span> Third Contact</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-phone-incoming"></i> <span> Final Call</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-alert-circle"></i> <span> Cold</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-user-x"></i> <span> Dead</span></a></li> -->
					</ul>
				</li>
				<li class="nav-li {{ Request::is('pending*') ? 'active' : '' }}">
					<a data-bs-toggle="collapse" href="#pending" role="button" aria-expanded="false" aria-controls="leads" class="url"><i class="feather-clock"></i> <span>Pending</span></a>
					<ul class="sub-category collapse" id="pending">
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-plus-circle"></i> <span> Appointment Book</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-file-text"></i> <span> Waiting for Documents</span></a></li>
					</ul>
				</li>
				<li class="nav-li {{ Request::is('addmission*') ? 'active' : '' }}">
					<a data-bs-toggle="collapse" href="#addmission" role="button" aria-expanded="false" aria-controls="addmission" class="url"><i class="feather-award"></i> <span>Addmission</span></a>
					<ul class="sub-category collapse" id="addmission">
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-file-minus"></i> <span> Partial Documnets</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-check-circle"></i> <span> Document Received</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-check"></i> <span> Applied</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-gift"></i> <span> Waiting for Conditional Offer Issued</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-gift"></i> <span> Waiting for Unconditional Offer Issued</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-dollar-sign"></i> <span> Paid</span></a></li>
					</ul>
				</li>
				<li  class="nav-li {{ Request::is('visa-compliance*') ? 'active' : '' }}">
					<a  data-bs-toggle="collapse" href="#visa-compliance" role="button" aria-expanded="false" aria-controls="visa-compliance" class="url"><i class="feather-file-text"></i> <span>Visa Compliance</span></a>
					<ul class="sub-category collapse" id="visa-compliance">
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-file-minus"></i> <span> Waiting for CAS</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-check-circle"></i> <span> Interview in process</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-check"></i> <span> CAS or Final Confirmation Letter Issued</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-gift"></i> <span> Applied for Visa</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-gift"></i> <span> Visa Issued</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-dollar-sign"></i> <span> Enrolled</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-dollar-sign"></i> <span> Refund</span></a></li>
						<li id="" class="nav-li {{ Request::is('leads*') ? 'active' : '' }}"><a data-nav="leads" data-href="" class="url"><i class="feather-dollar-sign"></i> <span> Withdrawn</span></a></li>
					</ul>
				</li>
				<!-- <li id="applications" class="nav-li {{ Request::is('applications*') ? 'active' : '' }}">
					<a data-nav="applications" data-href="{{url('applications')}}" class="url"><i class="feather-file-plus"></i> <span>Applications</span></a>
				</li> -->
				<li id="tasks" class="nav-li {{ Request::is('tasks*') ? 'active' : '' }}">
					<a data-nav="tasks" data-href="{{url('tasks')}}" class="url"><i class="feather-check-square"></i> <span>Tasks</span></a>
				</li>
				<!-- <li id="reports" class="nav-li {{ Request::is('reports*') ? 'active' : '' }}">
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
				<li id="notifications" class="nav-li {{ Request::is('notifications*') ? 'active' : '' }}">
					<a data-nav="notifications" data-href="{{url('notifications')}}" class="url"><i class="fa fa-bell" aria-hidden="true"></i> <span>Notifications</span></a>
				</li>
				@if (Auth::user()->hasRole('super-admin'))
				<li id="activities" class="nav-li {{ Request::is('activities*') ? 'active' : '' }}">
					<a data-nav="activities" data-href="{{url('activities')}}" class="url"><i class="fa fa-history" aria-hidden="true"></i> <span>Activities</span></a>
				</li>
				@endif -->
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->