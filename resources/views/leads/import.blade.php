<div class="modal center fade" id="import_leads" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Import Leads</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('leads.import') }}" method="POST" enctype="multipart/form-data">
							@csrf
						
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-md-12"><label class="col-form-label">Leads File (CSV) <span class="text-danger">*</span></label></div>
										<div class="col-md-12">
											<input class="form-control" type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center py-3">
								<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Upload</button>&nbsp;&nbsp;
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

	function getOwners() {
		$.ajax({
			type: 'GET',
			url: "{{ route('leads.create') }}",
			success: function(data) {
				// 
			}
		});
	}
</script>