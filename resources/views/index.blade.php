@push('style')
<style>
	.focus-none {
		box-shadow: inset 0 -1px 0 #ddd !important;
	}

	.dashboard-card {
		height: 8em;
	}
</style>
@endpush

<!-- Page Content -->
<div class="content container-fluid">

	<div class="row pt-3">
		<div class="col-xl-2 col-sm-6 col-12 mb-2">
			@php
			$leadsIndexUrl = route('leads.index');
			@endphp
			<a class="url" onclick="gotoRoute('/')">
				<div class="card inovices-card">
					<div class="card-body">
						<div class="inovices-widget-header">
							<span class="inovices-widget-icon">
								<i class="fa fa-bullhorn fa-4x card-icon-color" aria-hidden="true"></i>
							</span>
							<div class="inovices-dash-count">
								<div class="inovices-amount position-absolute bottom-0 end-0">
									<span class="m-auto">{{ $data['leads'] }}</span>
								</div>
							</div>
						</div>
						<p class="inovices-all">All Leads <span></span></p>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xl-2 col-sm-6 col-12">
			@php
			$studentsIndexUrl = route('students.index');
			@endphp
			<a class="url" onclick="gotoRoute('/')">
				<div class="card inovices-card">
					<div class="card-body">
						<div class="inovices-widget-header">
							<span class="inovices-widget-icon">
								<i class="fa fa-circle-o-notch fa-4x card-icon-color" aria-hidden="true"></i>
							</span>
							<div class="inovices-dash-count">
								<div class="inovices-amount position-absolute bottom-0 end-0">
									<span class="m-auto">{{ $data['students'] }}</span>
								</div>
							</div>
						</div>
						<p class="inovices-all"> Pendings <span></span></p>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xl-2 col-sm-6 col-12">
			@php
			$documentsIndexUrl = route('documents.index');
			@endphp
			<a class="url" onclick="gotoRoute('/')">
				<div class="card inovices-card">
					<div class="card-body">
						<div class="inovices-widget-header">
							<span class="inovices-widget-icon">
								<i class="fa fa-graduation-cap fa-4x card-icon-color" aria-hidden="true"></i>
							</span>
							<div class="inovices-dash-count">
								<div class="inovices-amount position-absolute bottom-0 end-0">
									<span class="m-auto">{{$data['documents']}}</span>
								</div>
							</div>
						</div>
						<p class="inovices-all">Addmission <span></span></p>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xl-2 col-sm-6 col-12">
			@php
			$tasksIndexUrl = route('tasks.index');
			@endphp
			<a class="url" onclick="gotoRoute('/')">
				<div class="card inovices-card">
					<div class="card-body">
						<div class="inovices-widget-header">
							<span class="inovices-widget-icon">
								<i class="fa fa-cc-visa fa-4x card-icon-color" aria-hidden="true"></i>
							</span>
							<div class="inovices-dash-count">
								<div class="inovices-amount position-absolute bottom-0 end-0">
									<span class="m-auto">{{$data['list']}}</span>
								</div>
							</div>
						</div>
						<p class="inovices-all"> Visa Compliance <span></span></p>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xl-2 col-sm-6 col-12">
			@php
			$tasksIndexUrl = route('tasks.index');
			@endphp
			<a class="url" onclick="gotoRoute('{{$tasksIndexUrl}}')">
				<div class="card inovices-card">
					<div class="card-body">
						<div class="inovices-widget-header">
							<span class="inovices-widget-icon">
								<i class="fa fa-list fa-4x card-icon-color" aria-hidden="true"></i>
							</span>
							<div class="inovices-dash-count">
								<div class="inovices-amount position-absolute bottom-0 end-0">
									<span class="m-auto">{{$data['list']}}</span>
								</div>
							</div>
						</div>
						<p class="inovices-all"> To Do List <span></span></p>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="page-header mb-0 ">
		@include('components.flash')
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card p-4 mt-4 flex">
				<h4 class="m-auto">Tasks</h4>
			</div>
			@include('tasks.tasks')
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card p-4 mt-4 flex">
				<h4 class="m-auto">Scheduled Tasks</h4>
			</div>
		</div>
	</div>
	<div class="row graphs mt-4">
		<div class="col-12">
			<div class="card h-100">
				<div class="card-body">
					<h3 class="card-title">Lead Statistics</h3>
					<canvas id="bar-chart-grouped" width="800" height="250"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<script>
	$(document).ready(async function() {
		fetchLeadsStatistics();
	});

	async function fetchLeadsStatistics() {
		var data = await getLeadStatistics();

		new Chart(document.getElementById("bar-chart-grouped"), {
			type: 'bar',
			data: {
				labels: ["January", "Febraury", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				datasets: [{
					label: "Leads",
					backgroundColor: "#fe7096",
					data: data.leads
				}, {
					label: "Students",
					backgroundColor: "#fcba03",
					data: data.students
				}, {
					label: "Applications",
					backgroundColor: "#9a55ff",
					data: data.applications
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

	async function getLeadStatistics() {
		return await $.ajax({
			type: 'GET',
			url: "{{ route('reports.leads-statistics') }}",
			data: {},
			success: function(data) {
				if (data) return data;
			}
		});
	}
</script>