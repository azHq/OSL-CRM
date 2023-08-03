<div class="modal center fade" id="editview_lead" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Edit Lead</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form id="lead-update" action="" method="POST">
							@csrf
							@method('put')
							<h4>Lead Information</h4>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
										<div class="col-md-12">
											<input id="edit-lead-name" class="form-control" type="text" name="name" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input id="edit-lead-email" type="text" class="form-control" name="email" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Phone <span class="text-danger">*</span></label>
											<input id="edit-lead-mobile" type="text" class="form-control" name="mobile" maxlength="13" minlength="7" required>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Intake Month </label>
											<select id="edit-lead-intake_month" class=" form-control form-select" name="intake_month">
												<option value="1">January</option>
												<option value="2">Febraury</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">May</option>
												<option value="6">June</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Intake Year</label>
											<input id="edit-lead-intake_year" type="text" class="form-control intake-year" name="intake_year" placeholder="{{date('Y')}}">
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Purpose</label>
											<select class=" form-control form-select" name="status">
												<option value="English Teaching">English Teaching</option>
												<option value="Study Abroad">Study Abroad</option>
												<!-- <option value="Not Potential">Not Potential</option> -->
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Last Education <span class="text-danger">*</span></label>
											<select id="edit-lead-last_education" class=" form-control form-select" name="last_education" required>
												<option value="PHD">PHD</option>
												<option value="MBA">MBA</option>
												<option value="Masters">Masters</option>
												<option value="Bachelors">Bachelors</option>
												<option value="Diploma">Diploma</option>
												<option value="HSC">HSC</option>
												<option value="SSC">SSC</option>
												<option value="A-levels">A-levels</option>
												<option value="o-levels">o-levels</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Country <span class="text-danger">*</span></label>
											<select class=" form-control form-select" name="country" id="edit-country-info">
											</select>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Completion Date</label>
											<input id="edit-lead-completion_date" type="date" class="form-control" name="completion_date" placeholder="{{date('Y-m-d')}}">
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Education details </label>
											<input id="edit-lead-education_details" type="text" class="form-control" name="education_details" placeholder="About Last Education">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">English <span class="text-danger">*</span></label>
											<select id="edit-lead-english" class=" form-control form-select" name="english" required>
												<option value="N/A">N/A</option>
												<option value="IELTS (Academic)">IELTS (Academic)</option>
												<option value="IELTS (General)">IELTS (General)</option>
												<option value="MOI">MOI</option>
												<option value="OIETC">OIETC</option>
												<option value="PTE">PTE</option>
												<option value="Internal Test">Internal Test</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">English Result</label>
											<input id="edit-lead-english_result" type="text" class="form-control" name="english_result" placeholder="English Result">
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Job Experience </label>
											<input id="edit-lead-job_experience" type="text" class="form-control" name="job_experience" placeholder="Job Experience">
										</div>
									</div>
								</div>
								<div class="form-group row">
									@if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
									<div class="col-md-4 col-sm-12">
										<label class="col-form-label">Counsellor</label>
										<select id="edit-lead-owner_id" class=" form-control form-select" name="owner_id">
											<option value="">Unassigned</option>
										</select>
									</div>
									@endif
									<div class="col">
										<div class="form-group row">
											<div class="col-sm-12">
												<label class="col-form-label">Category</label>
												<select id="lead-edit-category" class=" form-control form-select" name="category_id">

												</select>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="form-group row">
											<div class="col-sm-12">
												<label class="col-form-label">Subcategory</label>
												<select id="lead-edit-subcategory" class=" form-control form-select" name="subcategory_id">

												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Remarks</label>
											<textarea id="edit-remarks" rows="2" class="form-control" name="remarks" placeholder="Add Remarks">
											</textarea>
										</div>
									</div>
								</div>
								<div class="text-center py-3">
									<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
									<button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Cancel</button>
								</div>
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


	$('#lead-edit-category').on('change', function() {
		var category_id = $('#lead-edit-category').val();
		var url = "{{route('leads.subcategories.list', 'category_id')}}";
		url = url.replace('category_id', category_id);
		$.ajax({
			type: 'GET',
			url: url,
			success: function(data) {
				var subcats = "";
				data.forEach(function(subcategory) {
					subcats += '<option value="' + subcategory.id + '">' + subcategory.name + '</option>';
				})
				$('#lead-edit-subcategory').html(subcats);
			}
		});
	});
</script>