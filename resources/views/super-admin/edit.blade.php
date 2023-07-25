<div class="modal center fade" id="edit_user" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Edit Super Admin</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form id="user-update" action="" method="POST">
							@csrf
							@method('put')
							<h4>Super Admin Information</h4>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
										<div class="col-md-12">
											<input id="edit-user-name" class="form-control" type="text" name="name" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input id="edit-user-email" type="text" class="form-control" name="email" required>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Phone <span class="text-danger">*</span></label>
											<input id="edit-user-mobile" type="text" class="form-control" name="mobile" maxlength="13" minlength="7" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Status</label>
											<select id="edit-user-status" class=" form-control form-select" name="status">
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
												<option value="Suspended">Suspended</option>
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
	$('body').on('click', '.edit-user', function() {
		var id = $(this).data('id');
		getAdmin(id);
		var url = "{{ route('users.update', 'id') }}";
		url = url.replace('id', id);
		$('#user-update').attr('action', url);
	});

	function getAdmin(id) {
		var url = "{{ route('users.edit', 'id') }}";
		url = url.replace('id', id);
		$.ajax({
			type: 'GET',
			url: url,
			success: function(data) {
				$('#edit-user-name').val(data.name);
				$('#edit-user-email').val(data.email);
				$('#edit-user-mobile').val(data.mobile);
				$('#edit-user-status').val(data.status);
			}
		});
	}
</script>