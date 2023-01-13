<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Leads @endslot
    @push('list') <li class="breadcrumb-item active">Leads</li> @endpush
    @endcomponent
   
    @include('leads.leads')

</div>
<!-- /Page Content -->