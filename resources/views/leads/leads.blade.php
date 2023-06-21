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
        <div class="col-3">

        </div>
        <div class="col-1">

        </div>
        <div class="col text-end">
            @if(Auth::user()->hasRole('super-admin'))
            <ul class="list-inline-item pl-0">

                <li class="list-inline-item">
                    <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-lead" data-bs-toggle="modal" data-bs-target="#add_lead">
                        <i class="fa fa-plus" aria-hidden="true"></i> New Lead
                    </button>
                </li>

                <li class="list-inline-item">
                    <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-lead-meta" data-bs-toggle="modal" data-bs-target="#add_lead_meta">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Lead From Meta
                    </button>
                </li>

                <li class="list-inline-item">
                    <button class="btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="import-leads" data-bs-toggle="modal" data-bs-target="#import_leads">
                        <i class="fa fa-upload" aria-hidden="true"></i> Import Leads
                    </button>
                </li>
                <li class="list-inline-item">
                    <a href="{{route('leads.export')}}" class="btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="export-leads">
                        <i class="fa fa-download" aria-hidden="true"></i> Download Leads
                    </a>
                </li>
            </ul>
            @endif
            <ul id="multiple-actions" class="list-inline-item pl-0 d-none">
                <li class="list-inline-item">
                    <button onclick="convertMultipleLeads();" class="btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded">
                        <i class="feather-navigation" aria-hidden="true"></i> Convert Leads
                    </button>
                </li>
                @if (Auth::user()->hasRole('super-admin'))
                <li class="list-inline-item">
                    <button id="assign-lead" data-bs-toggle="modal" data-bs-target="#assign_lead" class="btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded">
                        Assign Leads To <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </li>
                @endif
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
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                @if (Auth::user()->hasRole('super-admin'))
                                <th>Counsellor</th>
                                @endif
                                <th>Lead Created</th>
                                @if (Auth::user()->hasRole('super-admin'))
                                <th>Created By</th>
                                @endif
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


@component('leads.create')
@endcomponent

@component('leads.lead-from-meta')
@endcomponent

@component('leads.import')
@endcomponent

@component('leads.mail')
@endcomponent

@component('leads.edit')
@endcomponent



@component('leads.assign')
@endcomponent

<script>
    // On Load
    $(document).ready(function() {
        localStorage.setItem('SelectedLeads', JSON.stringify([]));
        getTransactions();

        $('#myTable tbody').on('click', 'tr', function() {
            let SelectedLeads = JSON.parse(localStorage.getItem('SelectedLeads'));

            let leadId = $(':nth-child(2)', this).children("a").data('id');

            $(this).toggleClass('selected-row');
            if ($(this).hasClass('selected-row')) {
                SelectedLeads.push(leadId);
            } else {
                SelectedLeads = SelectedLeads.filter(item => item !== leadId)
            }
            localStorage.setItem('SelectedLeads', JSON.stringify(SelectedLeads));
            if (SelectedLeads.length > 0) {
                $('#multiple-actions').removeClass('d-none');
            } else {
                $('#multiple-actions').addClass('d-none');
            }
        });

        $('#button').click(function() {
            alert(table.rows('.selected-row').data().length + ' row(s) selected');
        });
    });

    $('#filter-search').keyup(function() {
        getTransactions();
    });

    $('#filter-status').on('change', function() {
        getTransactions();
    });
</script>

@if (Auth::user()->hasRole('super-admin'))
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
                                            </select>`);
                                break;
                            case 'Counsellor':
                                $(cell).html(`<select id="filter-owner" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Counsellor</option>
                                            </select>`);
                                break;
                            case 'Created By':
                                $(cell).html(`<select id="filter-creator" name="owner_id" class="leads-list-creators form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Creator</option>
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
                    data: 'created_by'
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
    function showModal() {
        $("#mail_lead").modal('show');
    }

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

    function leadConvert(id) {
        $.confirm({
            title: 'Confirm',
            content: 'Do you want to convert this Lead into Student ?',
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
                        var url = "{{ route('leads.convert','id') }}";
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

    function convertMultipleLeads() {
        let SelectedLeads = JSON.parse(localStorage.getItem('SelectedLeads'));
        if (SelectedLeads.length <= 0) {
            $.alert({
                title: 'Alert!',
                content: 'Please select at least 1 Lead to convert!',
            });
        } else {
            $.confirm({
                title: 'Confirm',
                content: 'Do you want to convert all selected Leads into Students ?',
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
                            var url = "{{ route('leads.multiple.convert') }}";
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {
                                    _token: '{{csrf_token()}}',
                                    lead_ids: SelectedLeads
                                },
                                success: function(data) {
                                    window.location.reload();
                                }
                            });
                        }
                    },
                }
            });
        }
    }

    function assignMultipleLeads() {
        let counsellor_id = $('#assign-lead-owners').val();
        let counsellor_name = $("#select-counsellor option:selected").text();
        let SelectedLeads = JSON.parse(localStorage.getItem('SelectedLeads'));
        var url = "{{ route('leads.multiple.assign') }}";
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: '{{csrf_token()}}',
                counsellor_id: counsellor_id,
                lead_ids: SelectedLeads
            },
            success: function(data) {
                window.location.reload();
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
                console.log({
                    data
                })
                if (data.users) {
                    let options = '<option value="" selected>Filter Counsellor</option>';
                    options += '<option value="Unassigned">Unassigned</option>';

                    for (let user of data.users) {
                        options += '<option value="' + user.name + '">' + user.name + ' (Counsellor)</option>';
                    }

                    for (let cro of data.cros) {
                        options += '<option value="' + cro.name + '">' + cro.name + ' (CRO)</option>';
                    }

                    $('#filter-owner').html(options);
                    console.log({
                        options
                    })
                }

                if (data.all_users) {
                    var options = '<option value="" selected>Filter Creator</option>';
                    for (let user of data.all_users) {
                        options += '<option value="' + user.name + '">' + user.name + '</option>';
                    }
                    $('#filter-creator').html(options);
                }
                if (data.subcategories) {
                    var options = '<option value="" selected>Filter Status</option>';
                    for (let subcategory of data.subcategories) {
                        options += '<option value="' + subcategory.name + '">' + subcategory.name + '</option>';
                    }
                    $('#filter-status').html(options);
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