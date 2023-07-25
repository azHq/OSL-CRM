    <!-- Page Content -->
    <div class="content container-fluid">
        @component('components.custombreadcrumb')
        @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
        @slot('title') Super Admin @endslot
        @push('list') <li class="breadcrumb-item"><a href="{{route('super-admin.index')}}">Super Admins</a></li> @endpush
        @push('list') <li class="breadcrumb-item active">Super Admin</li> @endpush
        @endcomponent
        @include('components.flash')
        <div class="card shadow p-md-4 p-2 mt-2 mt-md-4 lkb-profile-board">
            <div class="row">
                <div class="col account d-flex">
                    <div class="company_img">
                        <img src="{{ asset('assets/img/profiles/profile.png') }}" alt="User" class="user-image" />
                    </div>
                    <div class="my-auto">
                        <p class="mb-0">Super Admin</p>
                        <span class="modal-title"> <strong>{{$user->name}}</strong> </span>&nbsp;
                        <span class="rating-star"><i class="fa fa-star" aria-hidden="true"></i></span>&nbsp;
                        <span class="lock"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="col">
                    <span>Super Admin Phone</span>
                    <p class="font-weight-bold">{{$user->mobile}}</p>
                </div>
                <div class="col">
                    <span>Super Admin Email</span>
                    <p class="font-weight-bold">{{$user->email}}</p>
                </div>
                <div class="col">
                    <span>Super Admin Status</span>
                    <p class="font-weight-bold">{{$user->status}}</p>
                </div>
            </div>
        </div>
        <!-- @include('users.tasks', ['user_id'=>$user->id]) -->
    </div>
    <!-- /Page Content -->