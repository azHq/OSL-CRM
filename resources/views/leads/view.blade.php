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
        <div class="card p-md-4 p-2 mt-2 lkb-profile-board">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-nowrap custom-table mb-0 datatable w-100">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Time</th>
                                        <th>Lead</th>
                                        <th>Counselor</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($lead->report as $report)
                                        <tr>
                                            <td>{{ $report->title }}</td>
                                            <td>{{ $report->type }}</td>
                                            <td>{{ $report->description }}</td>
                                            <td>{{ $report->created_at }}</td>
                                            <td>{{ $lead->name }}</td>
                                            <td>{{ $report->user->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                    </span> Applications
                    </h3>
                </div>
                <div class="col p-0 text-end">
                        <button class="add btn add-application btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-application" data-bs-toggle="modal" data-bs-target="#add_application">
                            <i class="fa fa-plus" aria-hidden="true"></i> Apply
                        </button>
                </div>
            </div>
              <div>
                  @include('applications.applications')
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
