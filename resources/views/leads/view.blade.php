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
