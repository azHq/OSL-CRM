<div class="modal center fade" id="edit_university" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Edit University</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form id="university-update" action="" method="POST">
							@csrf
							@method('put')
							<h4>University Information</h4>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
										<div class="col-md-12">
											<input id="edit-university-name" class="form-control" type="text" name="name" required>
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
	$('body').on('click', '.edit-university', function() {
		var id = $(this).data('id');
		getUniversity(id);
		var url = "{{ route('universities.update', 'id') }}";
		url = url.replace('id', id);
		$('#university-update').attr('action', url);
	});

	function getUniversity(id) {
		var url = "{{ route('universities.edit', 'id') }}";
		url = url.replace('id', id);
		$.ajax({
			type: 'GET',
			url: url,
			success: function(data) {
				$('#edit-university-name').val(data.name);
			}
		});
	}
</script>