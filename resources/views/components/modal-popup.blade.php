@if(!Route::is(['invoices-cancelled','invoices-draft','invoices-overdue','invoices-paid','invoices-recurring']))
<!--system users Modal -->
<div class="modal right fade" id="company-details" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row w-100">
					<div class="col-md-7 account d-flex">
						<div class="company_img">
							<img src="{{ URL::asset('/assets/img/c-logo.png')}}" alt="User" class="user-image" class="img-fluid" />
						</div>
						<div>
							<p class="mb-0">Company</p>
							<span class="modal-title">Clampett Oil and Gas Corp</span>
							<span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>
							<span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
						</div>

					</div>
					<div class="col-md-5 text-end">
						<ul class="list-unstyled list-style-none">
							<li class="dropdown list-inline-item"><br />
								<a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Actions </a>
								<div class="dropdown-menu">
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
							</li>

						</ul>

					</div>
				</div>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="card due-dates">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<span>Title</span>
							<p>Enquiry</p>
						</div>
						<div class="col">
							<span>Companies</span>
							<p>Acme Corp</p>
						</div>
						<div class="col">
							<span>Phone</span>
							<p>9876764875</p>
						</div>
						<div class="col">
							<span>Email</span>
							<p>johndoe@gmail.com</p>
						</div>
						<div class="col">
							<span>Contact owner</span>
							<p>John Doe</p>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-body">
				<div class="task-infos">
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
						<li class="nav-item"><a class="nav-link active" href="#task-details" data-bs-toggle="tab">Details</a></li>
						<li class="nav-item"><a class="nav-link" href="#task-related" data-bs-toggle="tab">Related</a></li>
						<li class="nav-item"><a class="nav-link" href="#task-activity" data-bs-toggle="tab">Activity</a></li>

						<li class="nav-item"><a class="nav-link" href="#task-news" data-bs-toggle="tab">News</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane show active" id="task-details">
							<div class="crms-tasks">
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Organization Name</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Record ID</td>
														<td class="border-0">124192692</td>
													</tr>
													<tr>
														<td>Organization Name</td>
														<td>Clampett Oil and Gas Corp.</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Organization Contact Details</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Phone</td>
														<td class="border-0">(626) 847-1294</td>
													</tr>
													<tr>
														<td>Fax</td>
														<td>1234</td>
													</tr>
													<tr>
														<td>Website</td>
														<td>google.com</td>
													</tr>
													<tr>
														<td>LinkedIn</td>
														<td>Lorem ipsum</td>
													</tr>
													<tr>
														<td>Facebook</td>
														<td>lorem Ipsum</td>
													</tr>
													<tr>
														<td>Twitter</td>
														<td>Not Started</td>
													</tr>
													<tr>
														<td>Email Domains</td>
														<td>abc@gmail.com</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Address Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Billing Address</td>
														<td class="border-0">1000 Escalon Street, Palo Alto, CA, 94020, United States map</td>
													</tr>
													<tr>
														<td>Shipping Addres</td>
														<td>United States</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Additional Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Dates to remember</td>
														<td>09/12/2005</td>
													</tr>
													<tr>
														<td>Organization Created</td>
														<td>03-Jun-20 1:14 AM</td>
													</tr>
													<tr>
														<td>Date of Next Activity </td>
														<td>09/12/2005</td>
													</tr>
													<tr>
														<td>Date of Last Activity </td>
														<td>27/01/2006</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Description Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Description</td>
														<td>Lorem ipsum </td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Tag Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Tag List</td>
														<td class="border-0">Lorem Ipsum</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane task-related" id="task-related">
							<div class="row">
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Companies</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Deals</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Projects</h4>
											<span>1</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row pt-3">
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Contacts</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Notes</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Files</h4>
											<span>2</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="crms-tasks p-2">
									<div class="tasks__item crms-task-item active">
										<div class="accordion-header js-accordion-header">Companies</div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Company Name</th>
																<th>Phone</th>
																<th>Billing Country</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<a href="#" class="avatar"><img alt="" src="{{ URL::asset('/assets/img/c-logo2.png')}}"></a>
																	<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Clampett Oil and Gas Corp.</a>
																</td>
																<td>8754554531</td>
																<td>United States</td>
																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<a href="#" class="avatar"><img alt="" src="{{ URL::asset('/assets/img/c-logo.png')}}"></a>
																	<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Acme Corporation</a>
																</td>
																<td>8754554531</td>
																<td>United States</td>
																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Deals</div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Deal Name</th>
																<th>Company</th>
																<th>User Responsible</th>
																<th>Deal Value</th>
																<th></th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Bensolet
																</td>
																<td>Globex</td>
																<td>John Doe</td>
																<td>USD $‎180</td>
																<td><i class="fa fa-star" aria-hidden="true"></i></td>

																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	Ansanio tech
																</td>
																<td>Lecto</td>
																<td>John Smith</td>
																<td>USD $‎180</td>
																<td><i class="fa fa-star" aria-hidden="true"></i></td>

																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Projects</div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Project Name</th>
																<th>Status</th>
																<th>User Responsible</th>
																<th>Date Created</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	Wilmer Deluna
																</td>
																<td>Completed</td>
																<td>Williams</td>
																<td>13-Jul-20 11:37 PM</td>
																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Contacts</div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Name</th>
																<th>Title</th>
																<th>phone</th>
																<th>Email</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Wilmer Deluna
																</td>
																<td>Call Enquiry</td>
																<td>987675656</td>
																<td>william@gmail.com</td>
																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	John Doe
																</td>
																<td>Enquiry</td>
																<td>987675656</td>
																<td>john@gmail.com</td>
																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Notes </div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Name</th>
																<th>Size</th>
																<th>Category</th>
																<th>Date Added</th>
																<th>Added by</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Document
																</td>
																<td>50KB</td>
																<td>Email</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>John Doe</td>
																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	Finance
																</td>
																<td>100KB</td>
																<td>Phone call</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>Smith</td>
																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Files </div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Name</th>
																<th>Size</th>
																<th>Category</th>
																<th>Date Added</th>
																<th>Added by</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Document
																</td>
																<td>50KB</td>
																<td>Phone Enquiry</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>John Doe</td>
																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	Finance
																</td>
																<td>100KB</td>
																<td>Email</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>Smith</td>
																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
							</div>
						</div>
						<div class="tab-pane" id="task-activity">
							<div class="row">
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Total Activities</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Last Activity</h4>
											<span>1</span>
										</div>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="crms-tasks  p-2">
									<div class="tasks__item crms-task-item active">
										<div class="accordion-header js-accordion-header">Upcoming Activity </div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Type</th>
																<th>Activity Name</th>
																<th>Assigned To</th>
																<th>Due Date</th>
																<th>Status</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Meeting
																</td>
																<td>Call Enquiry</td>
																<td>John Doe</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>
																	<label class="container-checkbox">
																		<input type="checkbox" checked>
																		<span class="checkmark"></span>
																	</label>
																</td>

																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Add New Task</a>
																			<a class="dropdown-item" href="#">Add New Event</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	Meeting
																</td>
																<td>Phone Enquiry</td>
																<td>David</td>
																<td>13-Jul-20 11:37 PM</td>

																<td>
																	<label class="container-checkbox">
																		<input type="checkbox" checked>
																		<span class="checkmark"></span>
																	</label>
																</td>

																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Add New Task</a>
																			<a class="dropdown-item" href="#">Add New Event</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Past Activity </div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Type</th>
																<th>Activity Name</th>
																<th>Assigned To</th>
																<th>Due Date</th>
																<th>Status</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Meeting
																</td>
																<td>Call Enquiry</td>
																<td>John Doe</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>
																	<label class="container-checkbox">
																		<input type="checkbox" checked>
																		<span class="checkmark"></span>
																	</label>
																</td>

																<td class="text-center">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Add New Task</a>
																			<a class="dropdown-item" href="#">Add New Event</a>

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
							</div>
						</div>
						<div class="tab-pane" id="task-news">
							<div class="row">
								<div class="col-md-12">
									<h4>News Items</h4>
									<p>Current news items about this Organization are sourced from Google News</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Modal -->
<div class="modal right fade" id="add_activity" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Schedule an Activity</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form class="forms-sampme">
					<div class="row">

						<div class="col-sm-12">
							<div class="form-group">
								<input class="form-control" type="text" name="deal-name" id="deal-name" value="Call">
							</div>
							<div class="btn-group mb-3">
								<button type="button" class="btn btn-light"><i class="fa fa-phone" aria-hidden="true"></i></button>
								<button type="button" class="btn btn-light"><i class="fa fa-users" aria-hidden="true"></i></button>
								<button type="button" class="btn btn-light"><i class="fa fa-clock-o" aria-hidden="true"></i></button>
								<button type="button" class="btn btn-light"><i class="fa fa-flag" aria-hidden="true"></i></button>
								<button type="button" class="btn btn-light"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
								<button type="button" class="btn btn-light"><i class="fa fa-cutlery" aria-hidden="true"></i></button>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
									</div>
									<div class="col-md-3">
										<select class="form-control">
											<option>02:00</option>
											<option>03:00</option>
										</select>
									</div>
									<div class="col-md-3">
										<select class="form-control">
											<option>02:00</option>
											<option>03:00</option>

										</select>
									</div>
									<div class="col-md-3">
										<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<div class="row m-0">
									<p>Add <a href="">Guests</a>, <a href="">Location</a>, <a href="">Description</a></p>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<select class="form-control">
									<option>Busy</option>
									<option>Free</option>
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control mb-2" rows="3" placeholder="Notes"></textarea>
								<span class="pt-2">Notes are private and visible only within your Pipedrive account</span>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<select class="form-control">
									<option>John Doe</option>
									<option>John Smith</option>
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Deal or Lead">

							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="People">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Organization">
							</div>
						</div>

					</div>

					<div class="submit-section mt-0">
						<div class="form-check mb-4">
							<input type="checkbox" id="mark-as-done">
							<label for="mark-as-done">Mark as Done</label>
						</div>

					</div>
					<div class="text-center">
						<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
						<button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div><!-- modal -->

<!--Deal details Modal -->
<div class="modal right fade" id="deal-details" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">

				<div class="row w-100">
					<div class="col-md-7 account d-flex">
						<div class="company_img">
							<img src="{{ URL::asset('/assets/img/c-logo.png')}}" alt="User" class="user-image">
						</div>
						<div>
							<p class="mb-0">Company</p>
							<span class="modal-title">Clampett Oil and Gas Corp</span>
							<span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>
							<span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
						</div>

					</div>
					<div class="col-md-5 text-end">
						<ul class="list-unstyled list-style-none">
							<li class="dropdown list-inline-item"><br />
								<a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Actions </a>
								<div class="dropdown-menu">
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
							</li>

						</ul>

					</div>
				</div>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="card shadow p-2 due-dates">
				<div class="row m-0">
					<div class="col">
						<span>Title</span>
						<p></p>
					</div>
					<div class="col">
						<span>Companies</span>
						<p></p>
					</div>
					<div class="col">
						<span>Phone</span>
						<p>9876764875</p>
					</div>
					<div class="col">
						<span>Email</span>
						<p>johndoe@gmail.com</p>
					</div>
					<div class="col">
						<span>Contact owner</span>
						<p>John Doe</p>
					</div>
				</div>
			</div>

			<div class="modal-body">
				<div class="row pb-2">
					<div class="col">
						<span>Pipeline: Deal Pipeline</span>
					</div>
					<div class="col text-end">
						<span>Deal State: closed won</span>
					</div>
				</div>
				<div class="row">
					<div class="pipeline-small flat pl-3 pr-3 w-100">
						<a class="won noselect tipped-top text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Pipeline: Deal Pipeline">&nbsp;<i class="fa fa-check" aria-hidden="true"></i><br><span>Prospecting</span></a>
						<a class="won noselect tipped-top bg-gray text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Pipeline: Deal Pipeline">&nbsp;<i class="fa fa-check" aria-hidden="true"></i><br><span>Qualification</span></a>
						<a class="won noselect tipped-top text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Pipeline: Deal Pipeline">&nbsp;<i class="fa fa-check" aria-hidden="true"></i><br><span>Needs Analysis</span></a>
						<a class="won noselect tipped-top text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Pipeline: Deal Pipeline">&nbsp;<i class="fa fa-check" aria-hidden="true"></i><br><span>Proposals</span></a>
						<a class="won noselect tipped-top text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Pipeline: Deal Pipeline">&nbsp;<i class="fa fa-check" aria-hidden="true"></i><br><span>Nogatiation</span></a>
						<a class="won noselect tipped-top text-white padding" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Pipeline: Deal Pipeline">&nbsp;closed win</a>
					</div>
				</div>
				<div class="task-infos pt-3">
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
						<li class="nav-item"><a class="nav-link active" href="#pipeline-task-details" data-bs-toggle="tab">Details</a></li>
						<li class="nav-item"><a class="nav-link" href="#pipeline-task-related" data-bs-toggle="tab">Related</a></li>

					</ul>
					<div class="tab-content">
						<div class="tab-pane show active" id="pipeline-task-details">
							<div class="crms-tasks">
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Task Details</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Record ID</td>
														<td>124192692</td>
													</tr>
													<tr>
														<td>Task Name</td>
														<td>1. Personalize your account</td>
													</tr>
													<tr>
														<td>Assigned To</td>
														<td>John Doe</td>
													</tr>
													<tr>
														<td>Date Due</td>
														<td>-</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Additional Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Start Date</td>
														<td>-</td>
													</tr>
													<tr>
														<td>Reminder Date</td>
														<td>-</td>
													</tr>
													<tr>
														<td>Repeats</td>
														<td></td>
													</tr>
													<tr>
														<td>Progress</td>
														<td>0%</td>
													</tr>
													<tr>
														<td>Priorit</td>
														<td>Medium</td>
													</tr>
													<tr>
														<td>Status</td>
														<td>Not Started</td>
													</tr>
													<tr>
														<td>Last Updated</td>
														<td>04-Jun-20</td>
													</tr>
													<tr>
														<td>Created</td>
														<td>03-Jun-20 1:14 AM</td>
													</tr>
													<tr>
														<td>Task Created By</td>
														<td>John Doe</td>
													</tr>
													<tr>
														<td>Task Owner</td>
														<td>John Doe</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Related To</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Related To</td>
														<td>-</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Description Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Description</td>
														<td>-</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Task Comments</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<button class="btn btn-secondary text-white w-25">Add Comments</button>
										</div>
									</div>
								</div>

								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Permissions</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Task visibility</td>
														<td>Private</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane task-related" id="pipeline-task-related">
							<div class="row pt-3">
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Companies</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Deals</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Projects</h4>
											<span>1</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row pt-3 pb-4">
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Contacts</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Notes</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Files</h4>
											<span>2</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="crms-tasks  p-2">
									<div class="tasks__item crms-task-item active">
										<div class="accordion-header js-accordion-header">Companies <span class="badge badge-secondary float-end">2</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Company Name</th>
																<th>Phone</th>
																<th>Billing Country</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<a href="#" class="avatar"><img alt="" src="{{ URL::asset('/assets/img/c-logo2.png')}}"></a>
																	<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Clampett Oil and Gas Corp.</a>
																</td>
																<td>8754554531</td>
																<td>United States</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<a href="#" class="avatar"><img alt="" src="{{ URL::asset('/assets/img/c-logo.png')}}"></a>
																	<a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Acme Corporation</a>
																</td>
																<td>8754554531</td>
																<td>United States</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Deals <span class="badge badge-secondary float-end">2</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Deal Name</th>
																<th>Company</th>
																<th>User Responsible</th>
																<th>Deal Value</th>
																<th></th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Bensolet
																</td>
																<td>Globex</td>
																<td>John Doe</td>
																<td>USD $‎180</td>
																<td><i class="fa fa-star" aria-hidden="true"></i></td>

																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	Ansanio tech
																</td>
																<td>Lecto</td>
																<td>John Smith</td>
																<td>USD $‎180</td>
																<td><i class="fa fa-star" aria-hidden="true"></i></td>

																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Projects <span class="badge badge-secondary float-end">1</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Project Name</th>
																<th>Status</th>
																<th>User Responsible</th>
																<th>Date Created</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	Wilmer Deluna
																</td>
																<td>Completed</td>
																<td>Williams</td>
																<td>13-Jul-20 11:37 PM</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Contacts <span class="badge badge-secondary float-end">2</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Name</th>
																<th>Title</th>
																<th>phone</th>
																<th>Email</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Wilmer Deluna
																</td>
																<td>Call Enquiry</td>
																<td>987675656</td>
																<td>william@gmail.com</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	John Doe
																</td>
																<td>Enquiry</td>
																<td>987675656</td>
																<td>john@gmail.com</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Notes <span class="badge badge-secondary float-end">2</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Name</th>
																<th>Size</th>
																<th>Category</th>
																<th>Date Added</th>
																<th>Added by</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Document
																</td>
																<td>50KB</td>
																<td>-</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>John Doe</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	Finance
																</td>
																<td>100KB</td>
																<td>-</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>Smith</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Files <span class="badge badge-secondary float-end">2</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Name</th>
																<th>Size</th>
																<th>Category</th>
																<th>Date Added</th>
																<th>Added by</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Document
																</td>
																<td>50KB</td>
																<td>-</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>John Doe</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	Finance
																</td>
																<td>100KB</td>
																<td>-</td>
																<td>13-Jul-20 11:37 PM</td>
																<td>Smith</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
							</div>
						</div>
					</div>

				</div>
			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->

<!--system users Modal -->
<div class="modal right fade" id="system-user" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close"> </button>
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
				<div class="row w-100">
					<div class="col-md-7 account d-flex">
						<div class="company_img">
							<img src="{{ URL::asset('/assets/img/c-logo.png')}}" alt="User" class="user-image">
						</div>
						<div>
							<p class="mb-0">Company</p>
							<span class="modal-title">Clampett Oil and Gas Corp</span>
							<span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>
							<span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
						</div>

					</div>
					<div class="col-md-5 text-end">
						<ul class="list-unstyled list-style-none">
							<li class="dropdown list-inline-item"><br />
								<a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Actions </a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Edit This Contact</a>
									<a class="dropdown-item" href="#">Change Contact Image</a>
									<a class="dropdown-item" href="#">Delete This Contact</a>
									<a class="dropdown-item" href="#">Clone This Contact</a>
									<a class="dropdown-item" href="#">Change Record Owner</a>
									<a class="dropdown-item" href="#">Generate Merge Document</a>
									<a class="dropdown-item" href="#">Change Contact To Lead</a>
									<a class="dropdown-item" href="#">Print This Contact</a>
									<a class="dropdown-item" href="#">Email This Contact</a>
									<a class="dropdown-item" href="#">Add New Task For Contact</a>
									<a class="dropdown-item" href="#">Add New Event For Contact</a>
									<a class="dropdown-item" href="#">Add Activity Set To Contact</a>
									<a class="dropdown-item" href="#">Add New Deal For Contact</a>
									<a class="dropdown-item" href="#">Add New Project For Contact</a>
								</div>
							</li>

						</ul>

					</div>
				</div>

			</div>

			<div class="card shadow p-2 due-dates">
				<div class="row m-0">
					<div class="col">
						<span>Title</span>
						<p></p>
					</div>
					<div class="col">
						<span>Companies</span>
						<p></p>
					</div>
					<div class="col">
						<span>Phone</span>
						<p>9876764875</p>
					</div>
					<div class="col">
						<span>Email</span>
						<p>johndoe@gmail.com</p>
					</div>
					<div class="col">
						<span>Contact owner</span>
						<p>John Doe</p>
					</div>
				</div>
			</div>

			<div class="modal-body">
				<div class="task-infos">
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
						<li class="nav-item"><a class="nav-link active" href="#task-details" data-bs-toggle="tab">Details</a></li>
						<li class="nav-item"><a class="nav-link" href="#task-related" data-bs-toggle="tab">Related</a></li>
						<li class="nav-item"><a class="nav-link" href="#task-activity" data-bs-toggle="tab">Activity</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane show active" id="task-details">
							<div class="crms-tasks">
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Name & Occupation</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Record ID</td>
														<td class="border-0">124192692</td>
													</tr>
													<tr>
														<td class="border-0">Name</td>
														<td class="border-0">John Doe</td>
													</tr>
													<tr>
														<td>Company</td>
														<td></td>
													</tr>
													<tr>
														<td>Title</td>
														<td>-</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Contact Details</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Email</td>
														<td class="border-0">johndoe@gmail.com</td>
													</tr>
													<tr>
														<td>Email Opted out</td>
														<td>
															<div class="form-check m-0 ps-0">
																<label class="form-check-label">
																	<input class="checkbox" type="checkbox"> <i class="input-helper"></i><i class="input-helper"></i><i class="input-helper"></i></label>
															</div>
														</td>
													</tr>
													<tr>
														<td>Phone</td>
														<td></td>
													</tr>
													<tr>
														<td>Home Phone</td>
														<td></td>
													</tr>
													<tr>
														<td>Mobile Phone</td>
														<td></td>
													</tr>
													<tr>
														<td>Other Phone</td>
														<td></td>
													</tr>
													<tr>
														<td>Assistant Phone</td>
														<td></td>
													</tr>
													<tr>
														<td>Assistant Name</td>
														<td></td>
													</tr>
													<tr>
														<td>Fax</td>
														<td></td>
													</tr>
													<tr>
														<td>Linkedin</td>
														<td></td>
													</tr>
													<tr>
														<td>Facebook</td>
														<td></td>
													</tr>
													<tr>
														<td>Twitter</td>
														<td></td>
													</tr>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Address Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Mailling Address</td>
														<td class="border-0">-</td>
													</tr>
													<tr>
														<td>Other Address</td>
														<td>-</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Dates To Remember</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Dates to Remember</td>
														<td class="border-0">-</td>
													</tr>
													<tr>
														<td>Date of Birth</td>
														<td>-</td>
													</tr>

												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Additional Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Date of Next Activity</td>
														<td class="border-0">-</td>
													</tr>
													<tr>
														<td>Date of Last Activity</td>
														<td>-</td>
													</tr>
													<tr>
														<td>Contact Owner</td>
														<td>John Doe</td>
													</tr>
													<tr>
														<td>Contact Created</td>
														<td>Jun 20, 2020</td>
													</tr>

												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Description Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Description</td>
														<td class="border-0">Lorem Ipsum</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Tag List</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Tag List</td>
														<td class="border-0">Lorem Ipsum</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane task-related" id="task-related">
							<div class="row pt-3">
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Companies</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Deals</h4>
											<span>1</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Projects</h4>
											<span>1</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row pt-3 pb-4">
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Contacts</h4>
											<span></span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Notes</h4>
											<span></span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Files</h4>
											<span>1</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="crms-tasks  p-2">
									<div class="tasks__item crms-task-item active">
										<div class="accordion-header js-accordion-header">Companies <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Deals <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Projects <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Contacts <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Notes <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Files <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="task-activity">
							<div class="row pt-3">
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Total Activities</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Emails</h4>
											<span>1</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Tasks</h4>
											<span>1</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row pt-3 pb-4">
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Events</h4>
											<span></span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Last Activity</h4>
											<span>2</span>
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="crms-tasks  p-2">
									<div class="tasks__item crms-task-item active">
										<div class="accordion-header js-accordion-header">Upcoming Activity <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Past Activity <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->

<!--Deal details Modal -->
<div class="modal right fade" id="project-details" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close"> </button>
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close xs-close" data-bs-dismiss="modal">×</button>
				<div class="row w-100">
					<div class="col-md-7 account">
						<p class="User-name">Project</p>
						<span><img src="{{ URL::asset('/assets/img/c-logo.png')}}" alt="User" class="user-image" /></span>
						<span class="modal-title">Whirligig G990</span>&nbsp;
						<span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;
						<span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
					<div class="col-md-5 text-end">
						<ul class="list-unstyled list-style-none">
							<li class="dropdown list-inline-item"><br />
								<a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Actions </a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Edit This Project</a>
									<a class="dropdown-item" href="#">Change Project Image</a>
									<a class="dropdown-item" href="#">Clone This Project</a>
									<a class="dropdown-item" href="#">Delete This Project</a>
									<a class="dropdown-item" href="#">Change Record Owner</a>
									<a class="dropdown-item" href="#">Generate Merge Document</a>
									<a class="dropdown-item" href="#">Print This Project</a>
									<a class="dropdown-item" href="#">Add New Task For Project</a>
									<a class="dropdown-item" href="#">Add New Event For Project</a>
									<a class="dropdown-item" href="#">Add Activity Set To Project</a>
								</div>
							</li>

						</ul>

					</div>
				</div>

			</div>

			<div class="card shadow p-2 due-dates">
				<div class="row m-0">
					<div class="col">
						<span>Title</span>
						<p></p>
					</div>
					<div class="col">
						<span>Companies</span>
						<p></p>
					</div>
					<div class="col">
						<span>Phone</span>
						<p>9876764875</p>
					</div>
					<div class="col">
						<span>Email</span>
						<p>johndoe@gmail.com</p>
					</div>
					<div class="col">
						<span>Contact owner</span>
						<p>John Doe</p>
					</div>
				</div>
			</div>

			<div class="modal-body project-pipeline">
				<div class="row pb-2">
					<div class="col">
						<span>Pipeline: Deal Pipeline</span>
					</div>
					<div class="col text-end">
						<span>Deal State: closed won</span>
					</div>
				</div>
				<div class="row">
					<div class="pipeline-small flat pipeline-project p-2 w-100">
						<a class="won noselect tipped-top text-white w-25" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Plan">&nbsp;<i class="fa fa-check" aria-hidden="true"></i><br><span>Plan</span>
							<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#pipeline-stage" data-bs-dismiss="modal"></span>
						</a>
						<a class="won noselect tipped-top bg-gray text-white w-12" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Design">&nbsp;<i class="fa fa-check" aria-hidden="true"></i><br><span>Design</span>
							<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#pipeline-stage" data-bs-dismiss="modal"></span>
						</a>
						<a class="won noselect tipped-top text-white w-25" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Develop">&nbsp;<i class="fa fa-check" aria-hidden="true"></i><br><span>Develop</span>
							<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#pipeline-stage" data-bs-dismiss="modal"></span>
						</a>

						<a class="won noselect tipped-top text-white padding w-25" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="COmplete">&nbsp;Complete

						</a>
					</div>
				</div>
				<div class="task-infos pt-3">
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
						<li class="nav-item"><a class="nav-link active" href="#pipeline-task-details" data-bs-toggle="tab">Details</a></li>
						<li class="nav-item"><a class="nav-link" href="#pipeline-task-related" data-bs-toggle="tab">Related</a></li>

					</ul>
					<div class="tab-content">
						<div class="tab-pane show active" id="pipeline-task-details">
							<div class="crms-tasks">
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Task Details</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Record ID</td>
														<td>124192692</td>
													</tr>
													<tr>
														<td>Task Name</td>
														<td>1. Personalize your account</td>
													</tr>
													<tr>
														<td>Assigned To</td>
														<td>John Doe</td>
													</tr>
													<tr>
														<td>Date Due</td>
														<td>-</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Additional Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Start Date</td>
														<td>-</td>
													</tr>
													<tr>
														<td>Reminder Date</td>
														<td>-</td>
													</tr>
													<tr>
														<td>Repeats</td>
														<td></td>
													</tr>
													<tr>
														<td>Progress</td>
														<td>0%</td>
													</tr>
													<tr>
														<td>Priorit</td>
														<td>Medium</td>
													</tr>
													<tr>
														<td>Status</td>
														<td>Not Started</td>
													</tr>
													<tr>
														<td>Last Updated</td>
														<td>04-Jun-20</td>
													</tr>
													<tr>
														<td>Created</td>
														<td>03-Jun-20 1:14 AM</td>
													</tr>
													<tr>
														<td>Task Created By</td>
														<td>John Doe</td>
													</tr>
													<tr>
														<td>Task Owner</td>
														<td>John Doe</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Related To</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Related To</td>
														<td>-</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Description Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Description</td>
														<td>-</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Task Comments</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<button class="btn btn-secondary text-white w-25">Add Comments</button>
										</div>
									</div>
								</div>

								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Permissions</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Task visibility</td>
														<td>Private</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane task-related" id="pipeline-task-related">
							<div class="row pt-3">
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Companies</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Deals</h4>
											<span>1</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Projects</h4>
											<span>1</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row pt-3 pb-4">
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Contacts</h4>
											<span></span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Notes</h4>
											<span></span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Files</h4>
											<span>1</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="crms-tasks  p-2">
									<div class="tasks__item crms-task-item active">
										<div class="accordion-header js-accordion-header">Companies <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Deals <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Projects <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Contacts <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Notes <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Files <span class="badge badge-secondary float-end">0</span></div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
		<!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>
<!-- modal -->
<!-- Modal -->
<div class="modal right fade" id="add_report" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="mb-0"><img src="{{ URL::asset('/assets/img/reports.png')}}" alt="Report" class="report-img">&nbsp;&nbsp;Add New Report</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="submit-section mt-0 text-start">
					<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Create</button>&nbsp;&nbsp;
					<button type="button" class="btn btn-secondary btn-rounded cancel-button">Cancel</button>
				</div>
				<div class="row pt-2">
					<div class="col-md-12">
						<form>
							<div class="form-group">
								<label class="col-form-label">Choose a Report Type</label>
								<select class=" form-control form-select">
									<option>Task Report</option>
									<option>Contact Report</option>
									<option>Company report</option>
								</select>
							</div>
						</form>
						<h4 class="pb-2">Report Preview</h4>
						<div class="table-responsive">
							<div class="card">

								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Report Name</th>
											<th>Date Created</th>
											<th>Created By</th>
											<th>Company</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Inventry</td>
											<td>07, Aug 2020</td>
											<td>John Doe</td>
											<td>Solemen</td>
										</tr>
										<tr>
											<td>Project Management</td>
											<td>02, April 2020</td>
											<td>John Doe</td>
											<td>Claimpett</td>
										</tr>
										<tr>
											<td>Evaluation</td>
											<td>02, june 2020</td>
											<td>John Doe</td>
											<td>umbrella</td>
										</tr>

									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div>
<!-- modal -->
<!-- Modal -->
<div class="modal right fade" id="add_task" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add Tasks</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form>
							<h4>Task Details</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Task Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="task-name" id="task-name" placeholder="Task Name">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Assigned To</label>
									<select class=" form-control form-select">
										<option>Me</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Category</label>
									<select class=" form-control form-select">
										<option>Email</option>
										<option>Follow up</option>
										<option>Get Started</option>
										<option>Meeting</option>
										<option>Phone call</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Due Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
								</div>
							</div>
							<h4>Additional Information</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Start Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Reminder Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Progress</label>
									<input class="form-control" type="text" name="progress" placeholder="Progress">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Progress</label>
									<input class="form-control" type="text" name="progress" placeholder="Progress">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Priority</label>
									<select class=" form-control form-select">
										<option>Low</option>
										<option>Medium</option>
										<option>High</option>

									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Priority</label>
									<select class=" form-control form-select">
										<option>Low</option>
										<option>Medium</option>
										<option>High</option>

									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Status</label>
									<select class=" form-control form-select">
										<option>Not Started</option>
										<option>Inprogress</option>
										<option>Deferred</option>
										<option>Waiting</option>
									</select>
								</div>

							</div>
							<h4>Related To</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Related To</label>
									<select class=" form-control form-select">
										<option>Select</option>
										<option>Test</option>
									</select>
								</div>

							</div>
							<h4>Description Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Description </label>
									<textarea class="form-control" rows="3" id="description" placeholder="Description"></textarea>
								</div>
							</div>
							<h4>Permissions</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Permission</label>
									<select class=" form-control form-select">
										<option>Task Visibility</option>
										<option>Private Task</option>
									</select>
								</div>

							</div>
							<div class="text-center py-3">
								<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
								<button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div>
<!-- modal -->
<!-- change pipeline stage Modal -->
<div class="modal" id="pipeline-stage">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Change Pipeline Stage</h4>
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label class="col-form-label">New Stage</label>
						<select class="form-control" id="related-to">
							<option>Plan</option>
							<option>Design</option>
							<option>Develop</option>
							<option>Complete</option>
						</select>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer text-center">
				<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
				<button type="button" class="btn btn-secondary btn-rounded cancel-button">Cancel</button>
			</div>

		</div>
	</div>
</div>

<!--modal section starts here-->
<div class="modal fade" id="add-new-list">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add New List View</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form class="forms-sample">
					<div class="form-group row">
						<label for="view-name" class="col-sm-4 col-form-label">New View Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="view-name" placeholder="New View Name">
						</div>
					</div>
					<div class="form-group row pt-4">
						<label class="col-sm-4 col-form-label">Sharing Settings</label>
						<div class="col-sm-8">
							<div class="form-group">
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value=""> Just For Me <i class="input-helper"></i></label>
								</div><br />
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" checked=""> Share Filter with Everyone <i class="input-helper"></i></label>
								</div>
							</div>
						</div>
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
						<button class="btn btn-light">Cancel</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal right fade" id="add_company" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close"> </button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add Company</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form>
							<h4>Organization Name</h4>
							<div class="form-group row">
								<div class="col-md-12">
									<label class="col-form-label">Organization Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text" placeholder="Organization Name" name="organization">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Organization</label>
									<select class="form-control">
										<option>Select</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Title</label>
									<input type="text" class="form-control" name="title" placeholder="Title">
								</div>
							</div>
							<h4>Organization Contact Details</h4>

							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Phone</label>
									<input type="text" class="form-control" name="phone" placeholder="Phone">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Fax</label>
									<input type="text" class="form-control" name="fax" placeholder="Fax">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Website</label>
									<input type="text" class="form-control" name="website" placeholder="Website">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Linkedin</label>
									<input type="text" class="form-control" name="linkedin" placeholder="Linkedin">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Facebook</label>
									<input type="text" class="form-control" name="fb" placeholder="Facebook">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Twitter</label>
									<input type="text" class="form-control" name="twitter" placeholder="Twitter">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Email Domains</label>
									<input type="text" class="form-control" name="domains" placeholder="Email Domains">
								</div>

							</div>
							<h4>Address Information</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Billing Address</label>
									<textarea class="form-control" rows="3" name="billing-address" placeholder="Billing Address"></textarea>
								</div>
								<div class="col-sm-6 mt-3">
									<label class="col-form-label"></label><br>
									<input type="text" class="form-control" placeholder="Billing City" name="billing-city">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Billing State" name="billing-state">
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Billing Postal code" name="billing-postal-code">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Billing Country</label>
									<select class="form-control">
										<option>India</option>
										<option>US</option>
										<option>Japan</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Shipping Address</label>
									<textarea class="form-control" rows="3" name="shipping-address" placeholder="Shipping Address"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Shipping City" name="shipping-city">
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Shipping State" name="shipping-state">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Shipping Postal code" name="shipping-postal-code">
								</div>
								<div class="col-sm-6">
									<select class="form-control">
										<option>India</option>
										<option>US</option>
										<option>Japan</option>
									</select>
								</div>
							</div>
							<h4>Additional Information</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Dates To Remember <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
								</div>
							</div>

							<h4>Description Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Description </label>
									<textarea class="form-control" rows="3" id="description" placeholder="Description"></textarea>
								</div>
							</div>
							<h4>Tag Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Tag List</label>
									<input type="text" class="form-control" name="tag-name" placeholder="Tag List">
								</div>
							</div>
							<h4>Permissions</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Permission</label>
									<select class="form-control">
										<option>Task Visibility</option>
										<option>Private Task</option>
									</select>
								</div>

							</div>
							<div class="text-center py-3">
								<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
								<button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal right fade" id="add_contact" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add Contact</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form>
							<h4>Name & Occupation</h4>
							<div class="form-group row">
								<div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
								<div class="col-md-4">
									<input class="form-control" type="text" placeholder="Prefix" name="prefix">
								</div>
								<div class="col-md-4">
									<input class="form-control" type="text" placeholder="First name" name="prefix-name">
								</div>
								<div class="col-md-4">
									<input class="form-control" type="text" placeholder="Last name" name="last-name">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Organization</label>
									<select class=" form-control form-select">
										<option>Select</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Title</label>
									<input type="text" class="form-control" name="title" placeholder="Title">
								</div>
							</div>
							<h4>Contact Details</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Email</label>
									<input type="text" class="form-control" name="email" placeholder="Email">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Email Opted out</label>
									<div>
										<label class="container-checkbox">
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Phone</label>
									<input type="text" class="form-control" name="phone" placeholder="Phone">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Home Phone</label>
									<input type="text" class="form-control" name="h-phone" placeholder="Phone">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Mobile Phone</label>
									<input type="text" class="form-control" name="m-phone" placeholder="Phone">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Other Phone</label>
									<input type="text" class="form-control" id="o-phone" name="o-phone" placeholder="Phone">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Assistant Phone</label>
									<input type="text" class="form-control" name="assistant-phone" placeholder="Phone">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Assistant Name</label>
									<input type="text" class="form-control" name="assistant-name" placeholder="Assistant Name">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Fax</label>
									<input type="text" class="form-control" name="fax" placeholder="Fax">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Linkedin</label>
									<input type="text" class="form-control" name="linkedin" placeholder="linkedin">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Facebook</label>
									<input type="text" class="form-control" name="fb" placeholder="Facebook">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Twitter</label>
									<input type="text" class="form-control" name="twitter" placeholder="Twitter">
								</div>
							</div>
							<h4>Address Information</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Mailing Address</label>
									<textarea class="form-control" rows="3" name="mailing-address" placeholder="Address"></textarea>
								</div>
								<div class="col-sm-6 mt-3">
									<label class="col-form-label"></label><br>
									<input type="text" class="form-control" placeholder="Mailing City" name="mailing-city">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Mailing State" name="mailing-state">
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Mailing Postal code" name="mailing-postal-code">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Mailing Country</label>
									<select class=" form-control form-select">
										<option>India</option>
										<option>US</option>
										<option>Japan</option>
									</select>
								</div>
								<div class="col-sm-6 mt-3">
									<label class="col-form-label">Other Address</label>
									<textarea class="form-control" rows="3" name="other-address" placeholder="Address"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Other City" name="other-city">
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Other State" name="other-state">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Other Postal code" name="other-postal-code">
								</div>
								<div class="col-sm-6">
									<select class=" form-control form-select">
										<option>India</option>
										<option>US</option>
										<option>Japan</option>
									</select>
								</div>
							</div>
							<h4>Dates To Remember</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Due Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Date of Birth <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
								</div>
							</div>

							<h4>Description Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Description </label>
									<textarea class="form-control" rows="3" id="description" placeholder="Description"></textarea>
								</div>
							</div>
							<h4>Tag Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Tag List</label>
									<input type="text" class="form-control" name="tag-name" placeholder="Tag List">
								</div>
							</div>
							<h4>Permissions</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Permission</label>
									<select class=" form-control form-select">
										<option>Task Visibility</option>
										<option>Private Task</option>
									</select>
								</div>

							</div>
							<div class="text-center py-3">
								<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
								<button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div>
<!-- modal -->
<!-- Modal -->
<div class="modal right fade" id="add_deal" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add Deal</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form>
							<h4>Task Details</h4>
							<div class="form-group row">
								<div class="col-md-6">
									<label class="col-form-label">Deal Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="deal-name" placeholder="Deal Name">
								</div>
								<div class="col-md-6">
									<label class="col-form-label">Company</label>
									<select class=" form-control form-select">
										<option>Select</option>
									</select>
								</div>
							</div>
							<h4>Additional Information</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Caregory</label>
									<select class=" form-control form-select">
										<option>Email</option>
										<option>Follow up</option>
										<option>Get Started</option>
										<option>Meeting</option>
										<option>Phone call</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Probability Of Winning</label>
									<input class="form-control" type="text" name="probability" placeholder="Probability Of Winning">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Forecast Close Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Actual Close Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" placeholder="MM/DD/YY"></div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">User Responsible</label>
									<select class=" form-control form-select">
										<option>John Doe</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Deal Value</label>
									<div class="row">
										<div class="col-md-4">
											<select class=" form-control form-select">
												<option>USD $</option>
												<option>UGX $</option>
											</select>
										</div>
										<div class="col-md-4">
											<input type="text" name="amt" class="form-control" placeholder="Bid Amount">
										</div>
										<div class="col-md-4">
											<select class=" form-control form-select">
												<option>Fixed Bid</option>
												<option>Per Hour</option>
												<option>Per Day</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<h4>Description Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Description </label>
									<textarea class="form-control" rows="3" id="description" placeholder="Description"></textarea>
								</div>
							</div>
							<h4>Tag Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Tag List</label>
									<input type="text" class="form-control" name="tag-name" placeholder="Tag List">
								</div>
							</div>
							<h4>Pipeline & Stages</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Pipeline</label>
									<select class=" form-control form-select">
										<option>Deal Pipeline</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="col-form-label">Stage</label>
									<select class=" form-control form-select">
										<option>select</option>
									</select>
								</div>

							</div>
							<h4>Permissions</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Visibility</label>
									<select class=" form-control form-select">
										<option>Everyone</option>
										<option>Select a team</option>
									</select>
								</div>

							</div>
							<div class="text-center py-3">
								<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
								<button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div>
<!-- modal -->
<!--system users Modal -->
<div class="modal right fade" id="leads-details" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
				<div class="row w-100">
					<div class="col-md-7 account d-flex">
						<div class="company_img"><img src="assets/img/system-user.png" alt="User" class="user-image" /></div>
						<div>
							<p class="mb-0">Lead</p>
							<span class="modal-title">Anne Lynch</span>&nbsp;
							<span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;
							<span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="col-md-5 text-end">
						<ul class="list-unstyled list-style-none">
							<li class="dropdown list-inline-item"><br />
								<a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Actions </a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Edit This Lead</a>
									<a class="dropdown-item" href="#">Change Lead Image</a>
									<a class="dropdown-item" href="#">Delete This Lead</a>
									<a class="dropdown-item" href="#">Email This Lead</a>
									<a class="dropdown-item" href="#">Clone This Lead</a>
									<a class="dropdown-item" href="#">Change Record Owner</a>
									<a class="dropdown-item" href="#">Generate Merge Document</a>
									<a class="dropdown-item" href="#">Change Lead to Contact</a>
									<a class="dropdown-item" href="#">Convert Lead</a>
									<a class="dropdown-item" href="#">Print This Lead</a>
									<a class="dropdown-item" href="#">Merge Into Lead</a>
									<a class="dropdown-item" href="#">SmartMerge Lead</a>
									<a class="dropdown-item" href="#">Add Activity Set To Lead</a>
									<a class="dropdown-item" href="#">Add New Event For Lead</a>
								</div>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<div class="card shadow p-2 due-dates">
				<div class="row m-0">
					<div class="col">
						<span>Lead Status</span>
						<p>Not Contacted</p>
					</div>
					<div class="col">
						<span>Name</span>
						<p>Anne Lynch</p>
					</div>
					<div class="col">
						<span>Lead Source</span>
						<p>Phone Enquiry</p>
					</div>
					<div class="col">
						<span>Lead Rating</span>
						<p>0</p>
					</div>
					<div class="col">
						<span>Lead owner</span>
						<p>John Doe</p>
					</div>
				</div>
			</div>

			<div class="row pt-3">
				<div class="col-md-12">
					<ul class="cd-breadcrumb triangle nav nav-tabs w-100 pl-2 crms-steps" role="tablist">
						<li role="presentation">
							<a href="#not-contacted" class="active" aria-controls="not-contacted" role="tab" data-bs-toggle="tab" aria-expanded="true">
								<span class="octicon octicon-light-bulb"></span>Not Contacted
							</a>
						</li>
						<li role="presentation" class="">
							<a href="#attempted-contact" aria-controls="attempted-contact" role="tab" data-bs-toggle="tab" aria-expanded="false">
								<span class="octicon octicon-diff-added"></span>Attempted Contact
							</a>
						</li>
						<li role="presentation" class="">
							<a href="#contact" aria-controls="contact" role="tab" data-bs-toggle="tab" aria-expanded="false">
								<span class="octicon octicon-comment-discussion"></span>Contact
							</a>
						</li>
						<li role="presentation" class="">
							<a href="#converted" aria-controls="contact" role="tab" data-bs-toggle="tab" aria-expanded="false">
								<span class="octicon octicon-comment-discussion"></span>Converted
							</a>
						</li>
						<li role="presentation" class="d-none">
							<a href="#converted" aria-controls="converted" role="tab" data-bs-toggle="tab" aria-expanded="false">
								<span class="octicon octicon-verified"></span>Converted
							</a>
						</li>

					</ul>
				</div>
			</div>

			<div class="tab-content pipeline-tabs">
				<div role="tabpanel" class="tab-pane active" id="not-contacted">
					<div class="modal-body">
						<div class="task-infos">
							<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
								<li class="nav-item"><a class="nav-link active" href="#not-contact-task-details" data-bs-toggle="tab">Details</a></li>
								<li class="nav-item"><a class="nav-link" href="#not-contact-task-related" data-bs-toggle="tab">Related</a></li>
								<li class="nav-item"><a class="nav-link" href="#not-contact-task-activity" data-bs-toggle="tab">Activity</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane show active" id="not-contact-task-details">
									<div class="crms-tasks">
										<div class="tasks__item crms-task-item active">
											<div class="accordion-header js-accordion-header">Lead Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Record ID</td>
																<td>124192692</td>
															</tr>
															<tr>
																<td>Name</td>
																<td>Anny Lench</td>
															</tr>
															<tr>
																<td>Title</td>
																<td>VP of Sales</td>
															</tr>
															<tr>
																<td>Organization</td>
																<td>Howe-Blanda LLC</td>
															</tr>
															<tr>
																<td>Lead Status</td>
																<td>OPEN - NotContacted</td>
															</tr>
															<tr>
																<td>User Responsible</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Link Email Address</td>
																<td>abc@gmail.com</td>
															</tr>
															<tr>
																<td>Lead Owner</td>
																<td>John Doe</td>
															</tr>
															<tr>
																<td>Lead Created</td>
																<td>03-Jun-20 1:14 AM</td>
															</tr>
															<tr>
																<td>Date of Last Activity</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Date of Next Activity</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Lead Rating</td>
																<td>0</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Additional Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Email Address</td>
																<td>abc@gmail.com</td>
															</tr>
															<tr>
																<td>Email Opted Out</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Phone</td>
																<td>(406) 653-3860</td>
															</tr>
															<tr>
																<td>Mobile Phone</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Fax</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Website</td>
																<td></td>
															</tr>
															<tr>
																<td>Industry</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Number of Employees</td>
																<td>2</td>
															</tr>
															<tr>
																<td>Lead Source</td>
																<td>Phone Enquiry</td>
															</tr>

														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Address Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td> Address</td>
																<td>1000 Escalon Street, Palo Alto, CA, 94020, United States map</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Description Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Description</td>
																<td>Interested in model: Whirlygig T950 </td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>

										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Tag Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td class="border-0">Tag List</td>
																<td class="border-0">Lorem Ipsum</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Lead Conversion Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Converted Contact</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Converted Organization</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Converted Opportunity</td>
																<td>-</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane task-related" id="not-contact-task-related">
									<div class="row pt-3 pb-4">

										<div class="col-md-4">
											<div class="card bg-gradient-danger card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Notes</h4>
													<span>2</span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card bg-gradient-info card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Files</h4>
													<span>2</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="crms-tasks  p-2">
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Notes <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Note Title</th>
																		<th>Date Created</th>
																		<th>Created By</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Whirligig
																		</td>
																		<td>13-Jul-20 11:37 PM </td>
																		<td>John Doe</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Vb of sales
																		</td>
																		<td>13-Jul-20 11:37 PM </td>
																		<td>John Smith</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

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
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Files <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Size</th>
																		<th>Category</th>
																		<th>Date Added</th>
																		<th>Added by</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Document
																		</td>
																		<td>50KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>John Doe</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Finance
																		</td>
																		<td>100KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>Smith</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

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
									</div>
								</div>
								<div class="tab-pane" id="not-contact-task-activity">
									<div class="row pt-3">
										<div class="col-md-4">
											<div class="card bg-gradient-danger card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Total Activities</h4>
													<span>2</span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card bg-gradient-success card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Last Activity</h4>
													<span>1</span>
												</div>
											</div>
										</div>

									</div>

									<div class="row">
										<div class="crms-tasks  p-2">
											<div class="tasks__item crms-task-item active">
												<div class="accordion-header js-accordion-header">Upcoming Activity <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Type</th>
																		<th>Activity Name</th>
																		<th>Assigned To</th>
																		<th>Due Date</th>
																		<th>Status</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Call Enquiry</td>
																		<td>John Doe</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Phone Enquiry</td>
																		<td>David</td>
																		<td>13-Jul-20 11:37 PM</td>

																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

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
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Past Activity <span class="badge badge-secondary float-end">1</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Type</th>
																		<th>Activity Name</th>
																		<th>Assigned To</th>
																		<th>Due Date</th>
																		<th>Status</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Call Enquiry</td>
																		<td>John Doe</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

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
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="attempted-contact">
					<div class="modal-body">
						<div class="task-infos">
							<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
								<li class="nav-item"><a class="nav-link active" href="#attempted-task-details" data-bs-toggle="tab">Details</a></li>
								<li class="nav-item"><a class="nav-link" href="#attempted-task-related" data-bs-toggle="tab">Related</a></li>
								<li class="nav-item"><a class="nav-link" href="#attempted-task-activity" data-bs-toggle="tab">Activity</a></li>

							</ul>
							<div class="tab-content">
								<div class="tab-pane show active" id="attempted-task-details">
									<div class="crms-tasks">
										<div class="tasks__item crms-task-item active">
											<div class="accordion-header js-accordion-header">Lead Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Record ID</td>
																<td>124192692</td>
															</tr>
															<tr>
																<td>Name</td>
																<td>Anny Lench</td>
															</tr>
															<tr>
																<td>Title</td>
																<td>VP of Sales</td>
															</tr>
															<tr>
																<td>Organization</td>
																<td>Howe-Blanda LLC</td>
															</tr>
															<tr>
																<td>Lead Status</td>
																<td>OPEN - NotContacted</td>
															</tr>
															<tr>
																<td>User Responsible</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Link Email Address</td>
																<td>abc@gmail.com</td>
															</tr>
															<tr>
																<td>Lead Owner</td>
																<td>John Doe</td>
															</tr>
															<tr>
																<td>Lead Created</td>
																<td>03-Jun-20 1:14 AM</td>
															</tr>
															<tr>
																<td>Date of Last Activity</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Date of Next Activity</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Lead Rating</td>
																<td>0</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Additional Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Email Address</td>
																<td>abc@gmail.com</td>
															</tr>
															<tr>
																<td>Email Opted Out</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Phone</td>
																<td>(406) 653-3860</td>
															</tr>
															<tr>
																<td>Mobile Phone</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Fax</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Website</td>
																<td></td>
															</tr>
															<tr>
																<td>Industry</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Number of Employees</td>
																<td>2</td>
															</tr>
															<tr>
																<td>Lead Source</td>
																<td>Phone Enquiry</td>
															</tr>

														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Address Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td> Address</td>
																<td>1000 Escalon Street, Palo Alto, CA, 94020, United States map</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Description Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Description</td>
																<td>Interested in model: Whirlygig T950 </td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>

										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Tag Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td class="border-0">Tag List</td>
																<td class="border-0">Lorem Ipsum</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Lead Conversion Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Converted Contact</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Converted Organization</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Converted Opportunity</td>
																<td>-</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane task-related" id="attempted-task-related">
									<div class="row pt-3 pb-4">

										<div class="col-md-4">
											<div class="card bg-gradient-danger card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Notes</h4>
													<span>2</span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card bg-gradient-info card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Files</h4>
													<span>2</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="crms-tasks  p-2">
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Notes <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Size</th>
																		<th>Category</th>
																		<th>Date Added</th>
																		<th>Added by</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Document
																		</td>
																		<td>50KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>John Doe</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Finance
																		</td>
																		<td>100KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>Smith</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

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
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Files <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Size</th>
																		<th>Category</th>
																		<th>Date Added</th>
																		<th>Added by</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Document
																		</td>
																		<td>50KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>John Doe</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Finance
																		</td>
																		<td>100KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>Smith</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

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
									</div>
								</div>
								<div class="tab-pane" id="attempted-task-activity">
									<div class="row pt-3">
										<div class="col-md-4">
											<div class="card bg-gradient-danger card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Total Activities</h4>
													<span>2</span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card bg-gradient-success card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Last Activity</h4>
													<span>2</span>
												</div>
											</div>
										</div>

									</div>

									<div class="row">
										<div class="crms-tasks  p-2">
											<div class="tasks__item crms-task-item active">
												<div class="accordion-header js-accordion-header">Upcoming Activity <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Type</th>
																		<th>Activity Name</th>
																		<th>Assigned To</th>
																		<th>Due Date</th>
																		<th>Status</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Call Enquiry</td>
																		<td>John Doe</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Phone Enquiry</td>
																		<td>David</td>
																		<td>13-Jul-20 11:37 PM</td>

																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

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
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Past Activity <span class="badge badge-secondary float-end">1</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Type</th>
																		<th>Activity Name</th>
																		<th>Assigned To</th>
																		<th>Due Date</th>
																		<th>Status</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Call Enquiry</td>
																		<td>John Doe</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

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
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="contact">
					<div class="modal-body">
						<div class="task-infos">
							<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
								<li class="nav-item"><a class="nav-link active" href="#contact-task-details" data-bs-toggle="tab">Details</a></li>
								<li class="nav-item"><a class="nav-link" href="#contact-task-related" data-bs-toggle="tab">Related</a></li>
								<li class="nav-item"><a class="nav-link" href="#contact-task-activity" data-bs-toggle="tab">Activity</a></li>

							</ul>
							<div class="tab-content">
								<div class="tab-pane show active" id="contact-task-details">
									<div class="crms-tasks">
										<div class="tasks__item crms-task-item active">
											<div class="accordion-header js-accordion-header">Lead Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Record ID</td>
																<td>124192692</td>
															</tr>
															<tr>
																<td>Name</td>
																<td>Anny Lench</td>
															</tr>
															<tr>
																<td>Title</td>
																<td>VP of Sales</td>
															</tr>
															<tr>
																<td>Organization</td>
																<td>Howe-Blanda LLC</td>
															</tr>
															<tr>
																<td>Lead Status</td>
																<td>OPEN - NotContacted</td>
															</tr>
															<tr>
																<td>User Responsible</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Link Email Address</td>
																<td>abc@gmail.com</td>
															</tr>
															<tr>
																<td>Lead Owner</td>
																<td>John Doe</td>
															</tr>
															<tr>
																<td>Lead Created</td>
																<td>03-Jun-20 1:14 AM</td>
															</tr>
															<tr>
																<td>Date of Last Activity</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Date of Next Activity</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Lead Rating</td>
																<td>0</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Additional Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Email Address</td>
																<td>abc@gmail.com</td>
															</tr>
															<tr>
																<td>Email Opted Out</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Phone</td>
																<td>(406) 653-3860</td>
															</tr>
															<tr>
																<td>Mobile Phone</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Fax</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Website</td>
																<td></td>
															</tr>
															<tr>
																<td>Industry</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Number of Employees</td>
																<td>2</td>
															</tr>
															<tr>
																<td>Lead Source</td>
																<td>Phone Enquiry</td>
															</tr>

														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Address Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td> Address</td>
																<td>1000 Escalon Street, Palo Alto, CA, 94020, United States map</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Description Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Description</td>
																<td>Interested in model: Whirlygig T950 </td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>

										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Tag Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td class="border-0">Tag List</td>
																<td class="border-0">Lorem Ipsum</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Lead Conversion Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Converted Contact</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Converted Organization</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Converted Opportunity</td>
																<td>-</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane task-related" id="contact-task-related">
									<div class="row pt-3 pb-4">

										<div class="col-md-4">
											<div class="card bg-gradient-danger card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Notes</h4>
													<span>2</span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card bg-gradient-info card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Files</h4>
													<span>2</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="crms-tasks  p-2">
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Notes <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Size</th>
																		<th>Category</th>
																		<th>Date Added</th>
																		<th>Added by</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Document
																		</td>
																		<td>50KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>John Doe</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Finance
																		</td>
																		<td>100KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>Smith</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

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
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Files <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Size</th>
																		<th>Category</th>
																		<th>Date Added</th>
																		<th>Added by</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Document
																		</td>
																		<td>50KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>John Doe</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Finance
																		</td>
																		<td>100KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>Smith</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

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
									</div>
								</div>
								<div class="tab-pane" id="contact-task-activity">
									<div class="row pt-3">
										<div class="col-md-4">
											<div class="card bg-gradient-danger card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Total Activities</h4>
													<span>2</span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card bg-gradient-success card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Last Activity</h4>
													<span>1</span>
												</div>
											</div>
										</div>

									</div>

									<div class="row">
										<div class="crms-tasks  p-2">
											<div class="tasks__item crms-task-item active">
												<div class="accordion-header js-accordion-header">Upcoming Activity <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Type</th>
																		<th>Activity Name</th>
																		<th>Assigned To</th>
																		<th>Due Date</th>
																		<th>Status</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Call Enquiry</td>
																		<td>John Doe</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Phone Enquiry</td>
																		<td>David</td>
																		<td>13-Jul-20 11:37 PM</td>

																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

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
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Past Activity <span class="badge badge-secondary float-end">1</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Type</th>
																		<th>Activity Name</th>
																		<th>Assigned To</th>
																		<th>Due Date</th>
																		<th>Status</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Call Enquiry</td>
																		<td>John Doe</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

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
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="converted">
					<div class="modal-body">
						<div class="task-infos">
							<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
								<li class="nav-item"><a class="nav-link active" href="#converted-task-details" data-bs-toggle="tab">Details</a></li>
								<li class="nav-item"><a class="nav-link" href="#converted-task-related" data-bs-toggle="tab">Related</a></li>
								<li class="nav-item"><a class="nav-link" href="#converted-task-activity" data-bs-toggle="tab">Activity</a></li>

							</ul>
							<div class="tab-content">
								<div class="tab-pane show active" id="converted-task-details">
									<div class="crms-tasks">
										<div class="tasks__item crms-task-item active">
											<div class="accordion-header js-accordion-header">Lead Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Record ID</td>
																<td>124192692</td>
															</tr>
															<tr>
																<td>Name</td>
																<td>Anny Lench</td>
															</tr>
															<tr>
																<td>Title</td>
																<td>VP of Sales</td>
															</tr>
															<tr>
																<td>Organization</td>
																<td>Howe-Blanda LLC</td>
															</tr>
															<tr>
																<td>Lead Status</td>
																<td>OPEN - NotContacted</td>
															</tr>
															<tr>
																<td>User Responsible</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Link Email Address</td>
																<td>abc@gmail.com</td>
															</tr>
															<tr>
																<td>Lead Owner</td>
																<td>John Doe</td>
															</tr>
															<tr>
																<td>Lead Created</td>
																<td>03-Jun-20 1:14 AM</td>
															</tr>
															<tr>
																<td>Date of Last Activity</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Date of Next Activity</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Lead Rating</td>
																<td>0</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Additional Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Email Address</td>
																<td>abc@gmail.com</td>
															</tr>
															<tr>
																<td>Email Opted Out</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Phone</td>
																<td>(406) 653-3860</td>
															</tr>
															<tr>
																<td>Mobile Phone</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Fax</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Website</td>
																<td></td>
															</tr>
															<tr>
																<td>Industry</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Number of Employees</td>
																<td>2</td>
															</tr>
															<tr>
																<td>Lead Source</td>
																<td>Phone Enquiry</td>
															</tr>

														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Address Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td> Address</td>
																<td>1000 Escalon Street, Palo Alto, CA, 94020, United States map</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Description Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Description</td>
																<td>Interested in model: Whirlygig T950 </td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>

										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Tag Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td class="border-0">Tag List</td>
																<td class="border-0">Lorem Ipsum</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
										<div class="tasks__item crms-task-item">
											<div class="accordion-header js-accordion-header">Lead Conversion Information</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
													<table class="table">
														<tbody>
															<tr>
																<td>Converted Contact</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Converted Organization</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Converted Opportunity</td>
																<td>-</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane task-related" id="converted-task-related">
									<div class="row pt-3 pb-4">
										<div class="col-md-4">
											<div class="card bg-gradient-danger card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Notes</h4>
													<span>2</span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card bg-gradient-info card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Files</h4>
													<span>2</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="crms-tasks  p-2">
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Notes <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Size</th>
																		<th>Category</th>
																		<th>Date Added</th>
																		<th>Added by</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Document
																		</td>
																		<td>50KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>John Doe</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Finance
																		</td>
																		<td>100KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>Smith</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

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
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Files <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Size</th>
																		<th>Category</th>
																		<th>Date Added</th>
																		<th>Added by</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Document
																		</td>
																		<td>50KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>John Doe</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Finance
																		</td>
																		<td>100KB</td>
																		<td>-</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>Smith</td>
																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Edit Link</a>
																					<a class="dropdown-item" href="#">Delete Link</a>

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
									</div>
								</div>
								<div class="tab-pane" id="converted-task-activity">
									<div class="row pt-3">
										<div class="col-md-4">
											<div class="card bg-gradient-danger card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Total Activities</h4>
													<span>2</span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card bg-gradient-success card-img-holder text-white h-100">
												<div class="card-body">
													<img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal mb-3">Last Activity</h4>
													<span>2</span>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="crms-tasks  p-2">
											<div class="tasks__item crms-task-item active">
												<div class="accordion-header js-accordion-header">Upcoming Activity <span class="badge badge-secondary float-end">2</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Type</th>
																		<th>Activity Name</th>
																		<th>Assigned To</th>
																		<th>Due Date</th>
																		<th>Status</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Call Enquiry</td>
																		<td>John Doe</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

																				</div>
																			</div>
																		</td>
																	</tr>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Phone Enquiry</td>
																		<td>David</td>
																		<td>13-Jul-20 11:37 PM</td>

																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

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
											<div class="tasks__item crms-task-item">
												<div class="accordion-header js-accordion-header">Past Activity <span class="badge badge-secondary float-end">1</span></div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
														<div class="table-responsive">
															<table class="table table-striped table-nowrap custom-table mb-0 datatable">
																<thead>
																	<tr>
																		<th>Type</th>
																		<th>Activity Name</th>
																		<th>Assigned To</th>
																		<th>Due Date</th>
																		<th>Status</th>
																		<th class="text-end">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>

																		<td>
																			Meeting
																		</td>
																		<td>Call Enquiry</td>
																		<td>John Doe</td>
																		<td>13-Jul-20 11:37 PM</td>
																		<td>
																			<label class="container-checkbox">
																				<input type="checkbox" checked>
																				<span class="checkmark"></span>
																			</label>
																		</td>

																		<td class="text-end">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" href="#">Add New Task</a>
																					<a class="dropdown-item" href="#">Add New Event</a>

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
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->
<!--theme settings modal-->
<!--Task Details Modal -->
<div class="modal right fade" id="task-details-modal" tabindex="-1" role="dialog" aria-modal="true">

	<div class="modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
				<div class="row w-100">
					<div class="col-md-7 account d-flex">
						<div class="company_img">
							<img src="{{ URL::asset('/assets/img/task.png')}}" alt="User" class="user-image" class="img-fluid" />
						</div>
						<div>
							<p class="mb-0">Task</p>
							<span class="modal-title">Personalize your Account</span>
							<span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>
							<span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
						</div>

					</div>

					<div class="col-md-5 text-end">
						<ul class="list-unstyled list-style-none">
							<li class="dropdown list-inline-item"><br />
								<a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Actions </a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Edit This Task</a>
									<a class="dropdown-item" href="#">Mark as Incomplete</a>
									<a class="dropdown-item" href="#">Change Record Owner</a>
									<a class="dropdown-item" href="#">Delete This Task</a>
									<a class="dropdown-item" href="#">Clone This Task</a>
									<a class="dropdown-item" href="#">Print This Task</a>
								</div>
							</li>

						</ul>

					</div>
				</div>

			</div>

			<div class="card due-dates">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<span>Due Date</span>
							<p>03-Jul-2020</p>
						</div>
						<div class="col">
							<span>Priority</span>
							<p>Medium</p>
						</div>
						<div class="col">
							<span>Status</span>
							<p>Not Started</p>
						</div>
						<div class="col">
							<span>Progress</span>
							<p>0</p>
						</div>
						<div class="col">
							<span>Assigned To</span>
							<p>John Doe</p>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-body">
				<div class="task-infos">
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
						<li class="nav-item"><a class="nav-link active" href="#tasks-details" data-bs-toggle="tab">Details</a></li>
						<li class="nav-item"><a class="nav-link" href="#tasks-related" data-bs-toggle="tab">Related</a></li>

					</ul>
					<div class="tab-content">
						<div class="tab-pane show active" id="tasks-details">
							<div class="crms-tasks">
								<div class="tasks__item crms-task-item active">
									<div class="accordion-header js-accordion-header">Name & Occupation</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Record ID</td>
														<td class="border-0">124192692</td>
													</tr>
													<tr>
														<td class="border-0">Name</td>
														<td class="border-0">John Doe</td>
													</tr>
													<tr>
														<td>Company</td>
														<td>Claimpitt</td>
													</tr>
													<tr>
														<td>Title</td>
														<td>Phone Call</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Task Details</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Record ID</td>
														<td class="border-0">124192692</td>
													</tr>
													<tr>
														<td>Task Name</td>
														<td>1. Personalize your account</td>
													</tr>
													<tr>
														<td>Assigned To</td>
														<td>John Doe</td>
													</tr>
													<tr>
														<td>Category</td>
														<td><label class="badge badge-gradient-danger">Get Started</label></td>
													</tr>
													<tr>
														<td>Date Due</td>
														<td>07/12/2000</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>


								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Additional Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Start Date</td>
														<td>05/10/2012</td>
													</tr>
													<tr>
														<td>Reminder Date</td>
														<td>05/01/2012</td>
													</tr>
													<tr>
														<td>Repeats</td>
														<td>Lorem</td>
													</tr>
													<tr>
														<td>Progress</td>
														<td>0%</td>
													</tr>
													<tr>
														<td>Priorit</td>
														<td>Medium</td>
													</tr>
													<tr>
														<td>Status</td>
														<td>Not Started</td>
													</tr>
													<tr>
														<td>Last Updated</td>
														<td>04-Jun-20</td>
													</tr>
													<tr>
														<td>Created</td>
														<td>03-Jun-20 1:14 AM</td>
													</tr>
													<tr>
														<td>Task Created By</td>
														<td>John Doe</td>
													</tr>
													<tr>
														<td>Task Owner</td>
														<td>John Doe</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Related To</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Related To</td>
														<td>Lorem Ipsum</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Description Information</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td class="border-0">Description</td>
														<td class="border-0">Lorem Ipsum</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Task Comments</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<button class="btn btn-secondary text-white w-25">Add Comments</button>
										</div>
									</div>
								</div>
								<div class="tasks__item crms-task-item">
									<div class="accordion-header js-accordion-header">Permissions</div>
									<div class="accordion-body js-accordion-body">
										<div class="accordion-body__contents">
											<table class="table">
												<tbody>
													<tr>
														<td>Task visibility</td>
														<td>Private</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane task-related" id="tasks-related">
							<div class="row pt-2">
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Contacts</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Deals</h4>
											<span>2</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-success card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Projects</h4>
											<span>1</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row pt-3">

								<div class="col-md-4">
									<div class="card bg-gradient-danger card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Companies</h4>
											<span></span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-gradient-info card-img-holder text-white h-100">
										<div class="card-body">
											<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
											<h4 class="font-weight-normal mb-3">Leads</h4>
											<span>1</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="crms-tasks  p-2">
									<div class="tasks__item crms-task-item active">
										<div class="accordion-header js-accordion-header">Contacts</div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Name</th>
																<th>Title</th>
																<th>phone</th>
																<th>Email</th>
																<th>Status</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<td>
																	Wilmer Deluna
																</td>
																<td>Call Enquiry</td>
																<td>987675656</td>
																<td>william@gmail.com</td>
																<td>
																	<label class="badge badge-gradient-success">Not Started</label>
																</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	John Doe
																</td>
																<td>Enquiry</td>
																<td>987675656</td>
																<td>john@gmail.com</td>
																<td>
																	<label class="badge badge-gradient-info">Not Started</label>
																</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Deals </div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Deal Name</th>
																<th>Company</th>
																<th>User Responsible</th>
																<th>Deal Value</th>
																<th></th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	Bensolet
																</td>
																<td>Globex</td>
																<td>John Doe</td>
																<td>USD $‎180</td>
																<td><i class="fa fa-star" aria-hidden="true"></i></td>

																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

																		</div>
																	</div>
																</td>
															</tr>
															<tr>

																<td>
																	Ansanio tech
																</td>
																<td>Lecto</td>
																<td>John Smith</td>
																<td>USD $‎180</td>
																<td><i class="fa fa-star" aria-hidden="true"></i></td>

																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Projects </div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Project Name</th>
																<th>Status</th>
																<th>User Responsible</th>
																<th>Date Created</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	Wilmer Deluna
																</td>
																<td>Completed</td>
																<td>Williams</td>
																<td>13-Jul-20 11:37 PM</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Companies</div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<p>There are no companies added.</p>
											</div>
										</div>
									</div>
									<div class="tasks__item crms-task-item">
										<div class="accordion-header js-accordion-header">Leads </div>
										<div class="accordion-body js-accordion-body">
											<div class="accordion-body__contents">
												<div class="table-responsive">
													<table class="table table-striped table-nowrap custom-table mb-0 datatable">
														<thead>
															<tr>
																<th>Full Name</th>
																<th>Company</th>
																<th>Phone</th>
																<th>Lead Status</th>
																<th>Lead Created</th>
																<th>Lead Owner</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	Wilmer Deluna
																</td>
																<td>Howe-Blanda LLC</td>
																<td>978675656</td>
																<td>OPEN - NotContacted </td>
																<td>13-Jul-20 11:37 PM</td>
																<td>John Doe</td>
																<td class="text-end">
																	<div class="dropdown dropdown-action">
																		<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="#">Edit Link</a>
																			<a class="dropdown-item" href="#">Delete Link</a>

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
							</div>
						</div>

					</div>

				</div>
			</div>

		</div>
		<!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>
<!-- modal -->
<!--add lead modal-->
<div class="modal right fade" id="add_lead" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add Lead</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form>
							<h4>Lead Information</h4>
							<div class="form-group row">
								<div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
								<div class="col-md-4">
									<input class="form-control" type="text" placeholder="Prefix" name="prefix">
								</div>
								<div class="col-md-4">
									<input class="form-control" type="text" placeholder="First name" name="prefix-name">
								</div>
								<div class="col-md-4">
									<input class="form-control" type="text" placeholder="Last name" name="last-name">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Organization</label>
									<select class=" form-control form-select">
										<option>Select</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Title</label>
									<input type="text" class="form-control" name="title" placeholder="Title">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Lead Status</label>
									<select class=" form-control form-select">
										<option>Select</option>
										<option>Open - Contacted</option>
										<option>Open - Not Contacted</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">User Responsible</label>
									<select class=" form-control form-select">
										<option>Select</option>
										<option>John Doe</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Lead Rating</label>
									<input type="number" class="form-control" name="rating" placeholder="Rating">
								</div>

							</div>
							<h4>Additional Information</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Email</label>
									<input type="text" class="form-control" name="email" placeholder="Email">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Email Opted out</label>
									<div>
										<div class="form-check m-0">
											<label class="form-check-label">
												<input class="checkbox" type="checkbox"> <i class="input-helper"></i><i class="input-helper"></i></label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Phone</label>
									<input type="text" class="form-control" name="phone" placeholder="Phone">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Mobile Phone</label>
									<input type="text" class="form-control" name="m-phone" placeholder="Phone">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Fax</label>
									<input type="text" class="form-control" name="fax" placeholder="Fax">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Website</label>
									<input type="text" class="form-control" name="website" placeholder="Website">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Industry</label>
									<input type="text" class="form-control" name="assistant-phone" placeholder="Industry">
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Number of Employees</label>
									<input type="text" class="form-control" name="employees" placeholder="Number of Employees">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Lead Source</label>
									<select class=" form-control form-select">
										<option>Web</option>
										<option>Phone Enquiry</option>
										<option>Partner Referral</option>
										<option>Purchased List</option>
										<option>Other</option>
									</select>
								</div>

							</div>

							<h4>Address Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Mailing Address</label>
									<textarea class="form-control" rows="3" name="address" placeholder="Address"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="City" name="city">
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="State/Provience" name="state">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Postal Code" name="postal">
								</div>
								<div class="col-sm-6">
									<select class=" form-control form-select">
										<option>India</option>
										<option>US</option>
										<option>Japan</option>
									</select>
								</div>
							</div>

							<h4>Description Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Description </label>
									<textarea class="form-control" rows="3" id="description" placeholder="Description"></textarea>
								</div>
							</div>
							<h4>Tag Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Tag List</label>
									<input type="text" class="form-control" name="tag-name" placeholder="Tag List">
								</div>
							</div>
							<h4>Permissions</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Permission</label>
									<select class=" form-control form-select">
										<option>Task Visibility</option>
										<option>Private Task</option>
									</select>
								</div>

							</div>
							<div class="text-center py-3">
								<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
								<button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>
<!-- modal -->
<!-- Add project Modal -->
<div class="modal right fade" id="add_project" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add Project</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form>
							<h4>Project Details</h4>
							<div class="form-group row">
								<div class="col-md-6">
									<label class="col-form-label">Project Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="deal-name">
								</div>
								<div class="col-md-6">
									<label class="col-form-label">Status</label>
									<select class=" form-control form-select">
										<option>In progress</option>
										<option>Deferred</option>
										<option>Cancelled</option>
										<option>Abandoned</option>
										<option>Completed</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label class="col-form-label">Category</label>
									<select class=" form-control form-select">
										<option>Email</option>
										<option>Follow up</option>
										<option>Get Started</option>
										<option>Meeting</option>
										<option>Phone call</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="col-form-label">User Responsible</label>
									<select class=" form-control form-select">
										<option>Nothing selected</option>
										<option>ohn Doe</option>
									</select>
								</div>
							</div>
							<h4>Pipeline and Stage</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Pipeline</label>
									<select class=" form-control form-select">
										<option>Nothing selected </option>
										<option>Project Pipeline </option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="col-form-label">Stage</label>
									<select class=" form-control form-select">
										<option>Nothing selected </option>
									</select>
								</div>
							</div>

							<h4>Description Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Description </label>
									<textarea class="form-control" rows="3" id="description" placeholder="Description"></textarea>
								</div>
							</div>
							<h4>Tag Information</h4>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Tag List</label>
									<input type="text" class="form-control" name="tag-name" placeholder="Tag List">
								</div>
							</div>

							<h4>Permissions</h4>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="col-form-label">Visibility</label>
									<select class=" form-control form-select">
										<option>Everyone</option>
										<option>Select a team</option>
									</select>
								</div>

							</div>
							<div class="text-center py-3">
								<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
								<button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div>

<!-- /Add project modal -->
@if(Route::is(['mail-view','email']))

<!--compose mail-->
<!--modal section starts here-->
<div class="modal fade right" id="compose-mail">
	<div class="modal-dialog">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal"></button>
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Compose New Mail</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body pb-0">
				<div class="row">
					<div class="col-sm-12">
						<div class="card mb-0 border-0">
							<div>
								<form>
									<div class="form-group">
										<input type="email" placeholder="To" class="form-control">
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="email" placeholder="Cc" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="email" placeholder="Bcc" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="text" placeholder="Subject" class="form-control">
									</div>
									<div class="form-group">
										<textarea rows="4" class="form-control summernote" placeholder="Enter your message here"></textarea>
									</div>
									<div class="form-group mb-0">
										<div class="text-center">
											<button class="btn btn-primary"><span>Send</span> <i class="fa fa-send m-l-5"></i></button>
											<button class="btn btn-success m-l-5" type="button"><span>Draft</span> <i class="fa fa-floppy-o m-l-5"></i></button>
											<button class="btn btn-danger m-l-5" type="button"><span>Delete</span> <i class="fa fa-trash-o m-l-5"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--/compose mail-->
@endif
@endif
@if(Route::is(['invoices-cancelled','invoices-draft','invoices-overdue','invoices-paid','invoices-recurring']))
<!-- Delete Paid Modal -->
<div class="modal custom-modal fade" id="delete_paid" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>{{ $title }}</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<div class="col-6">
							<a href="javascript:void(0);" class="btn btn-primary paid-continue-btn">Delete</a>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Paid Modal -->
@endif
<!-- Invoices Preview Modal -->
<div class="modal custom-modal fade invoices-preview" id="invoices_preview" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="card invoice-info-card">
							<div class="card-body pb-0">
								<div class="invoice-item invoice-item-one">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-logo">
												<img src="assets/img/logo.png" alt="logo">
											</div>
										</div>
										<div class="col-md-6">
											<div class="invoice-info">
												<div class="invoice-head">
													<h2 class="text-primary">Invoice</h2>
													<p>Invoice Number : In983248782</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Invoice Item -->
								<div class="invoice-item invoice-item-bg">
									<div class="invoice-circle-img">
										<img src="assets/img/invoice-circle1.png" alt="" class="invoice-circle1">
										<img src="assets/img/invoice-circle2.png" alt="" class="invoice-circle2">
									</div>
									<div class="row">
										<div class="col-lg-4 col-md-12">
											<div class="invoice-info">
												<strong class="customer-text-one">Billed to</strong>
												<h6 class="invoice-name">Customer Name</h6>
												<p class="invoice-details invoice-details-two">
													9087484288 <br>
													Address line 1, <br>
													Address line 2 <br>
													Zip code ,City - Country
												</p>
											</div>
										</div>
										<div class="col-lg-4 col-md-12">
											<div class="invoice-info">
												<strong class="customer-text-one">Invoice From</strong>
												<h6 class="invoice-name">Company Name</h6>
												<p class="invoice-details invoice-details-two">
													9087484288 <br>
													Address line 1, <br>
													Address line 2 <br>
													Zip code ,City - Country
												</p>
											</div>
										</div>
										<div class="col-lg-4 col-md-12">
											<div class="invoice-info invoice-info-one border-0">
												<p>Issue Date : 27 Jul 2022</p>
												<p>Due Date : 27 Aug 2022</p>
												<p>Due Amount : $ 1,54,22 </p>
												<p>Recurring Invoice : 15 Months</p>
												<p class="mb-0">PO Number : 54515454</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->

								<!-- Invoice Item -->
								<div class="invoice-item invoice-table-wrap">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="invoice-table table table-center mb-0">
													<thead>
														<tr>
															<th>Description</th>
															<th>Category</th>
															<th>Rate/Item</th>
															<th>Quantity</th>
															<th>Discount (%)</th>
															<th class="text-end">Amount</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Dell Laptop</td>
															<td>Laptop</td>
															<td>$1,110</td>
															<td>2</td>
															<td>2%</td>
															<td class="text-end">$400</td>
														</tr>
														<tr>
															<td>HP Laptop</td>
															<td>Laptop</td>
															<td>$1,500</td>
															<td>3</td>
															<td>6%</td>
															<td class="text-end">$3,000</td>
														</tr>
														<tr>
															<td>Apple Ipad</td>
															<td>Ipad</td>
															<td>$11,500</td>
															<td>1</td>
															<td>10%</td>
															<td class="text-end">$11,000</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->

								<div class="row align-items-center justify-content-center">
									<div class="col-lg-6 col-md-6">
										<div class="invoice-payment-box">
											<h4>Payment Details</h4>
											<div class="payment-details">
												<p>Debit Card XXXXXXXXXXXX-2541 HDFC Bank</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="invoice-total-card">
											<div class="invoice-total-box">
												<div class="invoice-total-inner">
													<p>Taxable <span>$6,660.00</span></p>
													<p>Additional Charges <span>$6,660.00</span></p>
													<p>Discount <span>$3,300.00</span></p>
													<p class="mb-0">Sub total <span>$3,300.00</span></p>
												</div>
												<div class="invoice-total-footer">
													<h4>Total Amount <span>$143,300.00</span></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="invoice-sign-box">
									<div class="row">
										<div class="col-lg-8 col-md-8">
											<div class="invoice-terms">
												<h6>Notes:</h6>
												<p class="mb-0">Enter customer notes or any other details</p>
											</div>
											<div class="invoice-terms mb-0">
												<h6>Terms and Conditions:</h6>
												<p class="mb-0">Enter customer notes or any other details</p>
											</div>
										</div>
										<div class="col-lg-4 col-md-4">
											<div class="invoice-sign text-end">
												<img class="img-fluid d-inline-block" src="assets/img/signature.png" alt="sign">
												<span class="d-block">Harristemp</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Invoices Preview Modal -->

<!-- Add Invoices Modal -->
<div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="form-header text-start mb-0">
					<h4 class="mb-0">Add Bank Details</h4>
				</div>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="bank-inner-details">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Account Holder Name</label>
								<input type="text" class="form-control" placeholder="Add Name">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Bank name</label>
								<input type="text" class="form-control" placeholder="Add Bank name">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>IFSC Code</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Account Number</label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="bank-details-btn">
					<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a>
					<a href="javascript:void(0);" class="btn bank-save-btn">Save Item</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Add Invoices Modal -->

<!-- Delete Invoices Modal -->
<div class="modal custom-modal fade" id="delete_invoices_details" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete Invoice Details</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<div class="col-6">
							<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Delete</a>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Invoices Modal -->

<!-- Save Invoices Modal -->
<div class="modal custom-modal fade" id="save_invocies_details" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Save Invoice Details</h3>
					<p>Are you sure want to save?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<div class="col-6">
							<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Save</a>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Save Invoices Modal -->
<div class="modal custom-modal fade" id="delete_bank_details" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete Bank Details</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<div class="col-6">
							<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Delete</a>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>