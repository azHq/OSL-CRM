@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">

                @component('components.breadcrumb')                
                    @slot('title') Contacts  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Contacts @endslot
                    @slot('li_3') <i class="feather-smartphone"></i> @endslot
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
                                    <a class="dropdown-item" href="#">All Contacts</a>
                                       <a class="dropdown-item" href="#">Contacts added in the last 24 hours</a>
                                    <a class="dropdown-item" href="#">Contacts added in the last 7 days</a>
                                    <a class="dropdown-item" href="#">Contacts with no notes in the last month</a>
                                    <a class="dropdown-item" href="#">Contacts with no notes in the last 7 days</a>
                                </div>
                            </div>
                        </div>
                        <div class="col text-end">
                            <ul class="list-inline-item ps-0">
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
                                    <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_contact">New Contact</button>
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
                                                <th>Full Name</th>
                                                <th>Title</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Tag List</th>
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
                                                    <a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/profiles/avatar-11.jpg')}}"></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#system-user">Wilmer Deluna</a>
                                                </td>
                                                <td>Facility Manager	</td>
                                                <td>
                                                    875455453
                                                </td>
                                                <td>wilmer@gmail.com	</td>
                                                <td><span class="badge badge-gradient-success">Sample_data</span></td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/profiles/avatar-10.jpg')}}"></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#system-user">John Doe</a>
                                                </td>
                                                <td>Manager</td>
                                                <td>
                                                    875455453
                                                </td>
                                                <td>john@gmail.com	</td>
                                                <td><span class="badge badge-gradient-info">Sample_data</span></td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/profiles/avatar-25.jpg')}}"></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#system-user">John Smith</a>
                                                </td>
                                                <td>CMO</td>
                                                <td>
                                                    875455453
                                                </td>
                                                <td>smith@gmail.com	</td>
                                                <td><span class="badge badge-gradient-danger">Sample_data</span></td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/profiles/avatar-26.jpg')}}"></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#system-user">Wilmer Deluna</a>
                                                </td>
                                                <td>Property Manager</td>
                                                <td>
                                                    875455453
                                                </td>
                                                <td>john@gmail.com</td>
                                                <td><span class="badge badge-gradient-warning">Sample_data</span></td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/profiles/avatar-11.jpg')}}"></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#system-user">Wilmer Deluna</a>
                                                </td>
                                                <td>Facility Manager	</td>
                                                <td>
                                                    875455453
                                                </td>
                                                <td>wilmer@gmail.com	</td>
                                                <td><span class="badge badge-gradient-success">Sample_data</span></td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/profiles/avatar-10.jpg')}}"></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#system-user">John Doe</a>
                                                </td>
                                                <td>Manager</td>
                                                <td>
                                                    875455453
                                                </td>
                                                <td>john@gmail.com	</td>
                                                <td><span class="badge badge-gradient-info">Sample_data</span></td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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
                                                    <a href="#" class="avatar flex-shrink-0"><img alt="" src="{{ URL::asset('/assets/img/profiles/avatar-11.jpg')}}"></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#system-user">Vinson Jk</a>
                                                </td>
                                                <td>Facility Manager</td>
                                                <td>
                                                    875455453
                                                </td>
                                                <td>wilmer@gmail.com	</td>
                                                <td><span class="badge badge-gradient-warning">Sample_data</span></td>
                                                <td class="checkBox"><i class="fa fa-star" aria-hidden="true"></i></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
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