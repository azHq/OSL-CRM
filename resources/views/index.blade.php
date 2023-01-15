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
		<div class="col">
			@php
			$leadsIndexUrl = route('leads.index');
			@endphp
			<a class="url" onclick="gotoRoute('{{$leadsIndexUrl}}')">
				<div class="card inovices-card">
					<div class="card-body">
						<div class="inovices-widget-header">
							<span class="inovices-widget-icon">
								<i class="fa fa-bullhorn fa-4x card-icon-color" aria-hidden="true"></i>
							</span>
							<div class="inovices-dash-count">
								<div class="inovices-amount">
									<span class="m-auto">{{ $data['leads'] }}</span>
								</div>
							</div>
						</div>
						<p class="inovices-all"> Leads <span></span></p>
					</div>
				</div>
			</a>
		</div>
		<div class="col">
			@php
			$studentsIndexUrl = route('students.index');
			@endphp
			<a class="url" onclick="gotoRoute('{{$studentsIndexUrl}}')">
				<div class="card inovices-card">
					<div class="card-body">
						<div class="inovices-widget-header">
							<span class="inovices-widget-icon">
								<i class="fa fa-clock-o fa-4x card-icon-color" aria-hidden="true"></i>
							</span>
							<div class="inovices-dash-count">
								<div class="inovices-amount">
									<span class="m-auto">{{ $data['pendings'] }}</span>
								</div>
							</div>
						</div>
						<p class="inovices-all"> Pendings <span></span></p>
					</div>
				</div>
			</a>
		</div>
		<div class="col">
			@php
			$documentsIndexUrl = route('documents.index');
			@endphp
			<a class="url" onclick="gotoRoute('{{$documentsIndexUrl}}')">
				<div class="card inovices-card">
					<div class="card-body">
						<div class="inovices-widget-header">
							<span class="inovices-widget-icon">
								<i class="fa fa-university fa-4x card-icon-color" aria-hidden="true"></i>
							</span>
							<div class="inovices-dash-count">
								<div class="inovices-amount">
									<span class="m-auto">{{$data['admissions']}}</span>
								</div>
							</div>
						</div>
						<p class="inovices-all"> Admissions <span></span></p>
					</div>
				</div>
			</a>
		</div>
		<div class="col">
			@php
			$tasksIndexUrl = route('tasks.index');
			@endphp
			<a class="url" onclick="gotoRoute('{{$tasksIndexUrl}}')">
				<div class="card inovices-card">
					<div class="card-body">
						<div class="inovices-widget-header">
							<span class="inovices-widget-icon">
								<i class="fa fa-cc-visa fa-4x card-icon-color" aria-hidden="true"></i>
							</span>
							<div class="inovices-dash-count">
								<div class="inovices-amount">
									<span class="m-auto">{{$data['visa_compliances']}}</span>
								</div>
							</div>
						</div>
						<p class="inovices-all"> Visa Compliances <span></span></p>
					</div>
				</div>
			</a>
		</div>
		<div class="col">
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
								<div class="inovices-amount">
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
		<div class="col">
			<div class="row d-flex justify-content-center align-items-center mt-4">
				<div class="col">
					<div class="card rounded-3">
						<div class="card-body p-4">

							<h3 class="text-center my-3 pb-3">To Do List</h3>

							<table class="table mb-4">
								<thead>
									<tr>
										<th scope="col">No.</th>
										<th scope="col">Task</th>
										<th scope="col">Task Details</th>
										<th scope="col">From</th>
										<th scope="col">To</th>
										<th scope="col">Status</th>
										<th scope="col">Actions</th>
									</tr>
								</thead>
								<tbody>
									@forelse($tasks as $task)
									<tr style="border-style: none !important; color:{{$task->color}} !important;">
										<th style="border-style: none !important;" scope="row">{{$loop->index+1}}</th>
										<td style="border-style: none !important;"> <b>{{$task->name}}</b> </td>
										<td style="border-style: none !important;">{{$task->details}}</td>
										<td style="border-style: none !important;">{{$task->status}}</td>
										<td style="border-style: none !important;">{{ date('d-m-Y h:i A', strtotime($task->start)) }}</td>
										<td style="border-style: none !important;">{{ date('d-m-Y h:i A', strtotime($task->end)) }}</td>
										<td style="border-style: none !important;">
											<button onclick="taskCancel('{{$task->id}}')" type="button" class="btn btn-danger">Cancel</button>
											<button onclick="taskComplete('{{$task->id}}')" type="button" class="btn btn-success ms-1">Rsolve</button>
										</td>
									</tr>
									@empty
									<tr>
										<th scope="row">No Task</th>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
<script>
</script>
<script>
	function taskDelete(id) {
		$.confirm({
			title: 'Confirm',
			content: 'Do you want to delete this Task ?',
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
						var url = "{{ route('tasks.delete','id') }}";
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

	function taskComplete(id) {
		$.confirm({
			title: 'Confirm',
			content: 'Did you completed this task?',
			buttons: {
				info: {
					text: 'No',
					btnClass: 'btn-red',
					action: function() {
						// canceled
					}
				},
				danger: {
					text: 'Yes',
					btnClass: 'btn-blue',
					action: function() {
						var url = "{{ route('tasks.complete','id') }}";
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

	function taskCancel(id) {
		$.confirm({
			title: 'Confirm',
			content: 'Do you want to cancel this task?',
			buttons: {
				info: {
					text: 'No',
					btnClass: 'btn-red',
					action: function() {
						// canceled
					}
				},
				danger: {
					text: 'Yes',
					btnClass: 'btn-blue',
					action: function() {
						var url = "{{ route('tasks.cancel','id') }}";
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