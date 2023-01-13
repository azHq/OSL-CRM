@extends('layout.mainlayout')
@section('content')		
	     <!-- Page Wrapper -->
       <div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
                
                @component('components.breadcrumb')                
                  @slot('title') Reports  @endslot
                  @slot('li_1') Dashboard @endslot
                  @slot('li_2') Reports @endslot
                  @slot('li_3') <i class="feather-bar-chart-2"></i> @endslot
                @endcomponent
                <!-- Page Header -->
                <div class="page-header pt-3 mb-0 ">
                    <div class="row">
                        <div class="col">
                            <h4 class="advanced-report">Advanced Reporting</h4>
                        </div>
                        <div class="col text-end">
                            <ul class="list-inline-item pl-0">
                                <li class="list-inline-item">
                                    <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_report">New Report</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- /Page Header -->
                
                <!-- Content Starts -->
                <div class="row m-0">
                    <div class="col-md-12 p-0">
                          <div class="card">
                              <div class="card-body">
                                <p class="m-0">Welcome to Advanced Reporting! Need help? Check out our <a href="#">articles</a> or watch the <a href="#">video</a>.</p>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row all-reports m-0">
                    <div class="col-md-4 p-0">
                      <ul class="nav nav-tabs card p-0 mb-0" id="reports" role="tablist">
                        <li class="nav-item w-100">
                          <a class="nav-link active" data-bs-toggle="tab" href="#personal-reports" role="tab" aria-controls="personal-reports">My Personal Reports</a>
                        </li>
                        <li class="nav-item w-100">
                          <a class="nav-link" data-bs-toggle="tab" href="#shared-reports" role="tab" aria-controls="shared-reports">Shared Reports</a>
                        </li>
                        <li class="nav-item w-100">
                          <a class="nav-link" data-bs-toggle="tab" href="#all-reports" role="tab" aria-controls="all-reports">All Reports</a>
                        </li>
                        <li class="nav-item w-100">
                          <a class="nav-link" data-bs-toggle="tab" href="#task-reports" role="tab" aria-controls="task-reports">Task Reports</a>
                        </li>
                        <li class="nav-item w-100">
                          <a class="nav-link" data-bs-toggle="tab" href="#contact-reports" role="tab" aria-controls="contact-reports">Contact Reports</a>
                        </li>
                         <li class="nav-item w-100">
                          <a class="nav-link" data-bs-toggle="tab" href="#company-reports" role="tab" aria-controls="company-reports">Company Reports</a>
                        </li>
                         <li class="nav-item w-100">
                          <a class="nav-link" data-bs-toggle="tab" href="#lead-reports" role="tab" aria-controls="lead-reports">Lead Reports</a>
                        </li>
                         <li class="nav-item w-100">
                          <a class="nav-link" data-bs-toggle="tab" href="#deal-reports" role="tab" aria-controls="deal-reports">Deal Reports</a>
                        </li>
                         <li class="nav-item w-100">
                          <a class="nav-link" data-bs-toggle="tab" href="#project-reports" role="tab" aria-controls="project-reports">Project Reports</a>
                        </li>
                         <li class="nav-item w-100">
                          <a class="nav-link" data-bs-toggle="tab" href="#other-reports" role="tab" aria-controls="other-reports">Other Reports</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-8 pr-0 Reports">
                      <div class="tab-content pt-0">
                        <div class="tab-pane active" id="personal-reports" role="tabpanel">
                          <div class="table-responsive">
                              <div class="card">
                                  <div class="card-body">
                                    <h4 class="pb-3">My Personal Reports</h4>
                                      <table class="table table-striped custom-table datatable">
                                        <thead>
                                          <tr>
                                            <th>Report Name</th>
                                            <th>Date Created</th>
                                            <th>Created By</th>
                                            <th>Scheduled</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Inventry</td>
                                            <td>07, Aug 2020</td>
                                            <td>John Doe</td>
                                            <td>-</td>
                                          </tr>
                                           <tr>
                                            <td>Project Management</td>
                                            <td>02, April 2020</td>
                                            <td>John Doe</td>
                                            <td>-</td>
                                          </tr>
                                          <tr>
                                            <td>Evaluation</td>
                                            <td>02, june 2020</td>
                                            <td>John Doe</td>
                                            <td>-</td>
                                          </tr>

                                        </tbody>
                                      </table>
                                      </div>
                                 </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="shared-reports" role="tabpanel">
                          <div class="table-responsive card">
                              <div class="card-body">
                                <h4 class="pb-3">Shared Reports</h4>
                                  <table class="table table-striped custom-table datatable">
                                    <thead>
                                      <tr>
                                        <th>Report Name</th>
                                        <th>Date Created</th>
                                        <th>Created By</th>
                                        <th>Scheduled</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><a href="#">Shared Report</a></td>
                                        <td>07, Aug 2020</td>
                                        <td>John Doe</td>
                                        <td>-</td>
                                      </tr>
                                       <tr>
                                        <td>Project Management</td>
                                        <td>02, April 2020</td>
                                        <td>John Doe</td>
                                        <td>-</td>
                                      </tr>
                                      <tr>
                                        <td>Evaluation</td>
                                        <td>02, june 2020</td>
                                        <td>John Doe</td>
                                        <td>-</td>
                                      </tr>
                                    </tbody>
                                  </table>
                             </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="all-reports" role="tabpanel">
                          <div class="table-responsive card">
                              <div class="card-body">
                            <h4 class="pb-3">All Reports</h4>
                              <table class="table table-striped custom-table datatable">
                                <thead>
                                  <tr>
                                    <th>Report Name</th>
                                    <th>Date Created</th>
                                    <th>Created By</th>
                                    <th>Scheduled</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><a href="#">All Report</a></td>
                                    <td>07, Aug 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                   <tr>
                                    <td>Project Management</td>
                                    <td>02, April 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td>Evaluation</td>
                                    <td>02, june 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="task-reports" role="tabpanel">
                          <div class="table-responsive card">
                              <div class="card-body">
                                <h4 class="pb-3">Task Reports</h4>
                                  <table class="table table-striped custom-table datatable">
                                    <thead>
                                      <tr>
                                        <th>Report Name</th>
                                        <th>Date Created</th>
                                        <th>Created By</th>
                                        <th>Scheduled</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     <tr>
                                        <td><a href="#">Task Report</a></td>
                                        <td>07, Aug 2020</td>
                                        <td>John Doe</td>
                                        <td>-</td>
                                      </tr>
                                       <tr>
                                        <td>Project Management</td>
                                        <td>02, April 2020</td>
                                        <td>John Doe</td>
                                        <td>-</td>
                                      </tr>
                                      <tr>
                                        <td>Evaluation</td>
                                        <td>02, june 2020</td>
                                        <td>John Doe</td>
                                        <td>-</td>
                                      </tr>
                                    </tbody>
                                </table>
                             </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="contact-reports" role="tabpanel">
                          <div class="table-responsive card">
                              <div class="card-body">
                            <h4 class="pb-3">Contact Reports</h4>
                                  <table class="table table-striped custom-table datatable">
                                    <thead>
                                      <tr>
                                        <th>Report Name</th>
                                        <th>Date Created</th>
                                        <th>Created By</th>
                                        <th>Scheduled</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><a href="#">Contact Report</a></td>
                                        <td>07, Aug 2020</td>
                                        <td>John Doe</td>
                                        <td>-</td>
                                      </tr>
                                       <tr>
                                        <td>Project Management</td>
                                        <td>02, April 2020</td>
                                        <td>John Doe</td>
                                        <td>-</td>
                                      </tr>
                                      <tr>
                                        <td>Evaluation</td>
                                        <td>02, june 2020</td>
                                        <td>John Doe</td>
                                        <td>-</td>
                                      </tr>
                                    </tbody>
                                  </table>
                             </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="company-reports" role="tabpanel">
                          <div class="table-responsive card">
                              <div class="card-body">
                            <h4 class="pb-3">Company Reports</h4>
                              <table class="table table-striped custom-table datatable">
                                <thead>
                                  <tr>
                                    <th>Report Name</th>
                                    <th>Date Created</th>
                                    <th>Created By</th>
                                    <th>Scheduled</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><a href="#">Company Report</a></td>
                                    <td>07, Aug 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                   <tr>
                                    <td>Project Management</td>
                                    <td>02, April 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td>Evaluation</td>
                                    <td>02, june 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                               
                                  </tr>
                                </tbody>
                              </table>
                              </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="lead-reports" role="tabpanel">
                          <div class="table-responsive card">
                              <div class="card-body">
                            <h4 class="pb-3">Lead Reports</h4>
                              <table class="table table-striped custom-table datatable">
                                <thead>
                                  <tr>
                                    <th>Report Name</th>
                                    <th>Date Created</th>
                                    <th>Created By</th>
                                    <th>Scheduled</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><a href="#">Lead Report</a></td>
                                    <td>07, Aug 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                   <tr>
                                    <td>Project Management</td>
                                    <td>02, April 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td>Evaluation</td>
                                    <td>02, june 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                </tbody>
                              </table>
                              </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="deal-reports" role="tabpanel">
                          <div class="table-responsive card">
                              <div class="card-body">
                            <h4 class="pb-3">Deal Reports</h4>
                              <table class="table table-striped custom-table datatable">
                                <thead>
                                  <tr>
                                    <th>Report Name</th>
                                    <th>Date Created</th>
                                    <th>Created By</th>
                                    <th>Scheduled</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><a href="#">Deal Report</a></td>
                                    <td>07, Aug 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                   <tr>
                                    <td>Project Management</td>
                                    <td>02, April 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td>Evaluation</td>
                                    <td>02, june 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="project-reports" role="tabpanel">
                          <div class="table-responsive card">
                              <div class="card-body">
                            <h4 class="pb-3">Project Reports</h4>
                              <table class="table table-striped custom-table datatable">
                                <thead>
                                  <tr>
                                    <th>Report Name</th>
                                    <th>Date Created</th>
                                    <th>Created By</th>
                                    <th>Scheduled</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><a href="#">Project Report</a></td>
                                    <td>07, Aug 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                   <tr>
                                    <td>Project Management</td>
                                    <td>02, April 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td>Evaluation</td>
                                    <td>02, june 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="other-reports" role="tabpanel">
                          <div class="table-responsive card">
                              <div class="card-body">
                            <h4 class="pb-3">Other Reports</h4>
                              <table class="table table-striped custom-table datatable">
                                <thead>
                                  <tr>
                                    <th>Report Name</th>
                                    <th>Date Created</th>
                                    <th>Created By</th>
                                    <th>Scheduled</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><a href="#">Event Report</a></td>
                                    <td>02, june 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td>Inventry</td>
                                    <td>07, Aug 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                   <tr>
                                    <td>Project Management</td>
                                    <td>02, April 2020</td>
                                    <td>John Doe</td>
                                    <td>-</td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
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