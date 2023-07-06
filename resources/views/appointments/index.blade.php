@push('style')
<style>
    #myTable tbody tr td:nth-child(1) {
        width: 4% !important;
    }
</style>
@endpush

<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Messages @endslot
    @push('list') <li class="breadcrumb-item active">Messages</li> @endpush
    @endcomponent
    <div class="page-header pt-3 mb-0 ">
        @include('components.flash')
        <!-- <div class="row">
            <div class="col">

            </div>
            <div class="col text-end">
                <ul class="list-inline-item pl-0">
                    <li class="list-inline-item">
                        <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_user">
                            New Counsellor
                        </button>
                    </li>
                </ul>
            </div>
        </div> -->
    </div>
    <!-- Content Starts -->
    <div class="row">
        <div>
            <aside class="col-md-12">
                <h3>
                    Messages
                </h3>
                <ul>
                    @foreach($newMessageArray as $message)
                    <li style="
                    display: flex;
                    align-items: center;
                    padding-left: 10px;
                    padding-right: 10px;
                    ">
                        <a href="{{route('users.view', $message->user->id)}}">
                            <span class="person-circle-a person-circle" style="   
                            height: 48px;
                            width: 50px;
                            font-size: 25px;
                            margin: 0 auto;
                            display: flex;
                            align-items: center;
                            justify-content: center; ">
                                <section>{{$message->user->name[0]}}</section>
                            </span>
                        </a>
                        <!-- <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt=""> -->
                        <a href="{{route('chat.index', $message->user->id)}}">

                            <div style="margin-left: 10px;">

                                <!-- <a href="{{route('chat.index', $message->user->id)}}" > -->
                                <h2>{{$message->user->name}}</h2>
                                @if(!$message->is_seen && $message->message_by != Auth::id())
                                <h3 style='font-weight:bold'>
                                    <span class="status orange"></span>
                                    {{$message->message}}
                                </h3>
                                @else
                                <h3>
                                    <!-- <span class="status orange"></span> -->
                                    {{$message->message}}
                                </h3>
                                @endif
                            </div>
                        </a>
                    </li>
                    @endforeach

                </ul>
                @if(count($newMessageArray) == 0)
                <div class="col-md-12 empty-message">
                    No messages yet
                </div>
                @endif

            </aside>
        </div>

    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(Auth::user()->hasRole('admin'))
                        <h2> Appointed Students</h2>
                        @else
                        <h2> Appointed Counsellor</h2>
                        @endif
                        <table id="myTable" class="table mb-0 w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @if(Auth::user()->hasRole('admin'))
                                    <th> Student Name</th>
                                    @else
                                    <th> Counsellor Name</th>
                                    @endif
                                    <!-- <th>Counsellor Name</th> -->
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created At</th>
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

</div>
<!-- /Page Content -->





<script>
    // On Load
    $(document).ready(function() {
        getAppointments();
    });
</script>

<script>
    function getAppointments() {
        $("#myTable").dataTable().fnDestroy();
        // $('#myTable thead tr').clone(true).addClass('filters').appendTo('#myTable thead');
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
            ajax: {
                'url': '{{ route("appointments.list") }}',
                data: function(data) {
                    data.filter_search = $('#filter-search').val();
                    data.filter_status = $('#filter-status').val();
                }
            },
            "fnDrawCallback": function(oSettings) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            order: [
                [0, 'DESC']
            ],
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
                    data: 'action'
                },
            ]
        });
    }

    function userDelete(id) {
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
                        var url = "{{ route('users.delete','id') }}";
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