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

<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Pending Documents @endslot
    @push('list') <li class="breadcrumb-item active">Pending Documents</li> @endpush
    @endcomponent
    <div class="page-header pt-3 mb-0 ">

        @include('components.flash')

        <div class="row">
  
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Counsellor</th>
                                    <th>Progress</th>
                                    <th>Document Status</th>
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
<!-- /Page Content -->

<script>
    // On Load
    $(document).ready(function() {
        getTransactions();
    });

    $('#filter-search').keyup(function() {
        getTransactions();
    });

    $('#filter-status').on('change', function() {
        getTransactions();
    });
</script>

<script>
    function getTransactions() {
        $("#myTable").dataTable().fnDestroy();
        $('#myTable thead tr').clone(true).addClass('filters').appendTo('#myTable thead');
        var table = $('#myTable').dataTable({
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
                            case 'Document Status':
                                $(cell).html(`<select id="filter-status" class="form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="Pending">Pending</option>
                                            </select>`);
                                break;
                            case 'Counsellor':
                                $(cell).html(`<select id="filter-owner" name="owner_id" class="documents-list-owners form-select focus-none mt-2" aria-label="Default select example" style="width:max-content;">
                                                <option value="" selected>Filter Counsellor</option>
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
            },
            ajax: {
                'url': '{{ route("documents.pending") }}',
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
                data: function(data) {
                    data.filter_search = $('#filter-search').val();
                    data.filter_sort = $('#filter-sort').val();
                    data.filter_status = $('#filter-status').val();
                    data.filter_type = $('#filter-type').val();
                    data.startDate = $('#startDate').val();
                    data.endDate = $('#endDate').val();
                    data.filter_customer = $('#filter-customer').val();
                    data.filter_location = $('#filter-location').val();
                    data.filter_branch = $('#filter-branch').val();
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
                    data: 'progress'
                },
                {
                    data: 'document_status'
                },
                {
                    data: 'action'
                },
            ]
        });
    }

    $(document).ready(function() {
        getDocumentsCounsellors();
    });

    function getDocumentsCounsellors() {
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
                    $('.documents-list-owners').html(options);
                }
            }
        });
    }
</script>