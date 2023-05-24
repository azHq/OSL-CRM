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

</div>
<!-- Content Starts -->
<div class="row">
    <div class="col-md-12">
        <div class="card mb-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-nowrap custom-table mb-0 datatable w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Task</th>
                                <th>Start Date</th>
                                <th>End Date</th>
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

@component('users.taskedit')
@endcomponent

<script>
    // On Load
    $(document).ready(function() {
        getTasks();
    });

    $('#filter-search').keyup(function() {
        getTasks();
    });

    $('#filter-status').on('change', function() {
        getTasks();
    });
</script>

<script>
    function getTasks() {
        $("#myTable").dataTable().fnDestroy();
        var user_id = "{{$user_id}}";
        var url = '{{ route("users.tasks", "id") }}';
        url = url.replace('id', user_id);
        var table = $('#myTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                'url': url,
                data: function(data) {
                    data.filter_search = $('#filter-search').val();
                    data.filter_sort = $('#filter-sort').val();
                    data.filter_status = $('#filter-status').val();
                    data.startDate = $('#startDate').val();
                    data.endDate = $('#endDate').val();
                }
            },
            "fnDrawCallback": function(oSettings) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            columns: [{
                    data: 'DT_RowIndex'
                },
                {
                    data: 'name'
                },
                {
                    data: 'start'
                },
                {
                    data: 'end'
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
    function taskDelete(id) {
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
                        var url = "{{ route('tasks.delete','id') }}";
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

    function taskComplete(id) {
        $.confirm({
            title: 'Confirm',
            buttons: {
                info: {
                    text: 'Cancel',
                    btnClass: 'btn-red',
                    action: function() {
                        // canceled
                    }
                },
                danger: {
                    text: 'Convert',
                    btnClass: 'btn-blue',
                    action: function() {
                        var url = "{{ route('tasks.complete','id') }}";
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

<script>
    $(document).ready(function() {
        getAssignees();
    });

    function getAssignees() {
        $.ajax({
            type: 'GET',
            url: "{{ route('tasks.create') }}",
            success: function(data) {
                var options = '<option value="" selected>Filter Assignee</option>';
                options += '<option value="Unassigned">Unassigned</option>';
                data.users.forEach(function(user) {
                    options += '<option value="' + user.name + '">' + user.name + '</option>';
                });
                $('select[name="assignee_id"]').html(options);
            }
        });
    }
</script>