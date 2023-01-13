<div class="modal center fade" id="edit_application" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Edit Application</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form id="application-update" action="" method="POST">
							@csrf
							@method('put')
							<div class="form-group row">
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Course Label <span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="course" id="application-edit-course">
										<option value="Foundation">Foundation</option>
										<option value="TOP-UP 2nd Year">TOP-UP 2nd Year</option>
										<option value="TOP-UP 3rd Year">TOP-UP 3rd Year</option>
										<option value="Bachelors">Bachelors</option>
										<option value="Pre-Masters">Pre-Masters</option>
										<option value="Masters">Masters</option>
										<option value="PHD">PHD</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Intake Year<span class="text-danger">*</span></label>
									<input type="text" class="form-control intake-year" name="intake_year" placeholder="2022" id="application-edit-intake-year" required>
								</div>
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Intake Month<span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="intake_month" id="application-edit-intake-month" required>
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
							<div class="form-group row">
								<div class="col-12">
									<label class="col-form-label">Course Details <span class="text-danger">*</span></label>
									<textarea type="text" class="form-control" name="course_details" placeholder="About Course" id="application-edit-course-details" required></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Student</label>
									<select class="form-control form-select" name="student_id" id="application-edit-students">
									</select>
								</div>
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">University</label>
									<select class=" form-control form-select" name="university_id" id="application-edit-universities">
										<option value="">Unassigned</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Status <span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="status" id="application-edit-status">
										<option value="Applied">Applied</option>
										<option value="Offer Received">Offer Received</option>
										<option value="Paid">Paid</option>
										<option value="Visa">Visa</option>
										<option value="Enrolled">Enrolled</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Compliance <span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="compliance" id="application-edit-compliance">
										<option value="Pending">Pending</option>
										<option value="Approved">Approved</option>
										<option value="Rejected">Rejected</option>
									</select>
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
	$('body').on('click', '.edit-application', function() {
		var id = $(this).data('id');
		var student_id = $(this).data('student-id');
		var student_name = $(this).data('student-name');
		$('#application-edit-students').html('<option value="' + student_id + '" selected>' + student_name + '</option>');
		getApplicationCreate();
		getApplication(id);
		var url = "{{ route('applications.update', 'id') }}";
		url = url.replace('id', id);
		$('#application-update').attr('action', url);
	});

	function getApplication(id) {
		var url = "{{ route('applications.edit', 'id') }}";
		url = url.replace('id', id);
		$.ajax({
			type: 'GET',
			url: url,
			success: function(data) {
				$('#application-edit-course').val(data.course);
				$('#application-edit-intake-year').val(data.intake_year);
				$('#application-edit-intake-month').val(data.intake_month);
				$('#application-edit-course-details').val(data.course_details);
				$('#application-edit-universities').val(data.university_id);
				$('#application-edit-compliance').val(data.compliance);
				$('#application-edit-status').val(data.status);
			}
		});
	}

	function getApplicationCreate() {
		$.ajax({
			type: 'GET',
			url: "{{ route('applications.create') }}",
			success: function(data) {
				var options = '';
				data.universities.forEach(function(university) {
					options += '<option value="' + university.id + '">' + university.name + '</option>';
				});
				$('#application-edit-universities').html(options);
			}
		});
	}
</script>