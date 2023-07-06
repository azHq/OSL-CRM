<div class="modal right fade" id="add_student" tabindex="-1" role="dialog" aria-modal="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add Student</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('students.store') }}" method="POST">
							@csrf
							<h4>Student Information</h4>
							<div class="form-group row">
								<div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
								<div class="col-md-12">
									<input class="form-control" type="text" placeholder="Full Name" name="name" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="email" placeholder="Email" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Phone <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="mobile" placeholder="Phone" maxlength="13" minlength="7" required>
								</div>
							</div>
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
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Interested Course</label>
									<input type="text" class="form-control" name="course" placeholder="Course">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Counsellor</label>
									<select class=" form-control form-select" name="owner_id" id="users">
										<option value="">Unassigned</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Source</label>
									<input type="text" class="form-control" name="source" placeholder="Source">
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

@push('script')
<script>
	$('#add-lead').on('click', function() {
		getUsers();
	});

	function getUsers() {
		$.ajax({
			type: 'GET',
			url: "{{ route('leads.create') }}",
			success: function(data) {
				var options = '<option value="">Unassigned</option>';
				data.users.forEach(function(user) {
					options += '<option value="' + user.id + '">' + user.name + '</option>';
				});
				$('#users').html(options);
			}
		});
	}
</script>
@endpush