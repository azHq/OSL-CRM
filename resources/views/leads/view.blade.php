    <!-- Page Content -->
    <div class="content container-fluid">
        @component('components.custombreadcrumb')
        @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
        @slot('title') Lead @endslot
        @push('list') <li class="breadcrumb-item"><a href="{{route('leads.index')}}">Leads</a></li> @endpush
        @push('list') <li class="breadcrumb-item active">Lead</li> @endpush
        @endcomponent
        @include('components.flash')
        <div class="card shadow p-md-4 p-2 mt-2 mt-md-4 lkb-profile-board">
            <div class="row">
                <div class="col account d-flex">
                    <div class="company_img">
                        <img src="{{ asset('assets/img/profiles/profile.png') }}" alt="User" class="user-image" />
                    </div>
                    <div class="my-auto">
                        <p class="mb-0">Lead</p>
                        <span class="modal-title"> <strong>{{$lead->name}}</strong> </span>&nbsp;
                        <span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;
                        <span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="col">
                    <span>Lead Phone</span>
                    <p class="font-weight-bold">{{$lead->mobile}}</p>
                </div>
                <div class="col">
                    <span>Lead Email</span>
                    <p class="font-weight-bold">{{$lead->email}}</p>
                </div>
                <div class="col">
                    <span>Lead Status</span>
                    <p class="font-weight-bold">{{$lead->status}}</p>
                </div>
                <div class="col-1">
                    <a href="#" data-id="{{$lead->id}}" data-bs-toggle="modal" data-bs-target="#edit_lead" class="edit-lead lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>
                    <a href="#" onclick="leadConvert('{{$lead->id}}');" class="lkb-table-action-btn badge-success btn-convert"><i class="feather-navigation"></i></a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <span>Intake Month / Year</span>
                    <p class="font-weight-bold">{{$lead->intake_month_year ?? 'N/A'}}</p>
                </div>
                <div class="col">
                    <span>Last Education</span>
                    <p class="font-weight-bold">
                        {{$lead->last_education??'N/A'}}
                        <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="{{$lead->education_details??'N/A'}}"></i>
                    </p>
                </div>
                <div class="col">
                    <span>Completion Date</span>
                    <p class="font-weight-bold">{{$lead->completion_date??'N/A'}}</p>
                </div>
                <div class="col">
                    <span>Job Experience</span>
                    <p class="font-weight-bold">{{$lead->job_experience??'N/A'}}</p>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <span>English</span>
                    <p class="font-weight-bold">{{$lead->english ?? 'N/A'}}</p>
                </div>
                <div class="col">
                    <span>Englist Result</span>
                    <p class="font-weight-bold">{{$lead->english_result??'N/A'}}</p>
                </div>
                <div class="col">
                    <span>Counsellor</span>
                    <p class="font-weight-bold">{{$lead->owner?$lead->owner->name:'Unassigned'}}</p>
                </div>
                <div class="col">
                    <span>Creator</span>
                    <p class="font-weight-bold">{{$lead->creator?$lead->creator->name:'NA'}}</p>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    @component('leads.edit')
    @endcomponent

    <script>
        function leadConvert(id) {
            $.confirm({
                title: 'Confirm',
                buttons: {
                    info: {
                        text: 'Cancel',
                        btnClass: 'btn-red',
                        action: function() {
                            // canceled
                        }
                    },
                    danger: {
                        text: 'Convert',
                        btnClass: 'btn-blue',
                        action: function() {
                            var url = "{{ route('leads.convert','id') }}";
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
    </script>