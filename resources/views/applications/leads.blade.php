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
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
                                <th>Counsellor</th>
                            @endif
                            <th>Lead Created</th>
                            <th>Lead Status</th>
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

@component('leads.mail')
@endcomponent

@component('applications.leads_edit')
@endcomponent


<script>
    // On Load
    $(document).ready(function() {
        getTransactions();

        $('#myTable tbody').on('click', 'tr', function() {

            let leadId = $(':nth-child(2)', this).children("a").data('id');

            {{--window.location = "{{ route('leads.view', ['id' => ':leadId']) }}".replace(':leadId', leadId);--}}
            // console.log(leadId);
        });

    });

    $('#filter-search').keyup(function() {
        getTransactions();
    });

    $('#filter-status').on('change', function() {
        getTransactions();
    });
</script>

@if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
    <script>
        function getTransactions() {
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
                                case 'Lead Status':
                                    $(cell).html(`<select id="filter-status" class="form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Status</option>
                                                <option value="Unknown">Unknown</option>
                                                <option value="Potential">Potential</option>
                                                <option value="Not Potential">Not Potential</option>
                                            </select>`);
                                    break;
                                case 'Counsellor':
                                    $(cell).html(`<select id="filter-owner" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Counsellor</option>
                                            </select>`);
                                    break;
                                case 'Lead Created':
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
                    'url': '{{ route("leads.list") }}',
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
                        data: 'email'
                    },
                    {
                        data: 'mobile'
                    },
                    {
                        data: 'owner'
                    },
                    {
                        data: 'created_at'
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
            return table;
        }
    </script>
@else
    <script>
        function getTransactions() {
            $("#myTable").dataTable().fnDestroy();
            $('#myTable thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#myTable thead');

            var table = $('#myTable').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    'selectAll',
                    'selectNone'
                ],
                language: {
                    buttons: {
                        selectAll: "Select all items",
                        selectNone: "Select none"
                    }
                },
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
                                case 'Lead Status':
                                    $(cell).html(`<select id="filter-status" class="form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Status</option>
                                                <option value="Unknown">Unknown</option>
                                                <option value="Potential">Potential</option>
                                                <option value="Not Potential">Not Potential</option>
                                            </select>`);
                                    break;
                                case 'Counsellor':
                                    $(cell).html(`<select id="filter-owner" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Counsellor</option>
                                            </select>`);
                                    break;
                                case 'Lead Created':
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
                    'url': '{{ route("leads.list") }}',
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
                        data: 'email'
                    },
                    {
                        data: 'mobile'
                    },
                    {
                        data: 'created_at'
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
            return table;
        }
    </script>
@endif

<script>
    function leadDelete(id) {
        $.confirm({
            title: 'Confirm',
            content: 'Do you want to delete this Lead ?',
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
                        var url = "{{ route('leads.delete','id') }}";
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
        getOwners();
        getCounsellors();
    });

    function getOwners() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function(data) {
                if (data.users) {
                    var options = '<option value="" selected>Filter Counsellor</option>';
                    options += '<option value="Unassigned">Unassigned</option>';
                    data.users.forEach(function(user) {
                        options += '<option value="' + user.name + '">' + user.name + '</option>';
                    });
                    $('.leads-list-owners').html(options);
                }
                if (data.all_users) {
                    var options = '<option value="" selected>Filter Creator</option>';
                    data.all_users.forEach(function(user) {
                        options += '<option value="' + user.name + '">' + user.name + '</option>';
                    });
                    $('.leads-list-creators').html(options);
                }
            }
        });
    }

    function getCounsellors() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function(data) {
                if (data.users) {
                    var options = '<option value="" selected>Select Counsellor</option>';
                    data.users.forEach(function(user) {
                        options += '<option value="' + user.id + '">' + user.name + '</option>';
                    });
                    $('#select-counsellor').html(options);
                }
            }
        });
    }
</script>
