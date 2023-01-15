<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') {{ucfirst($status)}} Leads @endslot
    @push('list') <li class="breadcrumb-item active">{{ucfirst($status)}} Leads</li> @endpush
    @endcomponent
   
    @include('leads.status.list', ['status'=>$status])

</div>