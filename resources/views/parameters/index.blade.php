<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
        @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
        @slot('title') Parameters @endslot
        @push('list') <li class="breadcrumb-item active">Parameters</li> @endpush
    @endcomponent

    @include('parameters.list')

</div>
<!-- /Page Content -->
