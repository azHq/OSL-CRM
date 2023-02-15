    <!-- Page Content -->
    <div class="content container-fluid">
        @component('components.custombreadcrumb')
        @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
        @slot('title') Lead @endslot
        @push('list') <li class="breadcrumb-item"><a href="{{route('leads.index')}}">Leads</a></li> @endpush
        @push('list') <li class="breadcrumb-item active">Lead</li> @endpush
        @endcomponent
        @include('components.flash')
        <div class="card p-md-4 p-2 mt-2 mt-md-4 lkb-profile-board">
             <div class="row">
                 <div class="col-md-6 profile-left">
                     <div class="pic">
                         <img src="{{ asset('assets/img/profiles/profile.png') }}" alt="User" class="user-image" />
                     </div>
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Lead</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->name}}" required disabled>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Lead Phone</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->mobile}}" required disabled>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Lead Email</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->email}}" required disabled>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Lead Status</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->status}}" required disabled>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Counsellor</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->owner?$lead->owner->name:'Unassigned'}}" required disabled>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 m-auto">
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Intake Month / Year</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->intake_month_year ?? 'N/A'}}" required disabled>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Last Education</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->last_education??'N/A'}}" required disabled>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Completion Date</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->completion_date??'N/A'}}" required disabled>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Job Experience</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->job_experience??'N/A'}}" required disabled>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">English</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->english ?? 'N/A'}}" required disabled>
                             </div>
                         </div>
                     </div>

                     <div class="col">
                         <div class="form-group row">
                             <div class="col-md-12"><label class="col-form-label">Creator</label></div>
                             <div class="col-md-12">
                                 <input id="edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->creator?$lead->creator->name:'NA'}}" required disabled>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
        </div>
        <div class="crms-title row bg-white mt-4">
            <div class="col  p-0">
                <h3 class="page-title m-0">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span> Reports
                </h3>
            </div>
        </div>
        <div class="card p-md-4 p-2 lkb-profile-board">
            <div class="row">
                table shall go here
            </div>
        </div>


            <div class="crms-title row bg-white mt-4">
                <div class="col  p-0">
                    <h3 class="page-title m-0">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span> Applications
                    </h3>
                </div>
                <div class="col p-0 text-end">
                        <button class="add btn add-application btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-application" data-bs-toggle="modal" data-bs-target="#add_application">
                            <i class="fa fa-plus" aria-hidden="true"></i> Apply
                        </button>
                </div>
            </div>
            <div class="card p-md-4 p-2 mt-2 mb-2 lkb-profile-board">
                <table class="table mb-4 mt-4">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th>Lead</th>
                        <th>Course</th>
                        <th>Intake Month</th>
                        <th>Intake Year</th>
                        <th>University</th>
                        @if(Auth::user()->hasRole('super-admin'))
                            <th>Counsellor</th>
                        @endif
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach($lead->applications as $application)
                        <tr style="border-style: none !important; color:black !important;">
                            <td>
                                {{ $loop->index }}
                            </td>
                            <td>
                                {{$application->lead->name}}
                            </td>
                            <td>
                                {{$application->course}}
                            </td>
                            <td>
                                {{$application->intake_month}}
                            </td>
                            <td>
                                {{$application->intake_year}}
                            </td>
                            <td>
                                {{$application->university->name}}
                            </td>
                            <td>
                                {{$lead->owner?$lead->owner->name:'Unassigned'}}
                            </td>
                            <td>
                                {{$application->status}}
                            </td>
                            <td>
                                <button onclick="showEditModal({{$application->id}})" type="button" class="add btn btn-sm btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" data-bs-toggle="modal" data-bs-target="#application_edit"><i class="feather-edit"></i></button>
                                <button onclick="deleteApplication({{$application->id}})" type="button" class="btn btn-danger font-weight-bold text-white todo-list-add-btn btn-rounded"><i class="feather-trash-2"></i></button>
                            </td>
                        </tr>

                    @endforeach

                </table>
            </div>

            <div class="modal center fade" id="application_edit" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
                <div class="modal-dialog lkb-modal-dialog" role="document">
                    <button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title text-center">Apply Now</h4>
                            <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="application-update" action="" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row">
                                                    <div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
                                                    <div class="col-md-12">
                                                        <input disabled id="application-edit-lead-name" class="form-control" type="text" name="name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                                        <input disabled id="application-edit-lead-email" type="text" class="form-control" name="email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                                        <input disabled id="application-edit-lead-mobile" type="text" class="form-control" name="mobile" maxlength="13" minlength="7" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Course Label <span class="text-danger">*</span></label>
                                                <select class=" form-control form-select" name="course" id="application-edit-course">
                                                    <option value="Foundation">Foundation</option>
                                                    <option value="TOP-UP 2nd Year">TOP-UP 2nd Year</option>
                                                    <option value="TOP-UP 3rd Year">TOP-UP 3rd Year</option>
                                                    <option value="Bachelors">Bachelors</option>
                                                    <option value="Pre-Masters">Pre-Masters</option>
                                                    <option value="Masters">Masters</option>
                                                    <option value="PHD">PHD</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">University</label>
                                                <select class=" form-control form-select" name="university_id" id="application-edit-universities">
                                                    <option value="">Unassigned</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Intake Month<span class="text-danger">*</span></label>
                                                <select class=" form-control form-select" name="intake_month" required id="application-edit-intake_month">
                                                    <option value="1">January</option>
                                                    <option value="2">Febraury</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Intake Year<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control intake-year" id="application-edit-intake_year" name="intake_year" placeholder="2022" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label class="col-form-label">Course Details <span class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="course_details" id="application-edit-course_details" placeholder="About Course" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                                <select class=" form-control form-select" name="status" id="application-edit-status">
                                                    <option value="Applied">Applied</option>
                                                    <option value="Offer Received">Offer Received</option>
                                                    <option value="Paid">Paid</option>
                                                    <option value="Visa">Visa</option>
                                                    <option value="Enrolled">Enrolled</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Compliance <span class="text-danger">*</span></label>
                                                <select class=" form-control form-select" name="compliance" id="application-edit-compliance">
                                                    <option value="Pending">Pending</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Rejected">Rejected</option>
                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" id="lead-id" class="form-control" name="lead_id" required value="{{$lead->id}}">

                                        <div class="text-center py-3">
                                            <button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
                                            <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div><!-- modal-content -->
                </div>
                <!-- modal-dialog -->
            </div>

    </div>
    <!-- /Page Content -->
    @component('leads.edit')
    @endcomponent

    @component('applications.create')
    @endcomponent
    <script>
        function showEditModal(id){
            getApplicationCreate();
            getApplication(id);
            var url = "{{ route('applications.update', 'id') }}";
            url = url.replace('id', id);
            $('#application-update').attr('action', url);
        }
        function showModal(){
            $("#add_application").modal('show');
        }
        function deleteApplication(id) {
            $.confirm({
                title: 'Confirm',
                content: 'Do you want to delete this Application ?',
                buttons: {
                    info: {
                        text: 'Cancel',
                        btnClass: 'btn-blue',
                        action: function() {
                            // canceled
                        }
                    },
                    danger: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function() {
                            var url = "{{ route('applications.delete','id') }}";
                            url = url.replace('id', id);
                            $.ajax({
                                type: 'GET',
                                url: url,
                                success: function(data) {
                                    window.location.reload();
                                }
                            });
                        }
                    },
                }
            });
        }

        function getApplication(id) {
            var url = "{{ route('applications.edit', 'id') }}";
            url = url.replace('id', id);
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $('#application-edit-lead-name').val(data.lead.name);
                    $('#application-edit-lead-email').val(data.lead.email);
                    $('#application-edit-lead-mobile').val(data.lead.mobile);
                    $('#application-edit-course').val(data.course);
                    $('#application-edit-intake_year').val(data.intake_year);
                    $('#application-edit-intake_month').val(data.intake_month);
                    $('#application-edit-course_details').val(data.course_details);
                    $('#application-edit-universities').val(data.university_id);
                    $('#application-edit-compliance').val(data.compliance);
                    $('#application-edit-status').val(data.status);
                }
            });
        }

        function getApplicationCreate() {
            $.ajax({
                type: 'GET',
                url: "{{ route('applications.create') }}",
                success: function(data) {
                    var options = '';
                    data.universities.forEach(function(university) {
                        options += '<option value="' + university.id + '">' + university.name + '</option>';
                    });
                    $('#application-edit-universities').html(options);
                }
            });
        }
    </script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

    <script>
        function loadFile(e, btnId) {
            if (e.target.value != "") {
                $('#' + btnId).removeClass('d-none');
                file = e.target.files[0];
            }
        }
    </script>

    <script>
        function documentsEdit(e, name) {
            e.target.className.baseVal += " d-none";
            $('#' + name).removeClass('d-none');
        }
    </script>

    <style>
        .pic{
            height: 150px;
            width: 150px;
            justify-content: center;
            margin: 0 auto;
        }
        .profile-left{
            border-right: 1px solid grey;
            padding-left: 5%;
        }
    </style>
