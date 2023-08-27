<div class="modal center fade" id="edit_task_users" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
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
						<form action="" id="task-update2" method="POST">
							@csrf
							@method('PUT')
							<h4>Task Details</h4>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Counsellor</label>
											<select class="form-control form-select" name="assignee_id" id="task-edit-users-counsellor-id">

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
											<input id="task-edit-users-name" class="form-control" type="text" name="name" required>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Start Date <span class="text-danger">*</span></label>
											<input id="task-edit-users-start" type="date" class="form-control" name="start" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">End Date <span class="text-danger">*</span></label>
											<input id="task-edit-users-end" type="date" class="form-control" name="end" required>
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
	$('body').on('click', '.edit-task-users', function() {
        var assignee_id = $(this).data('assignee-id');
        var assignee_name = $(this).data('assignee-name');
        $('#task-edit-users-counsellor-id').html('<option value="' + assignee_id + '" selected>' + assignee_name + '</option>');
		var id = $(this).data('id');
		getTaskEdit(id);
		var url = "{{ route('tasks.update', 'id') }}";
		url = url.replace('id', id);
		$('#task-update2').attr('action', url);
	});

	function getTaskEdit(id) {
		var url = "{{ route('tasks.edit', 'id') }}";
		url = url.replace('id', id);
		$.ajax({
			type: 'GET',
			url: url,
			success: function(data) {
				$('#task-edit-users-name').val(data.name);
				$('#task-edit-users-start').val(data.start);
				$('#task-edit-users-end').val(data.end);
			}
		});
	}

</script>