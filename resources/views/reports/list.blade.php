<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card h-100">
            <div class="card-title">
                <h3 class="card-title">Counselor Performance</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-nowrap custom-table mb-0 datatable w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Type</th>
                            <th>Time</th>
                            <th>Lead</th>
                            <th>Counselor</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // On Load
    $(document).ready(function() {
        getActivities();
    });
</script>


<script>
    function getActivities() {
        $("#myTable").dataTable().fnDestroy();
        $('#myTable thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#myTable thead');

        var table = $('#myTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            fixedHeader: true,
            'columnDefs': [{
                'targets': [0],
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
                            case 'User':
                                $(cell).html(`<select id="filter-activity-user" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter User</option>
                                            </select>`);
                                break;
                            case 'Date':
                                $(cell).html(`<input type="date" class="form-control" name="date_filter" placeholder="{{date('Y-m-d')}}">`);
                                break;
                            case '#':
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
                'url': '{{ route("activities.list") }}',
                data: function(data) {}
            },
            "fnDrawCallback": function(oSettings) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            columns: [{
                data: 'DT_RowIndex',
                width: '1%'
            },
                {
                    data: 'user'
                },
                {
                    data: 'name'
                },
                {
                    data: 'details'
                },
                {
                    data: 'created_at',
                    width: '1%'
                },
            ]

        });
        return table;
    }
</script>


<script>
    $(document).ready(function() {
        getActivitiesUsers();
    });

    function getActivitiesUsers() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function(data) {
                if (data.all_users) {
                    var options = '<option value="" selected>Filter User</option>';
                    data.all_users.forEach(function(user) {
                        options += '<option value="' + user.name + '">' + user.name + '</option>';
                    });
                    $('#filter-activity-user').html(options);
                }
            }
        });
    }
</script>
