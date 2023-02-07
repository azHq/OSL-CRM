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
			<a class="url" onclick="gotoRoute('{{$leadsIndexUrl}}', 'leads')">
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
							<h3 class="text-center my-3">To Do List</h3>
							<div class="d-flex justify-content-between">
								<div>
                                    @if(Auth::user()->hasRole('super-admin'))
									<select id="todo-filter-counsellor" onchange="filterByCounsellor()" class="task-filter-counsellors form-select focus-none mt-2 d-inline-block" aria-label="Default select example" style="width:max-content;">
										<option value="" selected>Filter Counsellor</option>
									</select>
                                    @endif
									<select id="todo-filter-start-date" class="form-select focus-none mt-2 d-inline-block" aria-label="Default select example" style="width:max-content;">
										<option value="" selected>Start Date</option>
										<option value="Unknown">Unknown</option>
										<option value="Potential">Potential</option>
										<option value="Not Potential">Not Potential</option>
									</select>
									<select id="todo-filter-end-date" class="form-select focus-none mt-2 d-inline-block" aria-label="Default select example" style="width:max-content;">
										<option value="" selected>End Date</option>
										<option value="Unknown">Unknown</option>
										<option value="Potential">Potential</option>
										<option value="Not Potential">Not Potential</option>
									</select>
								</div>
								<div>
									<button onclick="showModal()" class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_task">
										<i class="fa fa-plus" aria-hidden="true"></i> New Task
									</button>
								</div>
							</div>
							<table class="table mb-4 mt-4">
								<thead>
									<tr>
										<th scope="col">No.</th>
										<th scope="col">Task</th>
										<th scope="col">Task Details</th>
										<th scope="col">From</th>
										<th scope="col">To</th>
										<th scope="col">Status</th>
										<th scope="col">Assignee</th>
										<th scope="col">Actions</th>
									</tr>
								</thead>
								<tbody id="todo-list-table">

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
@component('tasks.add')
@endcomponent

<script>
	$(document).ready(function(){
		getTodoList();
        getOwners();
	});
</script>
<script>
    function filterByCounsellor(){
        var assigneeId = $('#todo-filter-counsellor').val();
        if(assigneeId)
            filterTodoList(assigneeId)
        else
            getTodoList();
    }
    function showModal(){
        $("#add_task").modal('show');
    }
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

	function getTodoList() {
		$.ajax({
			type: 'GET',
			url: "{{ route('tasks.todolist') }}",
			data: {},
			success: function(data) {
				if (data.tasks) {
					var items = '';
					var i = 0;
					data.tasks.forEach(function(task) {
						items += `<tr style="border-style: none !important; color:${task.color} !important;">
										<th style="border-style: none !important;" scope="row">${++i}</th>
										<td style="border-style: none !important;"> <b>${task.name}</b> </td>
										<td style="border-style: none !important;">${task.details}</td>
										<td style="border-style: none !important;">${task.start}</td>
										<td style="border-style: none !important;">${task.end}</td>
										<td style="border-style: none !important;">${task.status}</td>
										<td style="border-style: none !important;">${task.assignee_name}</td>
										<td style="border-style: none !important;">
											<button onclick="taskCancel('${task.id}')" type="button" class="btn btn-danger">Cancel</button>
											<button onclick="taskComplete('${task.id}')" type="button" class="btn btn-success ms-1">Resolve</button>
										</td>
									</tr>`;
					});
					$('#todo-list-table').html(items);
				} else {
					var items = `<tr>
									<th scope="row">No Task</th>
								</tr>`;
					$('#todo-list-table').html(items);
				}
			}
		});
	}

    function filterTodoList(assigneeId){
        var url = "{{ route('tasks.todolistByAssignee', 'id') }}";
        url = url.replace('id', assigneeId);
        $.ajax({
            type: 'GET',
            url: url,
            data: {},
            success: function(data) {
                if (data.tasks) {
                    var items = '';
                    var i = 0;
                    data.tasks.forEach(function(task) {
                        items += `<tr style="border-style: none !important; color:${task.color} !important;">
										<th style="border-style: none !important;" scope="row">${++i}</th>
										<td style="border-style: none !important;"> <b>${task.name}</b> </td>
										<td style="border-style: none !important;">${task.details}</td>
										<td style="border-style: none !important;">${task.start}</td>
										<td style="border-style: none !important;">${task.end}</td>
										<td style="border-style: none !important;">${task.status}</td>
										<td style="border-style: none !important;">${task.assignee_name}</td>
										<td style="border-style: none !important;">
											<button onclick="taskCancel('${task.id}')" type="button" class="btn btn-danger">Cancel</button>
											<button onclick="taskComplete('${task.id}')" type="button" class="btn btn-success ms-1">Resolve</button>
										</td>
									</tr>`;
                    });
                    $('#todo-list-table').html(items);
                } else {
                    var items = `<tr>
									<th scope="row">No Task</th>
								</tr>`;
                    $('#todo-list-table').html(items);
                }
            }
        });
    }

    function getOwners() {
        $.ajax({
            type: 'GET',
            url: "{{ route('leads.create') }}",
            success: function(data) {
                if (data.users) {
                    var options = '<option value="" selected>Filter Counsellor</option>';
                    options += '<option value="Unassigned">Unassigned</option>';
                    data.users.forEach(function(user) {
                        options += '<option value="' + user.id + '">' + user.name + '</option>';
                    });
                    $('.task-filter-counsellors').html(options);
                }
                if (data.all_users) {
                    var options = '<option value="" selected>Filter Counsellor</option>';
                    data.all_users.forEach(function(user) {
                        options += '<option value="' + user.id + '">' + user.name + '</option>';
                    });
                    $('.task-filter-counsellors').html(options);
                }
            }
        });
    }
</script>
