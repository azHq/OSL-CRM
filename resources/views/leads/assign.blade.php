<div class="modal center fade" id="assign_lead" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Assign To</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('leads.multiple.assign') }}" method="POST">
							@csrf
							<div class="form-group row d-flex">
								<div class="col-md-6 col-sm-12 m-auto">
									<label class="col-form-label">Counsellor</label>
									<select class=" form-control form-select" name="owner_id" id="assign-lead-owners" readonly>
									</select>
								</div>
							</div>
							<div class="text-center py-3">
								<button type="button" onclick="assignMultipleLeads();" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Assign</button>&nbsp;&nbsp;
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
	$('#assign-lead').on('click', function() {
		getAssignOwners();
	});

	function getAssignOwners() {
		$.ajax({
			type: 'GET',
			url: "{{ route('leads.create') }}",
			success: function(data) {
				var options = '<option value="">Unassigned</option>';
				data.users.forEach(function(user) {
					options += ('<option value="' + user.id + '">' + user.name + ' (Counsellor)</option>');
				});
				data.cros.forEach(function(user) {
					options += ('<option value="' + user.id + '">' + user.name + ' (CRO)</option>');
				});
				$('#assign-lead-owners').html(options);
			}
		});
	}
</script>