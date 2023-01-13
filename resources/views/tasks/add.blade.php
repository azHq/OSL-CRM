<div class="modal center fade" id="add_task" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Assign Task</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('tasks.store') }}" id="task-add" method="POST">
							@csrf
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Counsellor</label>
											<select class="form-control form-select" name="assignee_id" id="task-add-counsellor-id">

											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-md-12"><label class="col-form-label">Task Name<span class="text-danger">*</span></label></div>
										<div class="col-md-12">
											<input id="task-add-name" class="form-control" type="text" name="name" required>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label class="col-form-label">Task Details <span class="text-danger">*</span></label>
									<textarea type="text" id="task-add-details" class="form-control" name="details" placeholder="About Task" required></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Start Date <span class="text-danger">*</span></label>
											<input type="date" id="task-add-start-date" class="form-control" name="start_date" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Start Time <span class="text-danger">*</span></label>
											<input type="time" step="1" id="task-add-start-time" class="form-control" name="start_time" required>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">End Date <span class="text-danger">*</span></label>
											<input type="date" id="task-add-end-date" class="form-control" name="end_date" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">End Time <span class="text-danger">*</span></label>
											<input type="time" step="1" id="task-add-end-time" class="form-control" name="end_time" required>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center py-3">
								<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
								<button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Cancel</button>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>

@if(Auth::user()->hasRole('super-admin'))
<script>
	$(document).ready(function() {
		$.ajax({
			type: 'GET',
			url: "{{ route('leads.create') }}",
			success: function(data) {
				var options = '';
				data.all_users.forEach(function(user) {
					options += '<option value="' + user.id + '">' + user.name + '</option>';
				});
				$('#task-add-counsellor-id').html(options);
			}
		});
	});
</script>
@else
<script>
	$(document).ready(function() {
		$.ajax({
			type: 'GET',
			url: "{{ route('leads.create') }}",
			success: function(data) {
				var options = '';
				data.me_and_sa.forEach(function(user) {
					options += '<option value="' + user.id + '">' + user.name + '</option>';
				});
				$('#task-add-counsellor-id').html(options);
			}
		});
	});
</script>
@endif