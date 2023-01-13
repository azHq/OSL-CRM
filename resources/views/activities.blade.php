@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
             
                @component('components.breadcrumb')                
                    @slot('title') Activities  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Activities @endslot
                    @slot('li_3') <i class="feather-calendar"></i> @endslot
                @endcomponent
                 <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                        <div class="col">
                            <div class="dropdown">
                                <a class="dropdown-toggle recently-viewed" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Propose Times </a>
                                <div class="dropdown-menu">
                                     <a class="dropdown-item" href="#">Recently Viewed</a>
                                    <a class="dropdown-item" href="#">Items I'm following</a>
                                    <a class="dropdown-item" href="#">All Activity</a>
                                    <a class="dropdown-item" href="#">All Closed Activity</a>
                                    <a class="dropdown-item" href="#">All Open Activity</a>
                                    <a class="dropdown-item" href="#">My Activity</a>
                                </div>
                            </div>
                        </div>
                        <div class="col text-end">
                            <ul class="list-inline-item pl-0">
                                
                                <li class="list-inline-item">
                                    <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_activity">Add Activity</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                
                
                <!-- Content Starts -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="table-responsive activity-tables">
                                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th class="checkBox">Done</th>
                                                <th>Subject</th>
                                                <th>Deal</th>
                                                <th>Contact Person</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Companies</th>
                                                <th class="text-start">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="container-checkbox">
                                                          <input type="checkbox">
                                                          <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#add_activity">Call</a></td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Ansanio tech</a></td>
                                                <td>Cravo Ansanio</td>
                                                <td>anson@gmail.com</td>
                                                <td>9874565464</td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Soylent Corp</a></td>
                                                
                                                <td>
                                                    <div class="dropdown dropdown-action text-center">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right h-100">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                           
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="container-checkbox">
                                                          <input type="checkbox">
                                                          <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#add_activity">Phone</a></td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#deal-details"> Feneldo</a></td>
                                                <td>Williams</td>
                                                <td>williams@gmail.com</td>
                                                <td>9874565464</td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Umbrella</a></td>
                                                <td>
                                                    <div class="dropdown dropdown-action text-center">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right h-100">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                           
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="container-checkbox">
                                                          <input type="checkbox">
                                                          <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#add_activity">Lunch</a></td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#deal-details">Bensolet</a></td>
                                                <td>John Doe</td>
                                                <td>johndoe@gmail.com</td>
                                                <td>9874565464</td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Acme Corporation</a></td>
                                                <td>
                                                    <div class="dropdown dropdown-action text-center">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right h-100">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                           
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="container-checkbox">
                                                          <input type="checkbox">
                                                          <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#add_activity">Call</a></td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Ansanio tech</a></td>
                                                <td>Cravo Ansanio</td>
                                                <td>anson@gmail.com</td>
                                                <td>9874565464</td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Soylent Corp</a></td>
                                                
                                                <td>
                                                    <div class="dropdown dropdown-action text-center">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right h-100">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                           
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="container-checkbox">
                                                          <input type="checkbox">
                                                          <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#add_activity">Phone</a></td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#deal-details"> Feneldo</a></td>
                                                <td>Williams</td>
                                                <td>williams@gmail.com</td>
                                                <td>9874565464</td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Umbrella</a></td>
                                                <td>
                                                    <div class="dropdown dropdown-action text-center">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right h-100">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                           
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="container-checkbox">
                                                          <input type="checkbox">
                                                          <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#add_activity">Phone</a></td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#deal-details"> Feneldo</a></td>
                                                <td>Williams</td>
                                                <td>williams@gmail.com</td>
                                                <td>9874565464</td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Umbrella</a></td>
                                                <td>
                                                    <div class="dropdown dropdown-action text-center">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right h-100">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                           
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="container-checkbox">
                                                          <input type="checkbox">
                                                          <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#add_activity">Lunch</a></td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#deal-details">Bensolet</a></td>
                                                <td>John Doe</td>
                                                <td>johndoe@gmail.com</td>
                                                <td>9874565464</td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Acme Corporation</a></td>
                                                <td>
                                                    <div class="dropdown dropdown-action text-center">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right h-100">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                           
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