 @if(!Route::is(['add-invoice','edit-invoice','bank-settings','invoices-settings','invoice-grid','invoices','invoices-paid','invoices-overdue','invoices-cancelled','invoices-draft','invoices-recurring','social-links','companies','contacts','data-tables','deals-kanban-view','form-basic-inputs','form-input-groups','form-horizontal','form-validation','form-vertical','pagee','leads-dashboard','privacy-policy','projects-dashboard','tables-basic','terms','blank-page','components','faq','form-mask','invoice-grid','invoices','invoices-paid','invoices-overdue','invoices-cancelled','invoices-draft','invoices-recurring','invoices-settings','leads-kanban-view','projects-kanban-view','social-links','tax-settings']))
    <!-- Page Header -->

    <div class="crms-title row bg-white">
        <div class="col  p-0">
            <h3 class="page-title m-0">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              {{ $li_3 }}
            </span> {{ $title }} </h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{ $li_1 }}</a></li>
                <li class="breadcrumb-item active">{{ $li_2 }}</li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    @endif
    @if(Route::is(['invoice-grid','invoices','invoices-paid','invoices-overdue','invoices-cancelled','invoices-draft','invoices-recurring','social-links']))
    <!-- Page Header -->

    <div class="crms-title row bg-white">
        <div class="col  p-0">
            <h3 class="page-title m-0">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              {{ $li_3 }}
            </span> {{ $title }} </h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{ $li_1 }}</a></li>
                <li class="breadcrumb-item active">{{ $li_2 }}</li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    @endif
    @if(Route::is(['data-tables','deals-kanban-view','form-basic-inputs','form-input-groups','form-horizontal','Form Mask','form-validation','form-vertical','pagee','leads-dashboard','privacy-policy','projects-dashboard','tables-basic','terms','bank-settings','blank-page','components','faq','form-mask','invoices-settings','leads-kanban-view','projects-kanban-view','tax-settings']))
    <!-- Page Header -->

    <div class="crms-title row bg-white mb-4">
        <div class="col  p-0">
            <h3 class="page-title m-0">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              {{ $li_3 }}
            </span> {{ $title }} </h3>
        </div>
        <div class="col p-0 text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{ $li_1 }}</a></li>
                <li class="breadcrumb-item active">{{ $li_2 }}</li>
            </ul>
        </div>
    </div>
    <!-- /Page Header -->
    @endif

    @if(Route::is(['companies','contacts']))
    <div class="crms-title row bg-white">
        <div class="col">
            <h3 class="page-title m-0">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
             {{ $li_3 }}
            </span> {{ $title }} </h3>
        </div>
        <div class="col text-end">
            <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{ $li_1 }}</a></li>
                <li class="breadcrumb-item active">{{ $li_2 }}</li>
            </ul>
        </div>
    </div>
    @endif
@if(Route::is(['add-invoice','edit-invoice']))
<!-- Page Header -->
<div class="page-header invoices-page-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb invoices-breadcrumb">
                <li class="breadcrumb-item invoices-breadcrumb-item">
                    <a href="{{url('invoices')}}">
                        <i class="fa fa-chevron-left"></i> Back to Invoice List
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-auto">
            <div class="invoices-create-btn">
                <a class="invoices-preview-link" href="#" data-bs-toggle="modal" data-bs-target="#invoices_preview"><i class="fa fa-eye"></i> Preview</a>
                <a  href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices_details" class="btn delete-invoice-btn">
                    Delete Invoice
                </a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#save_invocies_details" class="btn save-invoice-btn">
                    Save Draft
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->
@endif
