<div class="modal center fade" id="add_university" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add University</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('universities.store') }}" method="POST">
							@csrf
							<h4>University Information</h4>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
										<div class="col-md-12">
											<input class="form-control" type="text" name="name" required>
										</div>
										<div class="col-md-12">
											<select id="country-id" name="country_id" class=" form-select focus-none mt-2 d-inline-block" aria-label="Default select example" style="width:max-content;">
												<option value="" selected>Select Country</option>
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

<div class="modal center fade" id="add_country" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add Country</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('countries.store') }}" method="POST">
							@csrf
							<h4>Country Name</h4>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
										<div class="col-md-12">
											<input class="form-control" type="text" name="name" required>
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
	$(document).ready(function() {
		$.ajax({
			type: 'GET',
			url: "{{ route('countries.info') }}",
			success: function(countries) {
				console.log({countries})
				var options = '<option value="" selected>Select Country</option>';
				countries.forEach(function(country) {
					options += '<option value="' + country.id + '">' + country.name + '</option>';
				});
				$('#country-id').html(options);

			}
		});
	});
</script>