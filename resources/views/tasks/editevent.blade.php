<div class="modal center fade" id="edit_event" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Update Task</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="" id="event-update" method="POST">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Counsellor</label>
											<select class="form-control form-select" name="assignee_id" id="event-edit-counsellor-id">

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
											<input id="event-edit-name" class="form-control" type="text" name="name" required>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label class="col-form-label">Task Details <span class="text-danger">*</span></label>
									<textarea type="text" id="event-edit-details" class="form-control" name="details" placeholder="About Task" required></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Start Date <span class="text-danger">*</span></label>
											<input type="date" id="event-edit-start-date" class="form-control" name="start_date" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Start Time <span class="text-danger">*</span></label>
											<input type="time" step="1" id="event-edit-start-time" class="form-control" name="start_time" required>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">End Date <span class="text-danger">*</span></label>
											<input type="date" id="event-edit-end-date" class="form-control" name="end_date" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">End Time <span class="text-danger">*</span></label>
											<input type="time" step="1" id="event-edit-end-time" class="form-control" name="end_time" required>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Status</label>
											<select class="form-control form-select" name="status" id="event-edit-status">
												<option value="Pending">Pending</option>
												<option value="Resolved">Resolved</option>
												<option value="Canceled">Canceled</option>
											</select>
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

<script>
	function getEventEdit(id) {
		var url = "{{ route('tasks.edit', 'id') }}";
		url = url.replace('id', id);
		$.ajax({
			type: 'GET',
			url: url,
			success: function(data) {
				$('#event-edit-name').val(data.name);
				$('#event-edit-counsellor-id').val(data.assignee_id);
				$('#event-edit-start-date').val(data.start_date);
				$('#event-edit-end-date').val(data.end_date);
				$('#event-edit-start-time').val(data.start_time);
				$('#event-edit-end-time').val(data.end_time);
				$('#event-edit-details').val(data.details);
				$('#event-edit-status').val(data.status);
			}
		});
	}

	function getOwnersEventEdit() {
		$.ajax({
			type: 'GET',
			url: "{{ route('leads.create') }}",
			success: function(data) {
				var options = '';
				data.all_users.forEach(function(user) {
					options += '<option value="' + user.id + '">' + user.name + '</option>';
				});
				$('#event-edit-counsellor-id').html(options);
			}
		});
	}
</script>