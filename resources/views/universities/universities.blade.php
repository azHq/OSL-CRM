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

<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
    <li class="nav-item"><a class="nav-link active" href="#bottom-justified-tab1" data-bs-toggle="tab">Universities</a></li>
    <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab2" data-bs-toggle="tab">Countries</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane show active" id="bottom-justified-tab1">
        <div class="page-header pt-3 mb-0 ">

            <div class="row">
                <div class="col-5">
                    <ul class="list-inline-item pl-0">

                    </ul>
                </div>
                <div class="col-1">

                </div>
                <div class="col text-end">
                    <ul class="list-inline-item pl-0">
                        <li class="list-inline-item">
                            <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-university" data-bs-toggle="modal" data-bs-target="#add_university">
                                <i class="fa fa-plus" aria-hidden="true"></i> New University
                            </button>
                        </li>
                    </ul>
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
                                        <th>Name</th>
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
    </div>
    <div class="tab-pane" id="bottom-justified-tab2">
        <div class="page-header pt-3 mb-0 ">

            <div class="row">
                <div class="col-5">
                    <ul class="list-inline-item pl-0">

                    </ul>
                </div>
                <div class="col-1">

                </div>
                <div class="col text-end">
                    <ul class="list-inline-item pl-0">
                        <li class="list-inline-item">
                            <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-country" data-bs-toggle="modal" data-bs-target="#add_country">
                                <i class="fa fa-plus" aria-hidden="true"></i> New Country
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Content Starts -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable-2" class="table table-striped table-nowrap custom-table mb-0 datatable w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
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
    </div>

</div>






@component('universities.create')
@endcomponent


@component('universities.edit')
@endcomponent

<script>
    $(document).ready(function() {
        getUniversities();
        getCountries()
    });

    $('#filter-search').keyup(function() {
        getUniversities();
        getCountries()

    });
</script>

<script>
    function getUniversities() {
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
                            case 'Created At':
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
                'url': '{{ route("universities.list") }}',
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
                    width: '2%'
                },
                {
                    data: 'name'
                },
                {
                    data: 'created_at',
                    width: '1%'
                },
                {
                    data: 'action',
                    width: '1%'
                },
            ]

        });
        return table;
    }

    function getCountries() {
        $("#myTable-2").dataTable().fnDestroy();
        $('#myTable-2 thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#myTable-2 thead');

        var table = $('#myTable-2').DataTable({
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
                            case 'Created At':
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
                'url': '{{ route("countries.list") }}',
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
                    width: '2%'
                },
                {
                    data: 'name'
                },
                {
                    data: 'created_at',
                    width: '1%'
                },
                {
                    data: 'action',
                    width: '1%'
                },
            ]

        });
        return table;
    }
</script>

<script>
    function universityDelete(id) {
        $.confirm({
            title: 'Confirm',
            content: 'Do you want to delete this University ?',
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
                        var url = "{{ route('universities.delete','id') }}";
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

    function countryDelete(id) {
        $.confirm({
            title: 'Confirm',
            content: 'Do you want to delete this Country ?',
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
                        var url = "{{ route('countries.delete','id') }}";
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