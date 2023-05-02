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

@include('components.flash')

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
                            id="add-parameters" data-bs-toggle="modal" data-bs-target="#add_parameters">
                            <i class="fa fa-plus" aria-hidden="true"></i> New Parameter
                        </button>
                    </li>
                </ul>
            @endif
        </div>
    </div>
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
                            <th>Key</th>
                            <th>Value</th>
                            <th>Type</th>
                            <th>Component</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content End -->

@component('parameters.create')
@endcomponent

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
                'url': '{{ route("parameters.list") }}',
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
                    data: 'key'
                },
                {
                    data: 'type'
                },
                {
                    data: 'value'
                },
                {
                    data: 'component',
                },
            ]

        });
        return table;
    }
</script>
