<div class="modal center fade" id="add_lead" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Add Lead</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('leads.store') }}" method="POST">
							@csrf
							<h4>Lead Information</h4>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-md-12">
											<label class="col-form-label">
												Name <span class="text-danger">*</span>
											</label>
										</div>
										<div class="col-md-12">
											<input class="form-control" type="text" name="name" minlength="3" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="email" required>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Phone <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="mobile" maxlength="15" minlength="7" required>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Intake Month </label>
											<select class=" form-control form-select" name="intake_month">
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
											<input type="text" id="datepicker" class="form-control intake-year" name="intake_year" placeholder="{{date('Y')}}">
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Student Status</label>
											<select class=" form-control form-select" name="status">
												<option value="Unknown">Unknown</option>
												<option value="Potential">Potential</option>
												<option value="Not Potential">Not Potential</option>
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
											<select class=" form-control form-select" name="last_education" required>
												<option value="PHD">PhD</option>
												<option value="MBA">MBA</option>
												<option value="Masters">Masters</option>
												<option value="Bachelors">Bachelors</option>
												<option value="Diploma">Diploma</option>
												<option value="HSC">HSC</option>
												<option value="SSC">SSC</option>
												<option value="A-levels">A-Levels</option>
												<option value="o-levels">O-Levels</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Completion Date</label>
											<input type="date" class="form-control" name="completion_date" placeholder="{{date('Y-m-d')}}">
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Education details </label>
											<input type="text" class="form-control" name="education_details" placeholder="About Last Education">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">English Proficiency Test <span class="text-danger">*</span></label>
											<select class=" form-control form-select" name="english" required>
												<option value="IELTS (Academic)">IELTS (Academic)</option>
												<option value="IELTS (General)">IELTS (General)</option>
												<option value="Duolingo">Duolingo</option>
												<option value="MOI">MOI</option>
												<option value="OIETC">OIETC</option>
												<option value="PTE">PTE</option>
												<option value="Internal Test">Internal Test</option>
												<option value="Others">Others</option>
                                            </select>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">English Result</label>
											<input type="text" class="form-control" name="english_result" placeholder="English Result">
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Job Experience </label>
											<input type="text" class="form-control" name="job_experience" placeholder="Job Experience">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-4 col-sm-12">
									<label class="col-form-label">Counsellor</label>
									<select class=" form-control form-select" name="owner_id" id="create-lead-owners" readonly>
										<option value="">Unassigned</option>
										@foreach(App\Models\User::admins()->get() as $user)
										<option value="{{$user->id}}" {{Auth::user()->id==$user->id?'selected':''}}>{{$user->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Category</label>
											<select id="lead-create-category" class=" form-control form-select" name="category_id">
												@foreach(App\Models\Category::all() as $category)
												<option value="{{$category->id}}">{{$category->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group row">
										<div class="col-sm-12">
											<label class="col-form-label">Subcategory</label>
											<select id="lead-create-subcategory" class=" form-control form-select" name="subcategory_id">
												@foreach(App\Models\Subcategory::where('category_id', 1)->get() as $subcategory)
												<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
												@endforeach
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

@if (Auth::user()->hasRole('super-admin'))
<script>
	$('#add-lead').on('click', function() {
		getOwners();
	});

	function getOwners() {
		$.ajax({
			type: 'GET',
			url: "{{ route('leads.create') }}",
			success: function(data) {
				var options = '<option value="">Unassigned</option>';
				data.users.forEach(function(user) {
					options += '<option value="' + user.id + '">' + user.name + '</option>';
				});
				$('#create-lead-owners').html(options);
			}
		});
	}
</script>
@endif
<script>
	$(document).ready(function() {

		if ($('.intake-year').length > 0) {
			$('.intake-year').datetimepicker({
				format: 'YYYY',
				icons: {
					up: "fa fa-angle-up",
					down: "fa fa-angle-down",
					next: 'fa fa-angle-right',
					previous: 'fa fa-angle-left'
				}
			});
		}
	});

	$('#lead-create-category').on('change', function() {
		var category_id = $('#lead-create-category').val();
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
				$('#lead-create-subcategory').html(subcats);
			}
		});
	});
</script>
