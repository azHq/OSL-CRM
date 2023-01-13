<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Notifications @endslot
    @push('list') <li class="breadcrumb-item active">Notifications</li> @endpush
    @endcomponent
   
    @include('notifications.notifications')

</div>
<!-- /Page Content -->