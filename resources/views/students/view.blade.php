    <!-- Page Content -->
    <div class="content container-fluid">
        @component('components.custombreadcrumb')
        @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
        @slot('title') Student @endslot
        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('super-admin'))
        @push('list') <li class="breadcrumb-item"><a href="{{route('students.index')}}">Students</a></li> @endpush
        @endif
        @push('list') <li class="breadcrumb-item active">Student</li> @endpush
        @endcomponent
        @include('components.flash')
        <div class="card shadow p-md-4 p-2 mt-2 mt-md-4 lkb-profile-board">
            <div class="row">
                <div class="col account d-flex">
                    <div class="company_img">
                        <img src="{{ asset('assets/img/profiles/profile.png') }}" alt="User" class="user-image" />
                    </div>
                    <div class="my-auto">
                        <p class="mb-0">Student</p>
                        <span class="modal-title"> <strong>{{$student->name}}</strong> </span>&nbsp;
                        <span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;
                        <span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="col">
                    <span>Student Phone</span>
                    <p class="font-weight-bold">{{$student->mobile}}</p>
                </div>
                <div class="col">
                    <span>Student Email</span>
                    <p class="font-weight-bold">{{$student->email}}</p>
                </div>
                <div class="col">
                    <span>Purpose</span>
                    <p class="font-weight-bold">{{$student->status}}</p>
                </div>
                <div class="col-1">
                    <a href="#" data-id="{{$student->id}}" data-bs-toggle="modal" data-bs-target="#edit_student" class="edit-student lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <span>Intake Month / Year</span>
                    <p class="font-weight-bold">{{$student->intake_month_year ?? 'N/A'}}</p>
                </div>
                <div class="col">
                    <span>Last Education</span>
                    <p class="font-weight-bold">
                        {{$student->last_education??'N/A'}}
                        <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="{{$student->education_details??'N/A'}}"></i>
                    </p>
                </div>
                <div class="col">
                    <span>Completion Date</span>
                    <p class="font-weight-bold">{{$student->completion_date??'N/A'}}</p>
                </div>
                <div class="col">
                    <span>Job Experience</span>
                    <p class="font-weight-bold">{{$student->job_experience??'N/A'}}</p>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <span>English</span>
                    <p class="font-weight-bold">{{$student->english ?? 'N/A'}}</p>
                </div>
                <div class="col">
                    <span>Englist Result</span>
                    <p class="font-weight-bold">{{$student->english_result??'N/A'}}</p>
                </div>
                <div class="col">
                    <span>Documents</span>
                    <p class="font-weight-bold">{{$student->documents_pending?'Pending':'Completed'}}</p>
                </div>
                <div class="col">
                    <span>Applications</span>
                    <p class="font-weight-bold">{{$student->applications->count()}}</p>
                </div>
                <div class="col-1"></div>
            </div>
        </div>

        <!-- Documents -->
        @if (!$student->document)
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

                    <!-- Masters -->
                    <div class="col">
                        <span> Masters <span class="text-danger">*</span>
                            @if ($student->document->masters)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->masters)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="masters">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editMasters');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editMasters" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="masters" onchange="loadFile(event, 'submit-masters')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="masters">
                                <button type="submit" id="submit-masters" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="masters" onchange="loadFile(event, 'update-masters')" class="hide-input" required>
                                <input type="hidden" name="name" value="masters">
                                <button type="submit" id="update-masters" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- Bachelors -->
                    <div class="col">
                        <span> Bachelors <span class="text-danger">*</span>
                            @if ($student->document->bachelors)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->bachelors)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="bachelors">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editBachelors');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editBachelors" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="bachelors" onchange="loadFile(event, 'submit-bachelors')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="bachelors">
                                <button type="submit" id="submit-bachelors" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="bachelors" onchange="loadFile(event, 'update-bachelors')" class="hide-input" required>
                                <input type="hidden" name="name" value="bachelors">
                                <button type="submit" id="update-bachelors" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- HSC -->
                    <div class="col">
                        <span> HSC <span class="text-danger">*</span>
                            @if ($student->document->hsc)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->hsc)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="hsc">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editHsc');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editHsc" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="hsc" onchange="loadFile(event, 'submit-hsc')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="hsc">
                                <button type="submit" id="submit-hsc" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="hsc" onchange="loadFile(event, 'update-hsc')" class="hide-input" required>
                                <input type="hidden" name="name" value="hsc">
                                <button type="submit" id="update-hsc" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- SSC -->
                    <div class="col">
                        <span> SSC <span class="text-danger">*</span>
                            @if ($student->document->ssc)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->ssc)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="ssc">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editSsc');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editSsc" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="ssc" onchange="loadFile(event, 'submit-ssc')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="ssc">
                                <button type="submit" id="submit-ssc" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="ssc" onchange="loadFile(event, 'update-ssc')" class="hide-input" required>
                                <input type="hidden" name="name" value="ssc">
                                <button type="submit" id="update-ssc" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="row mt-4">

                    <!-- CV -->
                    <div class="col">
                        <span> CV <span class="text-danger">*</span>
                            @if ($student->document->cv)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->cv)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
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
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editCv" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="cv" onchange="loadFile(event, 'submit-cv')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="cv">
                                <button type="submit" id="submit-cv" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="cv" onchange="loadFile(event, 'update-cv')" class="hide-input" required>
                                <input type="hidden" name="name" value="cv">
                                <button type="submit" id="update-cv" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- Passport -->
                    <div class="col">
                        <span> Passport <span class="text-danger">*</span>
                            @if ($student->document->passport)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->passport)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
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
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editPassport" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="passport" onchange="loadFile(event, 'submit-passport')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="passport">
                                <button type="submit" id="submit-passport" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="passport" onchange="loadFile(event, 'update-passport')" class="hide-input" required>
                                <input type="hidden" name="name" value="passport">
                                <button type="submit" id="update-passport" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- SOP -->
                    <div class="col">
                        <span> SOP <span class="text-danger">*</span>
                            @if ($student->document->sop)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->sop)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
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
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editSop" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="sop" onchange="loadFile(event, 'submit-sop')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="sop">
                                <button type="submit" id="submit-sop" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="sop" onchange="loadFile(event, 'update-sop')" class="hide-input" required>
                                <input type="hidden" name="name" value="sop">
                                <button type="submit" id="update-sop" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- Job Experience -->
                    <div class="col">
                        <span> Job Experience (if any)
                            @if ($student->document->job_experience)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->job_experience)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
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
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editJobExperience" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="job_experience" onchange="loadFile(event, 'submit-job_experience')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="job_experience">
                                <button type="submit" id="submit-job_experience" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
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
                    <!-- Recommendation(1) -->
                    <div class="col">
                        <span> Recommendation(1) <span class="text-danger">*</span>
                            @if ($student->document->recommendation_1)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->recommendation_1)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="recommendation_1">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editRecommendation1');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editRecommendation1" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="recommendation_1" onchange="loadFile(event, 'submit-recommendation_1')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="recommendation_1">
                                <button type="submit" id="submit-recommendation_1" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="recommendation_1" onchange="loadFile(event, 'update-recommendation_1')" class="hide-input" required>
                                <input type="hidden" name="name" value="recommendation_1">
                                <button type="submit" id="update-recommendation_1" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <!-- Recommendation(2) -->
                    <div class="col">
                        <span> Recommendation(2) <span class="text-danger">*</span>
                            @if ($student->document->recommendation_2)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->recommendation_2)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="recommendation_2">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editRecommendation2');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editRecommendation2" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="recommendation_2" onchange="loadFile(event, 'submit-recommendation_2')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="recommendation_2">
                                <button type="submit" id="submit-recommendation_2" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="recommendation_2" onchange="loadFile(event, 'update-recommendation_2')" class="hide-input" required>
                                <input type="hidden" name="name" value="recommendation_2">
                                <button type="submit" id="update-recommendation_2" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>


                    <!-- Visa Refused -->
                    <div class="col">
                        <span> VisaRefused (if any)
                            @if ($student->document->visa_refused)
                            <span class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-24px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        @if ($student->document->visa_refused)
                        <div class="d-flex">
                            <form action="{{ route('documents.download', $student->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="visa_refused">
                                <span class="ml-4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </span>
                                <button type="submit" class="w-36px -m-36px opacity-0">D</button>
                            </form>
                            <svg onclick="documentsEdit(event, 'editVisaRefused');" type="button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-36px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data" id="editVisaRefused" class="d-none">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="visa_refused" onchange="loadFile(event, 'submit-visa_refused')" class="hide-input pt-4px" required>
                                <input type="hidden" name="name" value="visa_refused">
                                <button type="submit" id="submit-visa_refused" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @else
                        <div class="">
                            <form action="{{ route('documents.upload',$student->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" accept="*" name="file" data-id="visa_refused" onchange="loadFile(event, 'update-visa_refused')" class="hide-input" required>
                                <input type="hidden" name="name" value="visa_refused">
                                <button type="submit" id="update-visa_refused" class="btn btn-primary btn-sm d-none lkb-upload-btn">Upload</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Documents -->
        @if (!$student->documents_pending)
        <div class="mt-4">
            @if(!$student->applications->count())
            <div class="d-flex justify-content-center">
                <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" data-bs-toggle="modal" data-bs-target="#add_application" id="apply-now">
                    Apply Now
                </button>
            </div>
            @else
            <div class="row">
                <div class="col-4">
                    <div class="page-title-box w-100">
                        <div class="top-nav-search">

                        </div>
                    </div>
                </div>
                <div class="col text-end">
                    <ul class="list-inline-item pl-0">
                        <li class="list-inline-item">
                            <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-application" data-bs-toggle="modal" data-bs-target="#add_application_student">New Application</button>
                        </li>
                    </ul>
                </div>
            </div>
            @include('students.applications')
            @endif
        </div>
        @endif
    </div>
    <!-- /Page Content -->

    @component('students.create-application', ['student_id' => $student->id,'student_name' => $student->name])
    @endcomponent

    @component('students.edit')
    @endcomponent

    <!-- Tooltip -->
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

    <!-- Initialize Document -->
    <script>
        $('#documents-initialize').on('click', function() {
            documentsInitialize('{{$student->id}}');
        });

        function documentsInitialize(student_id) {
            console.log({
                student_id
            })
            var url = "{{ route('documents.initialize','student_id') }}";
            url = url.replace("student_id", student_id);
            console.log({
                url
            })
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