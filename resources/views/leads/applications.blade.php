@push('style')
<style>
    .focus-none {
        box-shadow: inset 0 -1px 0 #ddd !important;
    }

    #myApplicationTable tbody tr td:nth-child(9) {
        text-align: left !important;
    }
</style>
@endpush

<div class="row">
    @if(Auth::user()->hasRole('super-admin'))
    <ul class="list-inline-item pl-0">

        <!-- <li class="list-inline-item">
            <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-lead" data-bs-toggle="modal" data-bs-target="#add_lead">
                <i class="fa fa-plus" aria-hidden="true"></i> New Application
            </button>
        </li> -->

    </ul>
    @endif
</div>
<!-- Content Starts -->
<div class="row mt-2">
    <div class="col-md-12">
        <div class="card mb-0">
            <div class="card-body">
                <div class="table-responsive">
                    <input hidden id="lead_id" value="{{$lead->id}}">
                    <table id="myApplicationTable" class="table table-striped table-nowrap custom-table mb-0 datatable w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Lead</th>
                                <th>Course</th>
                                <th>Intake Month</th>
                                <th>Intake Year</th>
                                <th>University</th>
                                @if(Auth::user()->hasRole('super-admin'))
                                <th>Counsellor</th>
                                @endif
                                <th>Status</th>
                                <th>Applied On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content End -->

@component('applications.edit')
@endcomponent

<script>
    // On Load
    $(document).ready(function() {
        getApplications();
    });
</script>
@if(Auth::user()->hasRole('super-admin'))
<script>
    function getApplications() {
        let url = "{{ route('applications.listByLeadId' ,'lead_id') }}"
        let lead_id = $('#lead_id').val()
        url = url.replace('lead_id', lead_id)
        $("#myApplicationTable").dataTable().fnDestroy();
        $('#myApplicationTable thead tr').clone(true).addClass('filters').appendTo('#myApplicationTable thead');
        var table = $('#myApplicationTable').dataTable({
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
                                                <option value="Applied">Applied</option>
                                                <option value="Offer Received">Offer Received</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Visa">Visa</option>
                                                <option value="Enrolled">Enrolled</option>
                                            </select>`);
                                break;
                            case 'University':
                                $(cell).html(`<select id="filter-university" name="university_id" class="applications-list-universities form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter University</option>
                                            </select>`);
                                break;
                            case 'Counsellor':
                                $(cell).html(`<select id="filter-owner" name="owner_id" class="applications-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Counsellor</option>
                                            </select>`);
                                break;
                            case 'Applied On':
                                $(cell).html(`<input type="date" class="form-control" name="date_filter" placeholder="{{date('Y-m-d')}}">`);
                                break;
                            case '#':
                                $(cell).html(title);
                                break;
                            case 'Actions':
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
                'url': url,
                data: {}
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
                    data: 'lead'
                },
                {
                    data: 'course'
                },
                {
                    data: 'intake_month'
                },
                {
                    data: 'intake_year'
                },
                {
                    data: 'university'
                },
                {
                    data: 'counsellor'
                },
                {
                    data: 'status'
                },
                {
                    data: 'applied'
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
    function getApplications() {
        console.log("hitted")
        $("#myApplicationTable").dataTable().fnDestroy();
        let url = "{{ route('applications.listByLeadId' ,'lead_id') }}"
        let lead_id = $('#lead_id').val()
        url = url.replace('lead_id', lead_id)

        var table = $('#myApplicationTable').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            'columnDefs': [{
                'targets': [0, -1],
                'orderable': false,
            }],
            ajax: {
                'url': url,
                data: {}
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
                    data: 'lead'
                },
                {
                    data: 'course'
                },
                {
                    data: 'intake_month'
                },
                {
                    data: 'intake_year'
                },
                {
                    data: 'university'
                },
                {
                    data: 'status'
                },
                {
                    data: 'applied'
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
    function applicationDelete(id) {
        $.confirm({
            title: 'Confirm',
            content: 'Do you want to delete this Application ?',
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
                        var url = "{{ route('applications.delete','id') }}";
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

    function btnDelete(id) {
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

    $(document).ready(function() {
        getApplicationsCounsellors();
    });

    function getApplicationsCounsellors() {
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
                    $('.applications-list-owners').html(options);
                }
                if (data.universities) {
                    var options = '<option value="" selected>Filter University</option>';
                    data.universities.forEach(function(university) {
                        options += '<option value="' + university.name + '">' + university.name + '</option>';
                    });
                    $('.applications-list-universities').html(options);
                }

            }
        });
    }
</script>