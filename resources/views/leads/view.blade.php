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

        <!-- Documents -->
        @if (!$lead->document)
        <div class="d-flex justify-content-center">
            <button class="add btn mt-4 btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="documents-initialize">
                <i class="fa fa-upload" aria-hidden="true"></i>
                Upload Documents
            </button>
        </div>
        @else
        <div class="card shadow p-md-4 p-2 mt-2 mt-md-4 lkb-profile-board">
            <legend>Documents</legend>
            <div class="row pl-30px">
                <div class="row mt-4">

                    <!-- Passport -->
                    <div class="col">
                        <span> Passport <span class="text-danger">*</span>
                            @if ($lead->document->passport)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($lead->document->passport)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $lead->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="passport">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editPassport');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data" id="editPassport" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="passport" onchange="loadFile(event, 'submit-passport')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="passport">
                                <button type="submit" id="submit-passport" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="passport" onchange="loadFile(event, 'update-passport')" class="hide-input" required>
                                <input type="hidden" name="name" value="passport">
                                <button type="submit" id="update-passport" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- Academics -->
                    <div class="col">
                        <span> Academics <span class="text-danger">*</span>
                            @if ($lead->document->academics)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($lead->document->academics)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $lead->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="academics">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editAcademics');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data" id="editAcademics" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="academics" onchange="loadFile(event, 'submit-academics')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="academics">
                                <button type="submit" id="submit-academics" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="academics" onchange="loadFile(event, 'update-academics')" class="hide-input" required>
                                <input type="hidden" name="name" value="academics">
                                <button type="submit" id="update-academics" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- CV -->
                    <div class="col">
                        <span> CV <span class="text-danger">*</span>
                            @if ($lead->document->cv)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($lead->document->cv)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $lead->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="cv">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editCv');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data" id="editCv" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="cv" onchange="loadFile(event, 'submit-cv')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="cv">
                                <button type="submit" id="submit-cv" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="cv" onchange="loadFile(event, 'update-cv')" class="hide-input" required>
                                <input type="hidden" name="name" value="cv">
                                <button type="submit" id="update-cv" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="row mt-4">

                    <!-- MOI -->
                    <div class="col">
                        <span> MOI <span class="text-danger">*</span>
                            @if ($lead->document->moi)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($lead->document->moi)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $lead->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="moi">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editMoi');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data" id="editMoi" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="moi" onchange="loadFile(event, 'submit-moi')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="moi">
                                <button type="submit" id="submit-moi" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="moi" onchange="loadFile(event, 'update-moi')" class="hide-input" required>
                                <input type="hidden" name="name" value="moi">
                                <button type="submit" id="update-moi" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- Recommendation -->
                    <div class="col">
                        <span> Recommendation <span class="text-danger">*</span>
                            @if ($lead->document->recommendation)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($lead->document->recommendation)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $lead->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="recommendation">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editRecommendation');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data" id="editRecommendation" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="recommendation" onchange="loadFile(event, 'submit-recommendation')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="recommendation">
                                <button type="submit" id="submit-recommendation" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="recommendation" onchange="loadFile(event, 'update-recommendation')" class="hide-input" required>
                                <input type="hidden" name="name" value="recommendation">
                                <button type="submit" id="update-recommendation" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- Job Experience -->
                    <div class="col">
                        <span> Job Experience (if any)
                            @if ($lead->document->job_experience)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($lead->document->job_experience)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $lead->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="job_experience">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editJobExperience');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data" id="editJobExperience" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="job_experience" onchange="loadFile(event, 'submit-job_experience')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="job_experience">
                                <button type="submit" id="submit-job_experience" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="job_experience" onchange="loadFile(event, 'update-job_experience')" class="hide-input" required>
                                <input type="hidden" name="name" value="job_experience">
                                <button type="submit" id="update-job_experience" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="row mt-4">

                    <!-- SOP -->
                    <div class="col">
                        <span> SOP <span class="text-danger">*</span>
                            @if ($lead->document->sop)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($lead->document->sop)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $lead->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="sop">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editSop');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data" id="editSop" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="sop" onchange="loadFile(event, 'submit-sop')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="sop">
                                <button type="submit" id="submit-sop" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="sop" onchange="loadFile(event, 'update-sop')" class="hide-input" required>
                                <input type="hidden" name="name" value="sop">
                                <button type="submit" id="update-sop" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- Others -->
                    <div class="col">
                        <span> Others <span class="text-danger">*</span>
                            @if ($lead->document->others)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($lead->document->others)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $lead->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="others">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editOthers');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data" id="editOthers" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="others" onchange="loadFile(event, 'submit-others')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="others">
                                <button type="submit" id="submit-others" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$lead->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="others" onchange="loadFile(event, 'update-others')" class="hide-input" required>
                                <input type="hidden" name="name" value="others">
                                <button type="submit" id="update-others" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- Blank -->
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
    <!-- /Page Content -->
    @component('leads.edit')
    @endcomponent

    <script>
        $('#documents-initialize').on('click', function() {
            documentsInitialize('{{$lead->id}}');
        });

        function documentsInitialize(lead_id) {
            var url = "{{ route('documents.initialize','lead_id') }}";
            url = url.replace("lead_id", lead_id);
            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    </script>

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