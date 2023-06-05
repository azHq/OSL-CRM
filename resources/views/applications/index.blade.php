<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Applications @endslot
    @push('list') <li class="breadcrumb-item active">Applications</li> @endpush
    @endcomponent

    @include('applications.leads')
{{--    @include('applications.edit')--}}

</div>
<!-- /Page Content -->
