@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
             @component('components.breadcrumb')                
                  @slot('title') Deals  @endslot
                  @slot('li_1') Dashboard @endslot
                  @slot('li_2') Deals @endslot
                  @slot('li_3') <i class="feather-radio"></i> @endslot
              @endcomponent
                <!-- Page Header -->
                <div class="page-header pt-3 mb-0 ">
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
                                <li class="nav-item dropdown list-inline-item add-lists">
                                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="nav-profile-text">
                                          <i class="fa fa-th" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
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
                                                <th>Deal Name</th>
                                                <th>Company</th>
                                                <th>Pipeline</th>
                                                <th>Forecast Close Date</th>
                                                <th>User Responsible</th>
                                                <th>Deal Value</th>
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
                                                    <a href="#"><span class="person-circle-a person-circle">B</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deal-details">Bensolet</a>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Globex</a></td>
                                                <td>
                                                    <div class="pipeline-small flat ">
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Prospecting">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Qualification">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Needs Analysis">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Proposal">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Negotiation">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Closed Won">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>06-Aug-20</td>
                                                <td>John Doe</td>
                                                <td>USD $‎180</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Deal Image</a>
                                                            <a class="dropdown-item" href="#">Clone This Deal</a>
                                                            <a class="dropdown-item" href="#">Delete This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Record Owner</a>
                                                            <a class="dropdown-item" href="#">Generate Merge Document</a>
                                                            <a class="dropdown-item" href="#">Print This Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Task For Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Event For Deal</a>
                                                            <a class="dropdown-item" href="#">Add Activity Set To Deal</a>
                                                            <a class="dropdown-item" href="#">Convert To Deal</a>
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
                                                    <a href="#"><span class="person-circle-b person-circle">W</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deal-details">Whirligig G990</a>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Massive</a></td>
                                                <td>
                                                    <div class="pipeline-small flat">
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Prospecting">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Qualification">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Needs Analysis">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Proposal">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Negotiation">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Closed Won">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>01-May-18</td>
                                                <td>John Doe</td>
                                                <td>USD $‎180</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Deal Image</a>
                                                            <a class="dropdown-item" href="#">Clone This Deal</a>
                                                            <a class="dropdown-item" href="#">Delete This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Record Owner</a>
                                                            <a class="dropdown-item" href="#">Generate Merge Document</a>
                                                            <a class="dropdown-item" href="#">Print This Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Task For Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Event For Deal</a>
                                                            <a class="dropdown-item" href="#">Add Activity Set To Deal</a>
                                                            <a class="dropdown-item" href="#">Convert To Deal</a>
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
                                                    <a href="#"><span class="person-circle-c person-circle">A</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deal-details">Ansanio tech</a>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Vehement </a></td>
                                                <td>
                                                    <div class="pipeline-small flat">
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Prospecting">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Qualification">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Needs Analysis">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Proposal">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Negotiation">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Closed Won">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>02-Jan-19</td>
                                                <td>John Doe</td>
                                                <td>USD $‎180</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Deal Image</a>
                                                            <a class="dropdown-item" href="#">Clone This Deal</a>
                                                            <a class="dropdown-item" href="#">Delete This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Record Owner</a>
                                                            <a class="dropdown-item" href="#">Generate Merge Document</a>
                                                            <a class="dropdown-item" href="#">Print This Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Task For Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Event For Deal</a>
                                                            <a class="dropdown-item" href="#">Add Activity Set To Deal</a>
                                                            <a class="dropdown-item" href="#">Convert To Deal</a>
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
                                                    <a href="#"><span class="person-circle-d person-circle">S</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deal-details">Sensored Lecto</a>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Hooli </a></td>
                                                <td>
                                                    <div class="pipeline-small flat">
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Prospecting">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Qualification">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Needs Analysis">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Proposal">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Negotiation">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Closed Won">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>12-Jul-20</td>
                                                <td>Williams</td>
                                                <td>USD $‎180</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Deal Image</a>
                                                            <a class="dropdown-item" href="#">Clone This Deal</a>
                                                            <a class="dropdown-item" href="#">Delete This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Record Owner</a>
                                                            <a class="dropdown-item" href="#">Generate Merge Document</a>
                                                            <a class="dropdown-item" href="#">Print This Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Task For Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Event For Deal</a>
                                                            <a class="dropdown-item" href="#">Add Activity Set To Deal</a>
                                                            <a class="dropdown-item" href="#">Convert To Deal</a>
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
                                                    <a href="#"><span class="person-circle-h person-circle">H</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deal-details">Hentry Dio</a>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Umbrella</a></td>
                                                <td>
                                                    <div class="pipeline-small flat">
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Prospecting">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Qualification">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Needs Analysis">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Proposal">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Negotiation">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Closed Won">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>03-Jul-20</td>
                                                <td>David cravo</td>
                                                <td>USD $‎180</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Deal Image</a>
                                                            <a class="dropdown-item" href="#">Clone This Deal</a>
                                                            <a class="dropdown-item" href="#">Delete This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Record Owner</a>
                                                            <a class="dropdown-item" href="#">Generate Merge Document</a>
                                                            <a class="dropdown-item" href="#">Print This Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Task For Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Event For Deal</a>
                                                            <a class="dropdown-item" href="#">Add Activity Set To Deal</a>
                                                            <a class="dropdown-item" href="#">Convert To Deal</a>
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
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deal-details">Feneldo</a>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Initech </a></td>
                                                <td>
                                                    <div class="pipeline-small flat">
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Prospecting">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Qualification">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Needs Analysis">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Proposal">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Negotiation">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Closed Won">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>03-Jul-20</td>
                                                <td>Siphen David</td>
                                                <td>USD $‎180</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Deal Image</a>
                                                            <a class="dropdown-item" href="#">Clone This Deal</a>
                                                            <a class="dropdown-item" href="#">Delete This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Record Owner</a>
                                                            <a class="dropdown-item" href="#">Generate Merge Document</a>
                                                            <a class="dropdown-item" href="#">Print This Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Task For Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Event For Deal</a>
                                                            <a class="dropdown-item" href="#">Add Activity Set To Deal</a>
                                                            <a class="dropdown-item" href="#">Convert To Deal</a>
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
                                                    <a href="#"><span class="person-circle-i person-circle">I</span></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deal-details">Iresope Meldo</a>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Soylent Corp</a></td>
                                                <td>
                                                    <div class="pipeline-small flat">
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Prospecting">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Qualification">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top planning" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Needs Analysis">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top " data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Proposal">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Negotiation">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                        <a class="won noselect tipped-top" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="stage: Closed Won">
                                                          <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#deal-details"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>03-Jul-20</td>
                                                <td>John Smith</td>
                                                <td>USD $‎180</td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Deal Image</a>
                                                            <a class="dropdown-item" href="#">Clone This Deal</a>
                                                            <a class="dropdown-item" href="#">Delete This Deal</a>
                                                            <a class="dropdown-item" href="#">Change Record Owner</a>
                                                            <a class="dropdown-item" href="#">Generate Merge Document</a>
                                                            <a class="dropdown-item" href="#">Print This Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Task For Deal</a>
                                                            <a class="dropdown-item" href="#">Add New Event For Deal</a>
                                                            <a class="dropdown-item" href="#">Add Activity Set To Deal</a>
                                                            <a class="dropdown-item" href="#">Convert To Deal</a>
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