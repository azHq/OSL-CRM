@extends('layout.mainlayout')
@section('content')		
        <!-- Page Wrapper -->
        <div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                  @slot('title') Projects  @endslot
                  @slot('li_1') Dashboard @endslot
                  @slot('li_2') Projects @endslot
                  @slot('li_3') <i class="feather-grid" aria-hidden="true"></i> @endslot
                @endcomponent
                <!-- Page Header -->
                <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                        <div class="col">
                            <div class="dropdown">
                                <a class="dropdown-toggle recently-viewed" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> All Projects</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Recently Viewed</a>
                                    <a class="dropdown-item" href="#">Items I'm following</a>
                                    <a class="dropdown-item" href="#">All Projects</a>
                                    <a class="dropdown-item" href="#">All Closed Deals</a>
                                    <a class="dropdown-item" href="#">All Open Deals</a>
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

                                        <a class="dropdown-item" href="{{url('projects')}}">List View</a>
                                        <a class="dropdown-item" href="{{url('projects-kanban-view')}}">Kanban View</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#add-new-list">Add New List View</a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_project">New Project</button>
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
                                                <th>Project Name</th>
                                                <th>Project Status</th>
                                                <th>User Responsible</th>
                                                <th>Project category</th>
                                                <th>Pipeline</th>
                                                <th>Project Created</th>
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
                                                    <a href="#"><span class="person-circle-a person-circle">A</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#project-details">Astronaut </a>
                                                </td>
                                                <td>In Progress</td>
                                                
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#system-user">John Doe</a></td>
                                                <td>Phone call</td>
                                                <td>
                                                    <div class="pipeline-small flat pipeline-project">
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">&nbsp;
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                      </div>
                                                </td>
                                                
                                                <td>03-Jun-20 1:14 AM	</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#"><span class="person-circle-b person-circle">B</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#project-details">Barcelona</a>
                                                </td>
                                                <td>Completed</td>
                                                
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#system-user">David Milton</a></td>
                                                <td>-</td>
                                                <td>
                                                    <div class="pipeline-small flat pipeline-project">
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">&nbsp;
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top " data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                      </div>
                                                </td>
                                                
                                                <td>03-Jun-20 1:14 AM	</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#"><span class="person-circle-c person-circle">C</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#project-details">Casanova</a>
                                                </td>
                                                <td>Not Started</td>
                                                
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#system-user">John Doe</a></td>
                                                <td>Meeting</td>
                                                <td>
                                                    <div class="pipeline-small flat pipeline-project">
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">&nbsp;
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                      </div>
                                                </td>
                                                
                                                <td>03-Jun-20 1:14 AM	</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#"><span class="person-circle-c person-circle">C</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#project-details">Charming</a>
                                                </td>
                                                <td>Completed</td>
                                                
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#system-user">Micheal</a></td>
                                                <td>-</td>
                                                <td>
                                                    <div class="pipeline-small flat pipeline-project">
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">&nbsp;
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                      </div>
                                                </td>
                                                
                                                <td>03-Jun-20 1:14 AM	</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#"><span class="person-circle-f person-circle">F</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#project-details">Fireball</a>
                                                </td>
                                                <td>In Progress</td>
                                                
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#system-user">John Smith</a></td>
                                                <td>Follow up</td>
                                                <td>
                                                    <div class="pipeline-small flat pipeline-project">
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">&nbsp;
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                      </div>
                                                </td>
                                                
                                                <td>03-Jun-20 1:14 AM	</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#"><span class="person-circle-g person-circle">G</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#project-details">Gray Panthers</a>
                                                </td>
                                                <td>In Progress</td>
                                                
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#system-user">Samsun David</a></td>
                                                <td>Email</td>
                                                <td>
                                                    <div class="pipeline-small flat pipeline-project">
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">&nbsp;
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                      </div>
                                                </td>
                                                
                                                <td>03-Jun-20 1:14 AM	</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#"><span class="person-circle-g person-circle">G</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#project-details">Gray Panthers</a>
                                                </td>
                                                <td>In Progress</td>
                                                
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#system-user">Samsun David</a></td>
                                                <td>Email</td>
                                                <td>
                                                    <div class="pipeline-small flat pipeline-project">
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">&nbsp;
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planing" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline, stage: plan">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Pipeline: Deal Pipeline">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#project-details"></span>
                                                        </a>
                                                      </div>
                                                </td>
                                                
                                                <td>03-May-20 1:14 AM	</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                <button type="submit" class="btn btn-gradient-primary me-2 btn-rounded">Submit</button>
                <button class="btn btn-light cancel-button rounded">Cancel</button>
              </div>
            </form>
          </div>
       
        </div>
      </div>
    </div>

@component('components.modal-popup')                
@endcomponent
@component('components.theme-settings')                
@endcomponent
@endsection