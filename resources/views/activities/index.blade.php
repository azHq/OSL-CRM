<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Activities @endslot
    @push('list') <li class="breadcrumb-item active">Activities</li> @endpush
    @endcomponent
   
    @include('activities.list')

</div>
<!-- /Page Content -->