@push('style')
<style>
    .focus-none {
        box-shadow: inset 0 -1px 0 #ddd !important;
    }

    #myTable tbody tr td:nth-child(9) {
        text-align: left !important;
    }
</style>
@endpush

<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Tasks @endslot
    @push('list') <li class="breadcrumb-item active">Tasks</li> @endpush
    @endcomponent
    <div class="page-header pt-3 mb-0 ">
        @include('components.flash')  
        
        @include('tasks.calendar')

        @include('tasks.tasks')
    </div>


</div>
<!-- /Page Content -->