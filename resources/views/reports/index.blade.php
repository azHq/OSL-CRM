@push('style')
<!-- Chart CSS -->
<link rel="stylesheet" href="http://localhost:8001/assets/plugins/morris.js/morris.css">
@endpush

<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Reports @endslot
    @push('list') <li class="breadcrumb-item active">Reports</li> @endpush
    @endcomponent


    <div class="row my-4">
        @if (Auth::user()->hasRole('super-admin'))
        <div class="col-2">
            <label>Select Counselor</label>
            <select id="filter-user" class="form-select focus-none" aria-label="Default select example" style="height:45px;">
                <option value="" selected>All</option>
            </select>
        </div>
        @endif
        <div class="col-2">
            <span>From Date</span>
            <input id="filter-from" type="date" class="form-control" name="filter-from" placeholder="{{date('Y-m-d')}}">
        </div>
        <div class="col-2">
            <span>To Date</span>
            <input id="filter-to" type="date" class="form-control" name="filter-to" placeholder="{{date('Y-m-d')}}">
        </div>
        <div class="col text-end">

        </div>
    </div>



    <div class="row graphs">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Counselor Performance</h3>
                    <canvas id="bar-chart" width="800" height="550"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Lead Report</h3>
                    <canvas id="bar-chart-2" width="800" height="550"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row graphs">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Application Performance</h3>
                    <canvas id="bar-chart-3" width="800" height="550"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Application Reports</h3>
                    <canvas id="pie-chart" width="800" height="550"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Page Content -->
<!-- Chart JS -->
<script>
    $(document).ready(async function() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function(data) {
                var options = '<option value="" selected>Select Counselor</option>';
                data.users.forEach(function(user) {
                    options += '<option value="' + user.id + '">' + user.name + '</option>';
                });
                $('#filter-user').html(options);
            }
        });

        fetchData();
    });

    $('#filter-user').on('change', function() {
        fetchData();
    });

    $('#filter-from').on('change', function() {
        fetchData();
    });

    $('#filter-to').on('change', function() {
        fetchData();
    });

    async function fetchData() {
        var reports = await getReportsList();
        console.log({
            reports
        })
        // Bar chart
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: ["Leads", "Students", "Applications"],
                datasets: [{
                    label: "Projects",
                    backgroundColor: ["#fe7096", "#9a55ff", "#e8c3b9"],
                    data: [reports.leads, reports.students, reports.applications]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Counselor Performance'
                }
            }
        });


        // Bar chart 2
        new Chart(document.getElementById("bar-chart-2"), {
            type: 'bar',
            data: {
                labels: ["Potential Leads", "Not Potential Leads", "Converted Leads"],
                datasets: [{
                    label: "Projects",
                    backgroundColor: ["#fe7096", "#9a55ff", "#e8c3b9"],
                    data: [reports.potential_leads, reports.not_potential_leads, reports.converted_leads]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Lead Report'
                }
            }
        });

        // Bar chart 3
        new Chart(document.getElementById("bar-chart-3"), {
            type: 'bar',
            data: {
                labels: ["Applied", "Offer Recieved", "Paid", "Visa Applied"],
                datasets: [{
                    label: "Projects",
                    backgroundColor: ["#fe7096", "#9a55ff", "#e8c3b9", "#de2036"],
                    data: [reports.applied_applications, reports.offer_applications, reports.paid_applications, reports.visa_applications]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Application Performance'
                }
            }
        });

        /*pie chart*/

        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels: reports.universities,
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: reports.uni_colors,
                    data: reports.uni_applications
                }]
            },
            options: {
                title: {
                    display: true,
                    text: ''
                }
            }
        });

    }

    async function getReportsList() {
        var user_id = $('#filter-user').val();
        var from_date = $('#filter-from').val();
        var to_date = $('#filter-to').val();
        return await $.ajax({
            type: 'GET',
            url: "{{ route('reports.count') }}",
            data: {
                user_id: user_id,
                from_date: from_date,
                to_date: to_date
            },
            success: function(data) {
                console.log({
                    data
                })
                if (data) return data;
            }
        });
    }
</script>

<script>
    $('.selectBox').on("click", function() {
        $(this).parent().find('#checkBoxes').fadeToggle();
        $(this).parent().parent().siblings().find('#checkBoxes').fadeOut();
    });

    //Checkbox Select

    if ($('.SortBy').length > 0) {
        var show = true;
        var checkbox1 = document.getElementById("checkBox");
        $('.selectBoxes').on("click", function() {

            if (show) {
                checkbox1.style.display = "block";
                show = false;
            } else {
                checkbox1.style.display = "none";
                show = true;
            }
        });
    }

    // Date Time Picker

    if ($('.datetimepicker').length > 0) {
        $('.datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            }
        });
    }
</script>