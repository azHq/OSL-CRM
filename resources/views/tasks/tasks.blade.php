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
                                <th>Details</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                @if (Auth::user()->hasRole('super-admin'))
                                <th>Counsellor</th>
                                @endif
                                <th>Status</th>
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

@component('tasks.edit')
@endcomponent

<script>
    // On Load
    $(document).ready(function() {
        getTasks();
        getTaskAssigneeFilter();
    });

    $('#filter-search').keyup(function() {
        getTasks();
    });

    $('#filter-status').on('change', function() {
        getTasks();
    });
</script>

@if (Auth::user()->hasRole('super-admin'))
<script>
    function getTasks() {
        $("#myTable").dataTable().fnDestroy();
        $('#myTable thead tr').clone(true).addClass('filters').appendTo('#myTable thead');
        var table = $('#myTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            fixedHeader: true,
            'columnDefs': [{
                'targets': [0, -1],
                'orderable': false,
            }],
            initComplete: function() {
                var api = this.api();
                api.columns().eq(0)
                    .each(function(colIdx) {
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        $(cell).removeClass('sorting_asc');
                        var title = $(cell).text();
                        switch (title) {
                            case 'Status':
                                $(cell).html(`<select id="filter-status" class="form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Status</option>
                                                <option value="Unknown">Unknown</option>
                                                <option value="Potential">Potential</option>
                                                <option value="Not Potential">Not Potential</option>
                                            </select>`);
                                break;
                            case 'Counsellor':
                                $(cell).html(`<select id="filter-task-assignee" name="owner_id" class="task-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Counsellor</option>
                                            </select>`);
                                break;
                            case 'Start Date':
                                $(cell).html(`<input type="date" class="form-control" name="date_filter" placeholder="{{date('Y-m-d')}}">`);
                                break;
                            case 'End Date':
                                $(cell).html(`<input type="date" class="form-control" name="date_filter" placeholder="{{date('Y-m-d')}}">`);
                                break;
                            case '#':
                                $(cell).html(title);
                                break;
                            case 'Action':
                                $(cell).html(title);
                                break;

                            default:
                                $(cell).html('<input class="form-control" type="text" placeholder="' + title + '" />');
                                break;
                        }
                        $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                            .off('keyup change')
                            .on('change', function(e) {
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})';
                                var cursorPosition = this.selectionStart;
                                api.column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value + ')))') : '',
                                        this.value != '',
                                        this.value == ''
                                    ).draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();
                                $(this).trigger('change');
                            });

                        $('select', $('.filters th').eq($(api.column(colIdx).header()).index()))
                            .off('keyup change')
                            .on('change', function(e) {
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})';
                                var cursorPosition = this.selectionStart;
                                api.column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value + ')))') : '',
                                        this.value != '',
                                        this.value == ''
                                    ).draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();
                                $(this).trigger('change');
                            });
                    });
            },
            ajax: {
                'url': '{{ route("tasks.list") }}',
                data: function(data) {}
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
                    data: 'details'
                },
                {
                    data: 'start'
                },
                {
                    data: 'end'
                },
                {
                    data: 'assignee'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action',
                    width: '5%'
                },
            ]

        });
    }
</script>
@else
<script>
    function getTasks() {
        $("#myTable").dataTable().fnDestroy();

        var table = $('#myTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            'columnDefs': [{
                'targets': [0, -1],
                'orderable': false,
            }],
            ajax: {
                'url': '{{ route("tasks.list") }}',
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
                    data: 'details'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action',
                    width: '5%'
                },
            ]

        });
    }
</script>
@endif

<script>
    function getTaskAssigneeFilter() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function(data) {
                if (data.all_users) {
                    var options = '<option value="" selected>Filter Creator</option>';
                    data.all_users.forEach(function(user) {
                        options += '<option value="' + user.name + '">' + user.name + '</option>';
                    });
                    $('#filter-task-assignee').html(options);
                }
            }
        });
    }

    function taskDelete(id) {
        $.confirm({
            title: 'Confirm',
            content: 'Do you want to delete this Task ?',
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