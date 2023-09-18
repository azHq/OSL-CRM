@push('style')
<!-- Chart CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/morris.js/morris.css')}}">
@endpush

<!-- Page Content -->
<div class="content container-fluid">

    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Reports @endslot
    @push('list') <li class="breadcrumb-item active">Reports</li> @endpush
    @endcomponent


    <div class="row my-4">
        @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
        <div class="col-2">
            <label>Select Counselor</label>
            <select id="filter-user" class="form-select focus-none" aria-label="Default select example" style="height:45px;" onchange="fetchData()">
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
<script type="text/javascript">
    let barChart, barChart2, barChart3, piechart;
    $(document).ready(async function() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function(data) {
                var options = '<option value="" selected>Select Counselor</option>';
                data.users.forEach(function(user) {
                    options += '<option value="' + user.id + '">' + user.name + '(Counsellor)</option>';
                });
                data.cros.forEach(function(user) {
                    options += '<option value="' + user.id + '">' + user.name + '(CRO)</option>';
                });
                $('#filter-user').html(options);
            }
        });

        await fetchData();
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

    async function updateChart(chart, data, labels, text, backgroundColor, type, chartId) {
        if (chart && type == 'bar') {
            await chart.destroy()
        }
        chart = new Chart(document.getElementById(chartId), {
            type,
            data: {
                labels,
                datasets: [{
                    label: "Projects",
                    backgroundColor,
                    data
                }]
            },
            options: {
                legend: {
                    display: type == 'pie'
                },
                title: {
                    display: true,
                    text
                }
            }
        });

        return chart
    }

    async function fetchData() {
        var reports = await getReportsList();
        // Bar chart
        barChart = await updateChart(
            window.barChart,
            [reports.leads, reports.students, reports.applications],
            ["Leads", "Students", "Applications"],
            'Counselor Performance',
            ["#fe7096", "#9a55ff", "#e8c3b9"],
            'bar',
            "bar-chart"
        )
        if (barChart) window.barChart = barChart
        // Bar chart 2
        barChart2 = await updateChart(
            window.barChart2,
            [reports.study_abroad, reports.english_teaching, reports.converted_leads],
            ["Study Abroad Leads", "English Teaching Leads", "Converted Leads"],
            'Lead Report',
            ["#fe7096", "#9a55ff", "#e8c3b9"],
            'bar',
            "bar-chart-2"
        )
        if (barChart2) window.barChart2 = barChart2

        // Bar chart 3
        barChart3 = await updateChart(
            window.barChart3,
            [reports.applied_applications, reports.offer_applications, reports.paid_applications, reports.visa_applications],
            ["Applied", "Offer Recieved", "Paid", "Visa Applied"],
            'Application Performance',
            ["#fe7096", "#9a55ff", "#e8c3b9", "#de2036"],
            'bar',
            "bar-chart-3"
        )
        if (barChart3) window.barChart3 = barChart3

        /*pie chart*/
        piechart = await updateChart(
            window.piechart,
            reports.uni_applications,
            reports.universities,
            'Application Report',
            reports.uni_colors,
            'pie',
            "pie-chart"
        )
        if (piechart) window.piechart = piechart

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
                if (data) return data;
            }
        });
    }
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