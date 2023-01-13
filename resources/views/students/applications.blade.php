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
                                <th> # </th>
                                <th>Course</th>
                                <th>Intake Month</th>
                                <th>Intake Year</th>
                                <th>University</th>
                                <th>Status</th>
                                <th>Applied</th>
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

@component('applications.create', ['student_id'=>$student->id])
@endcomponent

<script>
    // On Load
    $(document).ready(function() {
        getApplications();
    });
</script>

<script>
    function getApplications() {
        $("#myTable").dataTable().fnDestroy();
        var table = $('#myTable').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            'columnDefs': [{
                'targets': [0, -1],
                'orderable': false,
            }],
            ajax: {
                'url': '{{ route("applications.list") }}',
                data: {
                    student_id: '{{$student->id}}'
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

<script>
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
</script>