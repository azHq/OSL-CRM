@push('style')
<style>
    #myTable tbody tr td:nth-child(1) {
        width: 4% !important;
    }
</style>
@endpush

<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Appointed Counsellor @endslot
    @push('list') <li class="breadcrumb-item active">Appointed Counsellor</li> @endpush
    @endcomponent
    <div class="page-header pt-3 mb-0 ">
        @include('components.flash')
        <!-- <div class="row">
            <div class="col">

            </div>
            <div class="col text-end">
                <ul class="list-inline-item pl-0">
                    <li class="list-inline-item">
                        <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_user">
                            New Counsellor
                        </button>
                    </li>
                </ul>
            </div>
        </div> -->
    </div>
    <!-- Content Starts -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table mb-0 w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Counsellor Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content End -->

</div>
<!-- /Page Content -->





<script>
    // On Load
    $(document).ready(function() {
        getAppointments();
    });
</script>

<script>
    function getAppointments() {
        $("#myTable").dataTable().fnDestroy();
        // $('#myTable thead tr').clone(true).addClass('filters').appendTo('#myTable thead');
        var table = $('#myTable').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            fixedHeader: true,
            'columnDefs': [{
                'targets': [0, -1],
                'orderable': false,
            }],
            ajax: {
                'url': '{{ route("appointments.list") }}',
                data: function(data) {
                    data.filter_search = $('#filter-search').val();
                    data.filter_status = $('#filter-status').val();
                }
            },
            "fnDrawCallback": function(oSettings) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            order: [
                [0, 'DESC']
            ],
            columns: [{
                    data: 'DT_RowIndex'
                },
                {
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'mobile'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'action'
                },
            ]
        });
    }

    function userDelete(id) {
        $.confirm({
            title: 'Confirm',
            buttons: {
                info: {
                    text: 'Cancel',
                    btnClass: 'btn-blue',
                    action: function() {
                        // canceled
                    }
                },
                danger: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function() {
                        var url = "{{ route('users.delete','id') }}";
                        url = url.replace('id', id);
                        $.ajax({
                            type: 'GET',
                            url: url,
                            success: function(data) {
                                window.location.reload();
                            }
                        });
                    }
                },
            }
        });
    }
</script>