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

<div class="page-header pt-3 mb-0 ">

    <div class="row">
        <div class="col-4">
            <!-- <div class="page-title-box w-100">
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="" class="w-100">
                        <input id="filter-search" class="form-control" type="text" placeholder="Search leads here">
                        <button class="btn" type="button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div> -->
        </div>
        <div class="col-2">

        </div>
        <div class="col text-end">

        </div>
    </div>
</div>
<!-- Content Starts -->
<div class="row">
    <div class="col-md-12">
        <div class="card mb-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTableNotifications" class="table table-striped table-nowrap custom-table mb-0 datatable w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content End -->

<script>
    // On Load
    $(document).ready(function() {
        getNotifications();
    });
</script>

<script>
    function getNotifications() {
        $("#myTableNotifications").dataTable().fnDestroy();

        var table = $('#myTableNotifications').DataTable({
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
                'url': '{{ route("notifications.list") }}',
                data: function(data) {
                    data.filter_search = $('#filter-search').val();
                }
            },
            "fnDrawCallback": function(oSettings) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            columns: [{
                    data: 'DT_RowIndex',
                    width: '5%'
                },
                {
                    data: 'title'
                },
                {
                    data: 'description'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'action',
                    width: '5%'
                },
            ]

        });
    }
</script>

<script>
    function notificationDelete(id) {
        $.confirm({
            title: 'Confirm',
            content: 'Do you want to delete this Notification ?',
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
                        var url = "{{ route('notifications.delete','id') }}";
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