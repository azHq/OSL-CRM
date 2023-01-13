<div class="modal center fade" id="add_application_student" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Apply Now</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('applications.store') }}" method="POST">
							@csrf
							<div class="form-group row">
								<div class="col-md-12 col-sm-12">
									<label class="col-form-label">Course Label <span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="course" id="course">
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
									<label class="col-form-label">Intake Month<span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="intake_month" required>
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
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Intake Year<span class="text-danger">*</span></label>
									<input type="text" class="form-control intake-year" name="intake_year" placeholder="2022" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label class="col-form-label">Course Details <span class="text-danger">*</span></label>
									<textarea type="text" class="form-control" name="course_details" placeholder="About Course" required></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Student</label>
									<select class=" form-control form-select" name="student_id">
										<option value="{{$student_id}}" selected>{{$student_name}}</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">University</label>
									<select class=" form-control form-select" name="university_id" id="student-apply-application-universities">
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Status <span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="status">
										<option value="Applied">Applied</option>
										<option value="Offer Received">Offer Received</option>
										<option value="Paid">Paid</option>
										<option value="Visa">Visa</option>
										<option value="Enrolled">Enrolled</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12">
									<label class="col-form-label">Compliance <span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="compliance">
										<option value="Pending">Pending</option>
										<option value="Approved">Approved</option>
										<option value="Rejected">Rejected</option>
									</select>
								</div>
							</div>
							<div class="text-center py-3">
								<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
								<button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
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
	$(document).ready( function() {
		getStudentApplyUniversities();
	});

	function getStudentApplyUniversities() {
		$.ajax({
			type: 'GET',
			url: "{{ route('applications.create') }}",
			success: function(data) {
				var options = '';
				data.universities.forEach(function(university) {
					options += '<option value="' + university.id + '">' + university.name + '</option>';
				});
				$('#student-apply-application-universities').html(options);
			}
		});
	}
</script>