<div class="page-header pt-3 mb-0 ">

    <div class="row">
        <div class="col-5">

        </div>
        <div class="col-1">

        </div>
        <div class="col text-end">
            @if(Auth::user()->hasRole('super-admin'))
                <ul class="list-inline-item pl-0">
                    <li class="list-inline-item">
                        <button
                            class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded"
                            id="add-report" data-bs-toggle="modal" data-bs-target="#add_report">
                            <i class="fa fa-plus" aria-hidden="true"></i> New Report
                        </button>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card h-100">
            <div class="p-2">
                <h3 class="card-title">Counselor Performance</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-nowrap custom-table mb-0 datatable w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Time</th>
                            <th>Lead</th>
                            <th>Counselor</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@component('reports.create')
@endcomponent

<script>
    // On Load
    $(document).ready(function () {
        getReports();
    });
</script>


<script>
    function getReports() {
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
            initComplete: function () {
                var api = this.api();
                api.columns().eq(0)
                    .each(function (colIdx) {
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        $(cell).removeClass('sorting_asc');
                        var title = $(cell).text();
                        switch (title) {
                            case 'Type':
                                $(cell).html(`<select id="type" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="">All Type</option>
                                                <option value="Email">Email</option>
                                                <option value="Call">Call</option>
                                                <option value="Others">Others</option>
                                           </select>`);
                                break;
                            case 'Counselor':
                                $(cell).html(`<select id="type" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="">All Counselor</option>
                                                @foreach(App\Models\User::admins()->get() as $user)
                                                    <option value="{{$user->name}}">{{$user->name}}</option>
                                                @endforeach
                                           </select>`);
                                break;
                            case 'Lead':
                                $(cell).html(`<select id="filter-activity-user" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                 <option value="">Filter Lead</option>
                                           </select>`);
                                break;
                            case 'Time':
                                $(cell).html(`<input type="date" class="form-control" name="date_filter" placeholder="">`);
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
                            .on('change', function (e) {
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
                            .on('keyup', function (e) {
                                e.stopPropagation();
                                $(this).trigger('change');
                            });

                        $('select', $('.filters th').eq($(api.column(colIdx).header()).index()))
                            .off('keyup change')
                            .on('change', function (e) {
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
                            .on('keyup', function (e) {
                                e.stopPropagation();
                                $(this).trigger('change');
                            });
                    });
            },
            ajax: {
                'url': '{{ route("reports.list") }}',
                data: function (data) {
                    console.log(data)
                }
            },
            "fnDrawCallback": function (oSettings) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            columns: [{
                data: 'DT_RowIndex',
                width: '1%'
            },
                {
                    data: 'title'
                },
                {
                    data: 'type'
                },
                {
                    data: 'description'
                },
                {
                    data: 'time',
                    width: '1%'
                },
                {
                    data: 'lead'
                },
                {
                    data: 'counselor'
                }
            ]

        });
        return table;
    }
</script>


<script>
    $(document).ready(function () {
        getActivitiesUsers();
    });

    function getActivitiesUsers() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function (data) {
                if (data.all_users) {
                    var options = '<option value="" selected>Filter Lead</option>';
                    data.all_users.forEach(function (user) {
                        options += '<option value="' + user.name + '">' + user.name + '</option>';
                    });
                    $('#filter-activity-user').html(options);
                }
            }
        });
    }
</script>
