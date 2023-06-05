    <!-- Page Content -->
    <?php
    $leadsClass = '';
    $pendingClass = '';
    $admissionClass = '';
    $visaClass = '';
    if ($lead->category == 'Leads') {
        $leadsClass = 'active';
        // $pendingClass = 'active';
    } else if ($lead->category == 'Pending') {
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
        <div class="card p-md-4 p-2 mt-2 mt-md-4 lkb-profile-board">
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
                    <div class="text-center ms-progressbar-step-number">Pending</div>
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
    </div>



    <!-- <div class="crms-title row bg-white mt-4">
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
     
    </div> -->

    <!-- /Page Content -->


    <script>
        $(document).ready(function() {
            getSubCategories();
        });
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
                        leadSubmenu += `<div class="dropdown-item "> ${!foundIndex ?'<span class="tick tick-success" style=" width: 20px; margin-right:5px;height: 20px;top:0px;right:0px"></span>':''}${subcategory.name}</div>`
                    }
                    // getSubmenuElem(leadSubmenu, data, 'Leads', currentSubcategory, foundIndex);
                    $('#leads_sub').html(leadSubmenu);


                    let pendingSubmenu = ''
                    for (let subcategory of data['Pending']) {
                        if (currentSubcategory == subcategory.name) {
                            foundIndex = true
                        }
                        pendingSubmenu += `<div class="dropdown-item "> ${!foundIndex ?'<span class="tick tick-success" style=" width: 20px; margin-right:5px;height: 20px;top:0px;right:0px"></span>':''}${subcategory.name}</div>`
                    }
                    // getSubmenuElem(pendingSubmenu, data, 'Pending', currentSubcategory, foundIndex);
                    $('#pending_sub').html(pendingSubmenu);


                    let admissionSubmenu = ''
                    for (let subcategory of data['Addmission']) {
                        if (currentSubcategory == subcategory.name) {
                            foundIndex = true
                        }
                        admissionSubmenu += `<div class="dropdown-item "> ${!foundIndex ?'<span class="tick tick-success" style=" width: 20px; margin-right:5px;height: 20px;top:0px;right:0px"></span>':''}${subcategory.name}</div>`
                    }
                    // getSubmenuElem(admissionSubmenu, data, 'Addmission', currentSubcategory, foundIndex);
                    $('#admission_sub').html(admissionSubmenu);


                    let visaSubmenu = ''
                    for (let subcategory of data['Visa Compliance']) {
                        if (currentSubcategory == subcategory.name) {
                            foundIndex = true
                        }
                        visaSubmenu += `<div class="dropdown-item "> ${!foundIndex ?'<span class="tick tick-success" style=" width: 20px; margin-right:5px;height: 20px;top:0px;right:0px"></span>':''}${subcategory.name}</div>`
                    }
                    // getSubmenuElem(visaSubmenu, data, 'Visa Compliance', currentSubcategory, foundIndex);
                    $('#visa_sub').html(visaSubmenu);
                }
            });
        }
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