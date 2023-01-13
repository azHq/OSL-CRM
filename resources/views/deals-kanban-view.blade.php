@extends('layout.mainlayout')
@section('content')		
	<!-- Page Wrapper -->
	<div class="page-wrapper">
      <div class="content container-fluid">
				
            	@component('components.breadcrumb')                
                  @slot('title') Deals Kanban View  @endslot
                  @slot('li_1') Dashboard @endslot
                  @slot('li_2') Deals Kanban View @endslot
                  @slot('li_3') <i class="la la-table"></i> @endslot
              @endcomponent
            <div class="page-header  mb-0 ">
							<div class="row">
								<div class="col">

									<div class="dropdown">
										<a class="dropdown-toggle recently-viewed" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> All Deals</a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#">Recently Viewed</a>
						                    <a class="dropdown-item" href="#">Items I'm following</a>
						                    <a class="dropdown-item" href="#">All Deals</a>
						                    <a class="dropdown-item" href="#">All Closed Deals</a>
						                    <a class="dropdown-item" href="#">All Open Deals</a>
						                    <a class="dropdown-item" href="#">My Deals</a>
										</div>
									</div>
								</div>
								<div class="col text-end">
									<ul class="list-inline-item pl-0">
										
						                <li class="dropdown list-inline-item add-lists">
											<a class="dropdown-toggle recently-viewed pe-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
												<div class="nav-profile-text">
						                          <i class="fa fa-cog" aria-hidden="true"></i>
						                        </div>
											</a>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="#">Choose Columns</a>
						                        <a class="dropdown-item" href="#">Group Columns</a>
						                        <a class="dropdown-item" href="#">Sharing Settings</a>
						                        <a class="dropdown-item" href="#">Rename</a>
						                        <a class="dropdown-item" href="#">Clone</a>
						                        <a class="dropdown-item" href="#">Delete</a>
											</div>
										</li>
										<li class="dropdown list-inline-item add-lists">
											<a class="dropdown-toggle recently-viewed pe-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
												<div class="nav-profile-text">
						                          <i class="fa fa-th" aria-hidden="true"></i>
						                        </div>
											</a>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="{{url('deals')}}">List View</a>
						                        <a class="dropdown-item" href="{{url('deals-kanban-view')}}">Kanban View</a>
						                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#add-new-list">Add New List View</a>
											</div>
										</li>
						                
						                <li class="list-inline-item">
						                    <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_deal">New Deal</button>
						                </li>
						            </ul>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
					
					 <div class="row m-0">
		              <div class="col-md-12 grid-margin stretch-card kanban">
		                <div class="">
		                  <div class="card-body p-0 row">
		                     <div id="sortableKanbanBoards" class="col-md-12 kanban-views p-0">
		                        <div class="panel panel-primary kanban-col m-0">
		                            <div class="panel-heading bg-transparent p-0">
		                                <h4>Not Contacted (1)</h4>
		                                <!-- <i class="fa fa-2x fa-plus-circle pull-right"></i> -->
		                            </div>
		                            <div class="panel-body slimScrollDiv">
		                                <div id="TODO" class="kanban-centered">

		                                    <article class="kanban-entry grab" id="item1" draggable="true">
		                                        <div class="kanban-entry-inner">
		                                            <div class="kanban-label card bg-gradient-danger card-img-holder text-white h-100" data-bs-toggle="modal" data-bs-target="#leads-details">
		                                            	<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
		                                                <h2 data-bs-toggle="modal" data-bs-target="#leads-details">Anne Lynch</h2>
		                                               
		                                                <ul class="list-unstyled">
		                                                  <li>VB of Sales</li>
		                                                  <li>Howwe-Blanda LLC</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </article>

		                                    <article class="kanban-entry grab" id="item2" draggable="true">
		                                        <div class="kanban-entry-inner">
		                                            <div class="kanban-label card bg-gradient-info card-img-holder text-white h-100" data-bs-toggle="modal" data-bs-target="#leads-details">
		                                            	<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
		                                                <h2 data-bs-toggle="modal" data-bs-target="#leads-details">David Mathews</h2>
		                                                
		                                                <ul class="list-unstyled">
		                                                  <li>Finance Director</li>
		                                                  <li>Ebert and Sons</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </article>

		                                    <article class="kanban-entry grab" id="item4" draggable="true">
		                                        <div class="kanban-entry-inner">
		                                            <div class="kanban-label card bg-gradient-success card-img-holder text-white h-100" data-bs-toggle="modal" data-bs-target="#leads-details">
		                                            	<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
		                                               <h2 data-bs-toggle="modal" data-bs-target="#leads-details">Douglas Baker</h2>
		                                               
		                                                <ul class="list-unstyled">
		                                                  <li>Finance Director</li>
		                                                  <li>Ebert and Sons</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </article>

		                                </div>
		                            </div>
		                          
		                        </div>
		                        
		                       
		                        <div class="panel panel-primary kanban-col me-0">
		                            <div class="panel-heading bg-transparent p-0">
		                                <h4>Attempted Contact (0)</h4>
		                                <!-- <i class="fa fa-2x fa-plus-circle pull-right"></i> -->
		                            </div>
		                            <div class="panel-body slimScrollDiv">
		                                <div id="DOING" class="kanban-centered">

		                                    <article class="kanban-entry grab" id="item5" draggable="true">
		                                        <div class="kanban-entry-inner">

		                                            <div class="kanban-label card bg-gradient-warning card-img-holder text-white h-100" data-bs-toggle="modal" data-bs-target="#leads-details">
		                                            	<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
		                                                <h2 data-bs-toggle="modal" data-bs-target="#leads-details">Douglas Baker</h2>
		                                               
		                                                <ul class="list-unstyled">
		                                                  <li>Finance Director</li>
		                                                  <li>Ebert and Sons</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </article>

		                                    <article class="kanban-entry grab" id="item6" draggable="true">
		                                        <div class="kanban-entry-inner">
		                                            <div class="kanban-label card bg-gradient-danger card-img-holder text-white h-100" data-bs-toggle="modal" data-bs-target="#leads-details">
		                                            	<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
		                                                <h2 class="" data-bs-toggle="modal" data-bs-target="#leads-details">Douglas Baker</h2>
		                                               
		                                                <ul class="list-unstyled">
		                                                  <li>Finance Director</li>
		                                                  <li>Ebert and Sons</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </article>

		                                </div>
		                            </div>
		                          
		                        </div>
		                      
		                        <div class="panel panel-primary kanban-col me-0">
		                            <div class="panel-heading bg-transparent p-0">
		                                <h4>Contact (2)</h4>
		                                <!-- <i class="fa fa-2x fa-plus-circle pull-right"></i> -->
		                            </div>
		                            <div class="panel-body slimScrollDiv">
		                                <div id="DONE" class="kanban-centered">

		                                    <article class="kanban-entry grab" id="item5" draggable="true">
		                                        <div class="kanban-entry-inner">

		                                            <div class="kanban-label card bg-gradient-info card-img-holder text-white h-100" data-bs-toggle="modal" data-bs-target="#leads-details">
		                                            	<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
		                                                <h2 data-bs-toggle="modal" data-bs-target="#leads-details">Douglas Baker</h2>
		                                               
		                                                <ul class="list-unstyled">
		                                                  <li>Finance Director</li>
		                                                  <li>Ebert and Sons</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </article>

		                                    <article class="kanban-entry grab" id="item6" draggable="true">
		                                        <div class="kanban-entry-inner">
		                                            <div class="kanban-label card bg-gradient-success card-img-holder text-white h-100" data-bs-toggle="modal" data-bs-target="#leads-details">
		                                            	<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
		                                                <h2 data-bs-toggle="modal" data-bs-target="#leads-details">Douglas Baker</h2>
		                                                
		                                                <ul class="list-unstyled">
		                                                  <li>Finance Director</li>
		                                                  <li>Ebert and Sons</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </article>

		                                </div>
		                            </div>
		                          
		                        </div>

		                         <div class="panel panel-primary kanban-col me-0">
		                            <div class="panel-heading bg-secondary bg-transparent p-0">
		                                <h4 class="closed">Closed Lost (4)</h4>
		                                <!-- <i class="fa fa-2x fa-plus-circle pull-right"></i> -->
		                            </div>
		                            <div class="panel-body slimScrollDiv">
		                                <div id="closed" class="kanban-centered">

		                                    <article class="kanban-entry grab" id="item7" draggable="true">
		                                        <div class="kanban-entry-inner">

		                                            <div class="kanban-label card bg-gradient-warning card-img-holder text-white h-100" data-bs-toggle="modal" data-bs-target="#leads-details">
		                                            	<img src="{{ URL::asset('/assets/img/circle.png')}}" class="card-img-absolute" alt="circle-image">
		                                                <h2 data-bs-toggle="modal" data-bs-target="#leads-details">Douglas Baker</h2>
		                                               
		                                                <ul class="list-unstyled">
		                                                  <li>Finance Director</li>
		                                                  <li>Ebert and Sons</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </article>

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
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->

		@component('components.modal-popup')                
    @endcomponent
    @component('components.theme-settings')                
    @endcomponent
@endsection