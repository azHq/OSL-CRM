@extends('layout.mainlayout')
@section('content')		

			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">

					@component('components.breadcrumb')                
	                    @slot('title') Companies  @endslot
	                    @slot('li_1') Dashboard @endslot
	                    @slot('li_2') Companies @endslot
	                    @slot('li_3') <i class="feather-database"></i> @endslot
                	@endcomponent
					<!-- Page Header -->
					<div class="page-header pt-3 mb-0 ">
						<div class="row">
							<div class="col">
								<div class="dropdown">
									<a class="dropdown-toggle recently-viewed" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Recently Viewed</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#">Recently Viewed</a>
				                        <a class="dropdown-item" href="#">Items I'm following</a>
				                        <a class="dropdown-item" href="#">All Companies</a>
				                        <a class="dropdown-item" href="#">Companies added in the last 24 hours</a>
				                        <a class="dropdown-item" href="#">Companies added in the last 7 days</a>
				                        <a class="dropdown-item" href="#">Companies with no notes in the last month</a>
				                        <a class="dropdown-item" href="#">Companies with no notes in the last 7 days</a>
									</div>
								</div>
							</div>
							<div class="col text-end">
								<ul class="list-inline-item pl-0">
					                <li class="nav-item dropdown list-inline-item add-lists">
					                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
					                        <div class="nav-profile-text">
					                          <i class="fa fa-th" aria-hidden="true"></i>
					                        </div>
					                    </a>
					                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
					                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#add-new-list">Add New List View</a>
					                    </div>
					                </li>
					                <li class="list-inline-item">
					                    <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_company">New Company</button>
					                </li>
					            </ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Content Starts -->
					<div class="row">
						<div class="col-md-12">
							<div class="card mb-0">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped table-nowrap custom-table mb-0 datatable">
											<thead>
												<tr>
													<th class="checkBox">
														<label class="container-checkbox">
														  	<input type="checkbox">
														  	<span class="checkmark"></span>
														</label>
													</th>
													<th>Company</th>
													<th>Phone</th>
													<th>Billing Street</th>
													<th>Billing City</th>
													<th>Billing State</th>
													<th>Billing Country</th>
													<th></th>
													<th class="text-end">Actions</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="checkBox">
														<label class="container-checkbox">
														  	<input type="checkbox">
														  	<span class="checkmark"></span>
														</label>
													</td>
													<td>
														<a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/c-logo2.png')}}"></a>
														<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Clampett Oil and Gas Corp.</a>
													</td>
													<td>8754554531</td>
													<td>
													 Escalon Street	
													</td>
													<td>Palo Alto</td>
													<td>CA</td>
													<td>United States</td>
						                            <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
						                            <td class="text-center">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#">Edit This Company</a>
								                                <a class="dropdown-item" href="#">Change Organization Image</a>
								                                <a class="dropdown-item" href="#">Delete This Organization</a>
								                                <a class="dropdown-item" href="#">Change Record Owner</a>
								                                <a class="dropdown-item" href="#">Generate Merge Document</a>
								                                <a class="dropdown-item" href="#">Print This Organization</a>
								                                <a class="dropdown-item" href="#">Add New Task For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Event For Organization</a>
								                                <a class="dropdown-item" href="#">Add Activity Set To Organization</a>
								                                <a class="dropdown-item" href="#">Add New Contact For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Project For Organization</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="checkBox">
														<label class="container-checkbox">
														  	<input type="checkbox">
														  	<span class="checkmark"></span>
														</label>
													</td>
													<td>
														<a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/c-logo.png')}}"></a>
														<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Acme Corporation</a>
													</td>
													<td>8754554531</td>
													<td>
														1000 Escalon Street	
													</td>
													<td>Palo Alto</td>
													<td>CA</td>
													<td>USA</td>
						                            <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
						                            <td class="text-center">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#">Edit This Company</a>
								                                <a class="dropdown-item" href="#">Change Organization Image</a>
								                                <a class="dropdown-item" href="#">Delete This Organization</a>
								                                <a class="dropdown-item" href="#">Change Record Owner</a>
								                                <a class="dropdown-item" href="#">Generate Merge Document</a>
								                                <a class="dropdown-item" href="#">Print This Organization</a>
								                                <a class="dropdown-item" href="#">Add New Task For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Event For Organization</a>
								                                <a class="dropdown-item" href="#">Add Activity Set To Organization</a>
								                                <a class="dropdown-item" href="#">Add New Contact For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Project For Organization</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="checkBox">
														<label class="container-checkbox">
														  	<input type="checkbox">
														  	<span class="checkmark"></span>
														</label>
													</td>
													<td>
														<a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/c-logo3.png')}}"></a>
														<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Soylent Corp</a>
													</td>
													<td>8754554531</td>
													<td>
														Havier Street	
													</td>
													<td>Soylent Corp</td>
													<td>CA</td>
													<td>India</td>
						                            <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
						                            <td class="text-center">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#">Edit This Company</a>
								                                <a class="dropdown-item" href="#">Change Organization Image</a>
								                                <a class="dropdown-item" href="#">Delete This Organization</a>
								                                <a class="dropdown-item" href="#">Change Record Owner</a>
								                                <a class="dropdown-item" href="#">Generate Merge Document</a>
								                                <a class="dropdown-item" href="#">Print This Organization</a>
								                                <a class="dropdown-item" href="#">Add New Task For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Event For Organization</a>
								                                <a class="dropdown-item" href="#">Add Activity Set To Organization</a>
								                                <a class="dropdown-item" href="#">Add New Contact For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Project For Organization</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="checkBox"> 
														<label class="container-checkbox">
														  	<input type="checkbox">
														  	<span class="checkmark"></span>
														</label>
													</td>
													<td>
														<a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/c-logo2.png')}}"></a>
														<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Umbrella </a>
													</td>
													<td>8754554531</td>
													<td>
														1000 Escalon Street	
													</td>
													<td> Umbrella</td>
													<td>CA</td>
													<td>Europe</td>
						                            <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
						                            <td class="text-center">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#">Edit This Company</a>
								                                <a class="dropdown-item" href="#">Change Organization Image</a>
								                                <a class="dropdown-item" href="#">Delete This Organization</a>
								                                <a class="dropdown-item" href="#">Change Record Owner</a>
								                                <a class="dropdown-item" href="#">Generate Merge Document</a>
								                                <a class="dropdown-item" href="#">Print This Organization</a>
								                                <a class="dropdown-item" href="#">Add New Task For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Event For Organization</a>
								                                <a class="dropdown-item" href="#">Add Activity Set To Organization</a>
								                                <a class="dropdown-item" href="#">Add New Contact For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Project For Organization</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="checkBox">
														<label class="container-checkbox">
														  	<input type="checkbox">
														  	<span class="checkmark"></span>
														</label>
													</td>
													<td>
														<a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/c-logo.png')}}"></a>
														<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Clampett Oil and Gas Corp.</a>
													</td>
													<td>8754554531</td>
													<td>
													  Nephew Street	
													</td>
													<td>Palo Alto</td>
													<td>CA</td>
													<td>United States</td>
						                            <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
						                            <td class="text-center">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#">Edit This Company</a>
								                                <a class="dropdown-item" href="#">Change Organization Image</a>
								                                <a class="dropdown-item" href="#">Delete This Organization</a>
								                                <a class="dropdown-item" href="#">Change Record Owner</a>
								                                <a class="dropdown-item" href="#">Generate Merge Document</a>
								                                <a class="dropdown-item" href="#">Print This Organization</a>
								                                <a class="dropdown-item" href="#">Add New Task For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Event For Organization</a>
								                                <a class="dropdown-item" href="#">Add Activity Set To Organization</a>
								                                <a class="dropdown-item" href="#">Add New Contact For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Project For Organization</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="checkBox">
														<label class="container-checkbox">
														  	<input type="checkbox">
														  	<span class="checkmark"></span>
														</label>
													</td>
													<td>
														<a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/c-logo2.png')}}"></a>
														<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Silicon Valley</a>
													</td>
													<td>8754554531</td>
													<td>
													 Albert Street	
													</td>
													<td>Palo Alto</td>
													<td>-</td>
													<td>India</td>
						                            <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
						                            <td class="text-center">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#">Edit This Company</a>
								                                <a class="dropdown-item" href="#">Change Organization Image</a>
								                                <a class="dropdown-item" href="#">Delete This Organization</a>
								                                <a class="dropdown-item" href="#">Change Record Owner</a>
								                                <a class="dropdown-item" href="#">Generate Merge Document</a>
								                                <a class="dropdown-item" href="#">Print This Organization</a>
								                                <a class="dropdown-item" href="#">Add New Task For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Event For Organization</a>
								                                <a class="dropdown-item" href="#">Add Activity Set To Organization</a>
								                                <a class="dropdown-item" href="#">Add New Contact For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Project For Organization</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="checkBox"> 
														<label class="container-checkbox">
														  	<input type="checkbox">
														  	<span class="checkmark"></span>
														</label>
													</td>
													<td>
														<a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/c-logo3.png')}}"></a>
														<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Fringe </a>
													</td>
													<td>8754554531</td>
													<td>
														RVN Road	
													</td>
													<td> Umbrella</td>
													<td>CA</td>
													<td>USA</td>
						                            <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
						                            <td class="text-center">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#">Edit This Company</a>
								                                <a class="dropdown-item" href="#">Change Organization Image</a>
								                                <a class="dropdown-item" href="#">Delete This Organization</a>
								                                <a class="dropdown-item" href="#">Change Record Owner</a>
								                                <a class="dropdown-item" href="#">Generate Merge Document</a>
								                                <a class="dropdown-item" href="#">Print This Organization</a>
								                                <a class="dropdown-item" href="#">Add New Task For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Event For Organization</a>
								                                <a class="dropdown-item" href="#">Add Activity Set To Organization</a>
								                                <a class="dropdown-item" href="#">Add New Contact For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
								                                <a class="dropdown-item" href="#">Add New Project For Organization</a>
															</div>
														</div>
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Content End -->
					
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
	@component('components.modal-popup')                
    @endcomponent
    @component('components.theme-settings')                
    @endcomponent
@endsection