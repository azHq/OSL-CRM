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
                                <th>Action</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Lead Created</th>
                                <!-- <th>Lead Status</th> -->
                                <th>Purpose</th>
                                <th>Desired Course</th>
                                <th>Source</th>
                                <th>Passport</th>
                                <th>Destination</th>
                                @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
                                <th>Counsellor</th>
                                @endif
                                @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
                                <th>Created By</th>
                                @endif
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

@component('leads.import')
@endcomponent

@component('leads.mail')
@endcomponent

@component('leads.edit')
@endcomponent

@component('leads.assign')
@endcomponent

@component('leads.remarks')
@endcomponent
<script>
    // On Load
    $(document).ready(function() {
        localStorage.setItem('SelectedLeads', JSON.stringify([]));
        getStatusLeadsList();

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
</script>

@if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
<script>
    function getStatusLeadsList() {
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
                                //                 <option value="" selected>Filter Status</option>
                                //                 <option value="Unknown">Unknown</option>
                                //                 <option value="Potential">Potential</option>
                                //                 <option value="Not Potential">Not Potential</option>
                                //             </select>`);
                                //     break;
                                case 'Counsellor':
                                    $(cell).html(`<select id="filter-owner" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Counsellor</option>
                                            </select>`);
                                    break;
                                case 'Purpose':
                                    $(cell).html(`<select id="filter-purpose" name="purpose_id" class="leads-list-purposes form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                    <option value="" selected>Filter Purpose</option>
                                                    <option value="">Unknown</option>
                                                    <option value="English Teaching">English Teaching</option>
                                                    <option value="Study Abroad">Study Abroad</option>
                                                    <!-- <option value="Not Potential">Not Potential</option> -->
                                            
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
                }
                getOwners();

            },
            ajax: {
                'url': '{{ route("leads.status.list",$status) }}',
                "dataSrc": function(json) {
                    let modifiedData = json.data
                    for (let item of modifiedData) {
                        let parsedItem = JSON.parse(item.name)
                        let name = `<a data-id="${parsedItem.id}" href="${parsedItem.route}">
                                <span class="person-circle-a person-circle">${parsedItem.name[0]}</span>
                            </a>
                            <a href="${parsedItem.route}">${parsedItem.name}</a>`
                        item.name = name
                    }

                    return modifiedData;
                },
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
                    data: 'action',
                    width: '5%'
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
                // {
                //     data: 'status'
                // },
                {
                    data: 'purpose'
                },
                {
                    data: 'desired_course'
                },
                {
                    data: 'source'
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
                {
                    data: 'created_by'
                },
            ]

        });
        return table;
    }
</script>
@else
<script>
    function getStatusLeadsList() {
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
                                //                 <option value="" selected>Filter Status</option>
                                //                 <option value="Unknown">Unknown</option>
                                //                 <option value="Potential">Potential</option>
                                //                 <option value="Not Potential">Not Potential</option>
                                //             </select>`);
                                //     break;
                                case 'Counsellor':
                                    $(cell).html(`<select id="filter-owner" name="owner_id" class="leads-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Counsellor</option>
                                            </select>`);
                                    break;
                                case 'Purpose':
                                    $(cell).html(`<select id="filter-purpose" name="purpose_id" class="leads-list-purposes form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                    <option value="" selected>Filter Purpose</option>
                                                    <option value="">Unknown</option>
                                                    <option value="English Teaching">English Teaching</option>
                                                    <option value="Study Abroad">Study Abroad</option>
                                                    <!-- <option value="Not Potential">Not Potential</option> -->
                                            
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
                }
            },
            ajax: {
                'url': '{{ route("leads.status.list",$status) }}',
                "dataSrc": function(json) {
                    let modifiedData = json.data
                    for (let item of modifiedData) {
                        let parsedItem = JSON.parse(item.name)
                        let name = `<a data-id="${parsedItem.id}" href="javascript:;" onclick="${parsedItem.route}">
                                <span class="person-circle-a person-circle">${parsedItem.name[0]}</span>
                            </a>
                            <a href="javascript:;" onclick="${parsedItem.route}">${parsedItem.name}</a>`
                        item.name = name
                    }

                    return modifiedData;
                },
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
                    data: 'action',
                    width: '5%'
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
                // {
                //     data: 'status'
                // },
                {
                    data: 'purpose'
                },
                {
                    data: 'desired_course'
                },
                {
                    data: 'source'
                },
                {
                    data: 'passport'
                },
                {
                    data: 'destination'
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
        // getOwners();
        // getCounsellors();
    });

    function getOwners() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function(data) {
                var options = '<option value="" selected>Filter Counsellor</option>';
                options += '<option value="Unassigned">Unassigned</option>';
                if (data.users) {
                    for (let user of data.users) {
                        options += '<option value="' + user.name + '">' + user.name + ' (Counsellor)</option>';
                    }
                }
                if (data.cros) {
                    for (let cro of data.cros) {
                        options += '<option value="' + cro.name + '">' + cro.name + ' (CRO)</option>';
                    }
                }
                $('.leads-list-owners').html(options);

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

    // function getCounsellors() {
    //     $.ajax({
    //         type: 'GET',
    //         url: "{{ route('leads.create') }}",
    //         success: function(data) {
    //             if (data.users) {
    //                 var options = '<option value="" selected>Select Counsellor</option>';
    //                 data.users.forEach(function(user) {
    //                     options += '<option value="' + user.id + '">' + user.name + '</option>';
    //                 });
    //                 $('#select-counsellor').html(options);
    //             }
    //         }
    //     });
    // }
</script>