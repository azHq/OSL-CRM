    <!-- Page Content -->
    <?php
    $leadsClass = '';
    $pendingClass = '';
    $admissionClass = '';
    $visaClass = '';
    if ($lead->category == 'Leads') {
        $leadsClass = 'active';
        // $pendingClass = 'active';
    } else if ($lead->category == 'Student') {
        $leadsClass = 'complete';
        $pendingClass = 'active';
        // $admissionClass = 'active';
    } else if ($lead->category == 'Addmission') {
        $leadsClass = 'complete';
        $pendingClass = 'complete';
        $admissionClass = 'active';
        // $visaClass = 'active';
    } else if ($lead->category == 'Visa Compliance') {
        $leadsClass = 'complete';
        $pendingClass = 'complete';
        $admissionClass = 'complete';
        $visaClass = 'active';
    }
    ?>
    <div class="content container-fluid">
        @component('components.custombreadcrumb')
        @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
        @slot('title') Lead @endslot
        @push('list') <li class="breadcrumb-item"><a href="{{route('leads.index')}}">Leads</a></li> @endpush
        @push('list') <li class="breadcrumb-item active">Lead</li> @endpush
        @endcomponent
        @include('components.flash')
        <div class="card p-md-4 p-2 mt-2 lkb-profile-board">
            <div class="col text-end">
                <button data-id="{{$lead->id}}" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#editview_lead" class="edit-lead lkb-table-action-btn url badge-info btn-edit" onclick="viewDetails('{{$lead->id}}')"><i class="feather-edit"></i></button>
            </div>
            <input hidden value="{{$lead->subCategory}}" id="leadSubcategory" />

            <div class="row ms-progressbar" style="border-bottom:0;">
                <div class="col-md-3 ms-progressbar-step {{$leadsClass}}">
                    <div class="text-center ms-progressbar-step-number">Leads</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <div class="btn-group ms-progressbar-dot">

                        @if($leadsClass != 'active' && $leadsClass != '')
                        <button type="button" class="tick tick-success" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        @else
                        <button type="button" class="btn btn-gray dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        @endif
                        <div class="dropdown-menu" id="leads_sub">

                        </div>
                    </div>
                    <!-- <a href="#" class="ms-progressbar-dot"></a> -->

                </div>

                <div class="col-md-3 ms-progressbar-step {{$pendingClass}}">
                    <!-- complete -->
                    <div class="text-center ms-progressbar-step-number">Student</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <div class="btn-group ms-progressbar-dot">
                        @if($pendingClass != 'active' && $pendingClass != '')
                        <button type="button" class="tick tick-success" data-bs-toggle="dropdown" aria-haspopup=" true" aria-expanded="false"></button>
                        @else
                        <button type="button" class="btn btn-gray dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        @endif
                        <div class="dropdown-menu" id="pending_sub">

                        </div>
                    </div>

                </div>

                <div class="col-md-3 ms-progressbar-step {{$admissionClass}}">
                    <!-- complete -->
                    <div class="text-center ms-progressbar-step-number">Admission</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <div class="btn-group ms-progressbar-dot">
                        @if($admissionClass != 'active' && $admissionClass != '')
                        <button type="button" class="tick tick-success" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        @else
                        <button type="button" class="btn btn-gray dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        @endif
                        <div class="dropdown-menu" id="admission_sub">
                        </div>
                    </div>

                </div>

                <div class="col-md-3 ms-progressbar-step {{$visaClass}}">
                    <!-- active -->
                    <div class="text-center ms-progressbar-step-number">Visa Compliance</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <div class="btn-group ms-progressbar-dot">
                        @if($visaClass != 'active' && $visaClass != '')
                        <button type="button" class="tick tick-success" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        @else
                        <button type="button" class="btn btn-gray dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        @endif
                        <div class="dropdown-menu" id="visa_sub">

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 profile-left">
                <div class="pic">
                    <img src="{{ asset('assets/img/profiles/profile.png') }}" alt="User" class="user-image" />
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Lead</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-name" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->name}}" required disabled>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Lead Phone</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-phone" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->mobile}}" required disabled>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Lead Email</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-email" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->email}}" required disabled>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Lead Status</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-status" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->status}}" required disabled>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Assigned Person</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-counsellor" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->owner?$lead->owner->name:'Unassigned'}}" required disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 m-auto">
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Intake Month / Year</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-monthh" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->intake_month_year ?? 'N/A'}}" required disabled>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Last Education</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-edu" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->last_education??'N/A'}}" required disabled>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Last Education Year</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-date" type="text" class="form-control" name="completion_date" placeholder="{{date('Y')}}">

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Job Experience</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-job" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->job_experience??'N/A'}}" required disabled>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">English</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-english" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->english ?? 'N/A'}}" required disabled>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-12"><label class="col-form-label">Creator</label></div>
                        <div class="col-md-12">
                            <input id="view-edit-lead-creator" class="form-control font-weight-bold" type="text" name="name" value="{{$lead->creator?$lead->creator->name:'NA'}}" required disabled>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @if(!Auth::user()->hasRole('student'))
        <div class="crms-title row bg-white mt-4">
            <div class="col  p-0">
                <h3 class="page-title m-0">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span> Remarks
                </h3>
            </div>

            <div class="col p-0 text-end">
                <button class="add btn add-application btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-remarks" data-bs-toggle="modal" data-bs-target="#add_remarks">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add remarks
                </button>
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
                                            <th>Remarks</th>
                                            <th>Added By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lead->remark as $remark)
                                        <tr>
                                            <td>{{ $remark->value }}</td>
                                            <td>{{ $remark->user->name }}</td>
                                            <td>
                                                <a href="javascript:;" data-id="{{ $remark->id }}" data-bs-toggle="modal" data-bs-target="#edit_remarks" class="edit_remarks lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>
                                            </td>
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
        @endif
        @if($lead->category != 'Leads' && $lead->category != 'Student')
        <div class="crms-title row bg-white mt-4">
            <div class="col  p-0">
                <h3 class="page-title m-0">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span> Applications
                </h3>
            </div>
            @if(!Auth::user()->hasRole('student'))
            <div class="col p-0 text-end">
                <button class="add btn add-application btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-application" data-bs-toggle="modal" data-bs-target="#add_application">
                    <i class="fa fa-plus" aria-hidden="true"></i> Apply
                </button>
            </div>
            @endif
        </div>
        <div>
            @include('leads.applications')
        </div>
        @endif
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
                                            <th>Remarks</th>
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

                                            @if($report->remarks)
                                            <td>{{ $report->remarks->value }}</td>
                                            @else
                                            <td></td>
                                            @endif
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
        <!-- /Page Content -->
        @component('leads.editview')
        @endcomponent

        @component('applications.create')
        @endcomponent

        @component('leads.remarks')
        @endcomponent
        @component('leads.edit-remarks')
        @endcomponent
        <script>
            $(document).ready(function() {
                getSubCategories();
            });
            async function viewDetails(id) {
                await getLeadEditOwners();
                await getCountries();
                await getLead(id);
                var url = "{{ route('leads.update', 'id') }}";
                url = url.replace('id', id);
                $('#lead-update').attr('action', url);
                $('#editview_lead').modal('show');

                async function getCountries() {
                    await $.ajax({
                        type: 'GET',
                        url: "{{ route('countries.info') }}",
                        success: function(countries) {
                            var options = '<option value="" selected>Select Country</option>';
                            countries.forEach(function(country) {
                                options += '<option value="' + country.name + '">' + country.name + '</option>';
                            });
                            $('#edit-country-info').html(options);

                        }
                    });
                }
                async function updateHtml(elementId, value) {
                    let pre_html = $(elementId).html()
                    if (value && !pre_html.includes(value)) {
                        let next_html = `
					<option value="${value}">${value}</option>
					${pre_html}
				`
                        await $(elementId).html(next_html)
                    }
                    await $(elementId).val(value || 'N/A');
                }
                async function getLead(id) {
                    var url = "{{ route('leads.edit', 'id') }}";
                    url = url.replace('id', id);
                    await $.ajax({
                        type: 'GET',
                        url: url,
                        success: async function(data) {
                            var lead = data.lead;
                            await $('#edit-lead-name').val(lead.name);
                            await $('#edit-lead-email').val(lead.email);
                            await $('#edit-lead-mobile').val(lead.mobile);
                            await $('#edit-lead-intake_month').val(lead.intake_month);
                            await $('#edit-lead-status').val(lead.status);
                            await $('#edit-lead-intake_year').val(lead.intake_year);
                            await $('#edit-lead-completion_date').val(lead.completion_date);
                            await $('#edit-lead-education_details').val(lead.education_details);
                            await $('#edit-lead-english').val(lead.english);
                            await $('#edit-lead-english_result').val(lead.english_result);
                            await $('#edit-lead-job_experience').val(lead.job_experience);
                            await $('#edit-lead-owner_id').val(lead.owner_id);
                            await $('#edit-country-info').val(lead.country);
                            await $('#edit-passport').val(lead.passport);
                            await $('#edit-address').val(lead.address);

                            await updateHtml('#edit-lead-last_education', lead.last_education)
                            await updateHtml('#edit-lead-english', lead.english)
                            await updateHtml('#edit-lead-source', lead.insert_type)
                            await updateHtml('#edit-lead-destination', lead.destination)
                            //             let pre_html = $('#edit-lead-last_education').html()
                            //             let next_html = `
                            // 	<option value="${lead.last_education}">${lead.last_education}</option>
                            // 	${pre_html}
                            // `
                            //             await $('#edit-lead-last_education').html(next_html)

                            //             // $('#edit-lead-name').html(next_html)

                            //             pre_html = $('#edit-lead-english').html()
                            //             next_html = `
                            // 	<option value="${lead.english}">${lead.english}</option>
                            // 	${pre_html}
                            // `
                            //             await $('#edit-lead-english').html(next_html)


                            var options = '';
                            data.categories.forEach(function(category) {
                                options += '<option value="' + category.id + '"' + (category.id == data.category_id ? 'selected' : '') + '>' + category.name + '</option>';
                            });
                            await $('#lead-edit-category').html(options);

                            options = '';
                            data.subcategories.forEach(function(subcategory) {
                                options += '<option value="' + subcategory.id + '"' + (subcategory.id == data.subcategory_id ? 'selected' : '') + '>' + subcategory.name + '</option>';
                            });
                            await $('#lead-edit-subcategory').html(options);
                        }
                    });
                }

                async function getLeadEditOwners() {
                    await $.ajax({
                        type: 'GET',
                        url: "{{ route('leads.create') }}",
                        success: function(data) {
                            var options = '<option value="">Unassigned</option>';
                            data.users.forEach(function(user) {
                                options += '<option value="' + user.id + '">' + user.name + '(Counsellor)</option>';
                            });
                            data.cros.forEach(function(user) {
                                options += '<option value="' + user.id + '">' + user.name + '(CRO)</option>';
                            });
                            $('#edit-lead-owner_id').html(options);
                        }
                    });
                }
            }
            // function getSubmenuElem(submenu, data, key, currentSubcategory, foundIndex) {
            //     for (let subcategory of data[key]) {
            //         if (currentSubcategory == subcategory.name) {
            //             foundIndex = true
            //         }
            //         submenu += `<div class="dropdown-item "> ${!foundIndex ?'<span class="tick tick-success" style=" width: 20px; margin-right:5px;height: 20px;"></span>':''}${subcategory.name}</div>`
            //     }
            // }


            function getSubCategories(id) {
                var url = "{{ route('leads.info') }}";
                url = url.replace('id', id);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(data) {
                        let foundIndex = false;
                        let currentSubcategory = $('#leadSubcategory').val()
                        let leadSubmenu = ''
                        for (let subcategory of data['Leads']) {
                            if (currentSubcategory == subcategory.name) {
                                foundIndex = true
                            }
                            leadSubmenu += `<div class="dropdown-item "> ${!foundIndex ?'<span class="tick tick-success" style=" width: 20px; margin-right:5px;height: 20px;"></span>':''}${subcategory.name}</div>`
                        }
                        // getSubmenuElem(leadSubmenu, data, 'Leads', currentSubcategory, foundIndex);
                        $('#leads_sub').html(leadSubmenu);


                        let pendingSubmenu = ''
                        for (let subcategory of data['Student']) {
                            if (currentSubcategory == subcategory.name) {
                                foundIndex = true
                            }
                            pendingSubmenu += `<div class="dropdown-item "> ${!foundIndex ?'<span class="tick tick-success" style=" width: 20px; margin-right:5px;height: 20px;"></span>':''}${subcategory.name}</div>`
                        }
                        // getSubmenuElem(pendingSubmenu, data, 'Pending', currentSubcategory, foundIndex);
                        $('#pending_sub').html(pendingSubmenu);


                        let admissionSubmenu = ''
                        for (let subcategory of data['Addmission']) {
                            if (currentSubcategory == subcategory.name) {
                                foundIndex = true
                            }
                            admissionSubmenu += `<div class="dropdown-item "> ${!foundIndex ?'<span class="tick tick-success" style=" width: 20px; margin-right:5px;height: 20px;"></span>':''}${subcategory.name}</div>`
                        }
                        // getSubmenuElem(admissionSubmenu, data, 'Addmission', currentSubcategory, foundIndex);
                        $('#admission_sub').html(admissionSubmenu);


                        let visaSubmenu = ''
                        for (let subcategory of data['Visa Compliance']) {
                            if (currentSubcategory == subcategory.name) {
                                foundIndex = true
                            }
                            visaSubmenu += `<div class="dropdown-item "> ${!foundIndex ?'<span class="tick tick-success" style=" width: 20px; margin-right:5px;height: 20px;"></span>':''}${subcategory.name}</div>`
                        }
                        // getSubmenuElem(visaSubmenu, data, 'Visa Compliance', currentSubcategory, foundIndex);
                        $('#visa_sub').html(visaSubmenu);
                    }
                });
            }
        </script>
        <script>
            function showEditModal(id) {
                getApplicationCreate();
                getApplication(id);
                var url = "{{ route('applications.update', 'id') }}";
                url = url.replace('id', id);
                $('#application-update').attr('action', url);
            }

            function showModal() {
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
    </div>







    <style>
        .pic {
            height: 150px;
            width: 150px;
            justify-content: center;
            margin: 0 auto;
        }

        .profile-left {
            border-right: 1px solid grey;
            padding-left: 5%;
        }
    </style>