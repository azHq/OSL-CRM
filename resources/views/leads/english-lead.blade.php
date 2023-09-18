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

        <div class="col-2">
            <span>From Date</span>
            <input id="filter-from" type="date" class="form-control" name="filter-from" placeholder="{{date('Y-m-d')}}">
        </div>
        <div class="col-2">
            <span>To Date</span>
            <input id="filter-to" type="date" class="form-control" name="filter-to" placeholder="{{date('Y-m-d')}}">
        </div>

        <div class="col-1">

        </div>
        <div class="col text-end">
            @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
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
                    <button onclick="deleteMultipleLeads();" class="btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded">
                        <i class="feather-navigation" aria-hidden="true"></i> Delete Leads
                    </button>
                </li>
                <li class="list-inline-item">
                    <button onclick="convertMultipleLeads();" class="btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded">
                        <i class="feather-navigation" aria-hidden="true"></i> Convert Leads
                    </button>
                </li>
                @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
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
                                <th>Source</th>
                                <th>Desired Course</th>
                                <th>Passport</th>
                                <th>Destination</th>
                                @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
                                <th>Counsellor</th>
                                @endif
                                <!-- <th>Lead Created</th> -->
                                @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
                                <!-- <th>Created By</th> -->
                                @endif
                                <!-- <th>Lead Status</th> -->
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

@component('leads.remarks')
@endcomponent

@component('leads.assign')
@endcomponent

<script>
    // On Load
    $(document).ready(function() {
        localStorage.setItem('SelectedLeads', JSON.stringify([]));
        getTransactions();
        updateRowsBehavior();

    });

    function updateRowsBehavior() {
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
    }

    $('#filter-search').keyup(function() {
        getTransactions();
    });
    $('#filter-from').on('change', function() {
        getTransactions();
        updateRowsBehavior();
    });
    $('#filter-to').on('change', function() {
        getTransactions();
        updateRowsBehavior();
    });
</script>

@if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
<script>
    function getTransactions() {

        $("#myTable").dataTable().fnDestroy();
        if ($('#filter-source').val() == null || typeof $('#filter-source').val() == 'undefined') {
            $('#myTable thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#myTable thead');
        } else {
            $('#myTable thead tr')
                .clone(true)
                .addClass('filters')
        }

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
                if ($('#filter-source').val() == null || typeof $('#filter-source').val() == 'undefined') {
                    api.columns().eq(0)
                        .each(function(colIdx) {
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            $(cell).removeClass('sorting_asc');
                            var title = $(cell).text();
                            switch (title) {
                                // case 'Lead Status':
                                //     $(cell).html(`<select id="filter-status" class="form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                //                     <option value="" selected>Filter Status</option>
                                //                 </select>`);
                                //     break;
                                case 'Counsellor':
                                    $(cell).html(`<select id="filter-owner" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                    <option value="" selected>Filter Counsellor</option>
                                                </select>`);
                                    break;
                                    // case 'Created By':
                                    //     $(cell).html(`<select id="filter-creator" name="owner_id" class="leads-list-creators form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                    //                     <option value="" selected>Filter Creator</option>
                                    //                 </select>`);
                                    //     break;
                                    // case 'Lead Created':
                                    //     $(cell).html(`<input type="date" class="form-control" name="date_filter" placeholder="{{date('Y-m-d')}}">`);
                                    //     break;

                                case 'Source':
                                    $(cell).html(`<select id="filter-source" name="source" class="leads-list-purposes form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                    <option value="" selected>Filter Source</option>
                                                    <option value="Linkedin">Linkedin</option>
                                                    <option value="Meta">Meta</option>
                                                    <option value="Website">Website</option>
                                                    <option value="Twitter">Twitter</option>
                                                    <option value="Youtube">Youtube</option>
                                                    <option value="Google">Google</option>
                                                    <option value="Event">Event</option>
                                                    <option value="Offline">Offline</option>
                                                    <option value="Subagent">Subagent</option>
    
                                                    <option value="Pinterest">Pinterest</option>
                                                    <option value="Referral">Referral</option>
                                                    <option value="Internal">Internal</option>
    
                                                    <option value="Other Social Platform">Other Social Platform</option>
                                                    <option value="others">Others</option>
                                            
                                                </select>`);
                                    break;
                                case 'Source':
                                    $(cell).html(`<select id="filter-source" name="source" class="leads-list-purposes form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                    <option value="" selected>Filter Source</option>
                                                    <option value="">Unknown</option>
                                                    <option value="Linkedin">Linkedin</option>
                                                    <option value="Twitter">Twitter</option>
                                                    <option value="Youtube">Youtube</option>
                                                    <option value="Google">Google</option>
                                                    <option value="Event">Event</option>
                                                    <option value="Offline">Offline</option>
                                                    <option value="Subagent">Subagent</option>
                                                    
                                    <option value="Pinterest">Pinterest</option>
                                                                                <option value="Referral">Referral</option>
                                                                                <option value="Internal">Internal</option>
                                                                            
                                    <option value="Other Social Platform">Other Social Platform</option>
                                                                                </select>`);
                                    break;
                                case 'Desired Course':
                                    $(cell).html(`<select id="filter-desired-course" class="leads-list-courses form-select focus-none mt-2" name="desired_course" style="width:max-content;">
                                    <option value="" selected>Filter Course</option>
											<option value="none">N/A</option>
											<option value="IELTS (Academic)">IELTS (Academic)</option>
											<option value="IELTS (General)">IELTS (General)</option>
											<option value="PTE">PTE</option>
											<option value="OET">OET</option>
											<option value="Cambridge English">Cambridge English</option>
											<option value="TOEFL">TOEFL</option>
											<option value="Spoken">Spoken</option>
											<option value="English Foundation">English Foundation</option>
											<option value="Duolingo">Duolingo</option>
											<option value="OIETC">OIETC</option>
											<option value="SAT">SAT</option>
											<option value="GRE">GRE</option>
										</select>`);
                                    break;
                                case 'Passport':
                                    $(cell).html(`<select id="filter-passport" name="passport_id" class="leads-list-passport form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                    <option value="" selected>Filter Passport</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>`);
                                    break;
                                case 'Destination':
                                    $(cell).html(`<select id="filter-destination" name="destination_id" class="leads-list-destination form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                    <option value="" selected>Filter Destination</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="USA">USA</option>
                                                        <option value="UK">UK</option>
                                                        <option value="others">Others</option>
                                            
                                                </select>`);
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
                }


                getOwners();

            },
            ajax: {
                'url': '{{ route("leads.list") }}',
                "dataSrc": function(json) {
                    let modifiedData = json.data
                    for (let item of modifiedData) {
                        let parsedItem = JSON.parse(item.name)
                        // console.log(JSON.parse(parsedItem.name))
                        let name = `<a data-id="${parsedItem.id}" href="javascript:;" onclick="${parsedItem.route}">
                                <span class="person-circle-a person-circle">${parsedItem.name[0]}</span>
                            </a>
                            <a href="javascript:;" onclick="${parsedItem.route}">${parsedItem.name}</a>`
                        item.name = name
                    }

                    return modifiedData;
                },
                data: function(data) {
                    console.log({
                        data
                    })
                    data.filter_search = $('#filter-search').val();
                    data.filter_sort = $('#filter-sort').val();
                    data.startDate = $('#filter-from').val();
                    data.endDate = $('#filter-to').val();;
                    data.filterOnlyFor = 'English Teaching'
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
                    data: 'source'
                },
                {
                    data: 'desired_course'
                },
                {
                    data: 'passport'
                },
                {
                    data: 'destination'
                },
                {
                    data: 'owner'
                },
                // {
                //     data: 'created_at'
                // },
                // {
                //     data: 'created_by'
                // },
                // {
                //     data: 'status'
                // },
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
        if ($('#filter-source').val() == null || typeof $('#filter-source').val() == 'undefined') {
            $('#myTable thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#myTable thead');
        } else {
            $('#myTable thead tr')
                .clone(true)
                .addClass('filters')
        }

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
                if ($('#filter-source').val() == null || typeof $('#filter-source').val() == 'undefined') {
                    api.columns().eq(0)
                        .each(function(colIdx) {
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            $(cell).removeClass('sorting_asc');
                            var title = $(cell).text();
                            switch (title) {
                                // case 'Lead Status':
                                //     $(cell).html(`<select id="filter-status" class="form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                //             <option value="" selected>Filter Status</option>
                                //         </select>`);
                                //     break;
                                case 'Counsellor':
                                    $(cell).html(`<select id="filter-owner" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                            <option value="" selected>Filter Counsellor</option>
                                        </select>`);
                                    break;
                                    // case 'Lead Created':
                                    //     $(cell).html(`<input type="date" class="form-control" name="date_filter" placeholder="{{date('Y-m-d')}}">`);
                                    //     break;
                                case 'Desired Course':
                                    $(cell).html(`<select id="filter-desired-course" class="leads-list-courses form-select focus-none mt-2" name="desired_course" style="width:max-content;">
                                    <option value="" selected>Filter Course</option>
											<option value="none">N/A</option>
											<option value="IELTS (Academic)">IELTS (Academic)</option>
											<option value="IELTS (General)">IELTS (General)</option>
											<option value="PTE">PTE</option>
											<option value="OET">OET</option>
											<option value="Cambridge English">Cambridge English</option>
											<option value="TOEFL">TOEFL</option>
											<option value="Spoken">Spoken</option>
											<option value="English Foundation">English Foundation</option>
											<option value="Duolingo">Duolingo</option>
											<option value="OIETC">OIETC</option>
											<option value="SAT">SAT</option>
											<option value="GRE">GRE</option>
										</select>`);
                                    break;
                                case 'Source':
                                    $(cell).html(`<select id="filter-source" name="source" class="leads-list-purposes form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                            <option value="" selected>Filter Source</option>
                                            <option value="">Unknown</option>
                                            <option value="Linkedin">Linkedin</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="Youtube">Youtube</option>
                                            <option value="Google">Google</option>
                                            <option value="Event">Event</option>
                                            <option value="Offline">Offline</option>
                                            <option value="Subagent">Subagent</option>
                                            
                                <option value="Pinterest">Pinterest</option>
                                                                            <option value="Referral">Referral</option>
                                                                            <option value="Internal">Internal</option>
                                                                        
                                <option value="Other Social Platform">Other Social Platform</option>
                                                                            </select>`);
                                    break;
                                case 'Passport':
                                    $(cell).html(`<select id="filter-passport" name="passport_id" class="leads-list-passport form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                            <option value="" selected>Filter Passport</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>`);
                                    break;
                                case 'Destination':
                                    $(cell).html(`<select id="filter-destination" name="destination_id" class="leads-list-destination form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                             <option value="" selected>Filter Destination</option>

                                                <option value="Australia">Australia</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="USA">USA</option>
                                                <option value="UK">UK</option>
                                                <option value="others">Others</option>
                                    
                                        </select>`);
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
                }
            },
            ajax: {
                'url': '{{ route("leads.list") }}',
                "dataSrc": function(json) {
                    let modifiedData = json.data
                    for (let item of modifiedData) {
                        let parsedItem = JSON.parse(item.name)
                        // console.log(JSON.parse(parsedItem.name))
                        let name = `<a data-id="${parsedItem.id}" href="javascript:;" onclick="${parsedItem.route}">
                                <span class="person-circle-a person-circle">${parsedItem.name[0]}</span>
                            </a>
                            <a href="javascript:;" onclick="${parsedItem.route}">${parsedItem.name}</a>`
                        item.name = name
                    }

                    return modifiedData;
                },
                data: function(data) {
                    console.log({
                        data
                    })
                    data.filter_search = $('#filter-search').val();
                    data.filter_sort = $('#filter-sort').val();
                    // data.filter_status = $('#filter-status').val();
                    data.startDate = $('#startDate').val();
                    data.endDate = $('#endDate').val();
                    data.filterOnlyFor = 'English Teaching'
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
                // {
                //     data: 'created_at'
                // },
                {
                    data: 'source'
                },
                {
                    data: 'desired_course'
                },
                {
                    data: 'passport'
                },
                {
                    data: 'destination'
                },
                // {
                //     data: 'status'
                // },
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

    function deleteMultipleLeads() {
        let SelectedLeads = JSON.parse(localStorage.getItem('SelectedLeads'));
        if (SelectedLeads.length <= 0) {
            $.alert({
                title: 'Alert!',
                content: 'Please select at least 1 Lead to delete!',
            });
        } else {
            $.confirm({
                title: 'Confirm',
                content: 'Do you want to delet all selected Leads ?',
                buttons: {
                    info: {
                        text: 'Cancel',
                        btnClass: 'btn-red',
                        action: function() {
                            // canceled
                        }
                    },
                    danger: {
                        text: 'Delete',
                        btnClass: 'btn-blue',
                        action: function() {
                            var url = "{{ route('leads.multiple.delete') }}";
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
    // $(document).ready(function() {
    //     getCounsellors();
    // });

    function getOwners() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function(data) {
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