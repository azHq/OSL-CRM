<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Universities @endslot
    @push('list') <li class="breadcrumb-item active">Universities</li> @endpush
    @endcomponent
   
    @include('universities.universities')

</div>
<!-- /Page Content -->