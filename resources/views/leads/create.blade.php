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
						<!-- <form action="{{ route('leads.store') }}" method="POST"> -->
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
										<label class="col-form-label">Address</label>
										<textarea id="edit-address" rows="2" class="form-control" name="address" placeholder="Add Address">
											</textarea>
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
										<label class="col-form-label">Purpose</label>
										<select class=" form-control form-select" name="status">
											<option value="English Teaching">English Teaching</option>
											<option value="Study Abroad">Study Abroad</option>
											<!-- <option value="Not Potential">Not Potential</option> -->
										</select>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="form-group row">
									<div class="col-sm-12">
										<label class="col-form-label">Passport <span class="text-danger">*</span></label>
										<select id="edit-passport" class=" form-control form-select" name="passport" required>
											<option value="1">Yes</option>
											<option value="0" selected>No</option>
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
										<label class="col-form-label">Country <span class="text-danger">*</span></label>
										<select class=" form-control form-select" name="country" id="country-info">
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
											<option value="N/A">N/A</option>
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
						<div class="row">
							<div class="col" id='destination_col'>
								<div class="form-group row">
									<div class="col-sm-12">
										<label class="col-form-label">Desired Destination</label>
										<select id="lead-destination" class=" form-control form-select" name="destination" onchange="destinationChanged()">
											<option value="N/A" selected>N/A</option>
											<option value="Australia">Australia</option>
											<option value="Canada">Canada</option>
											<option value="Sweden">Sweden</option>
											<option value="USA">USA</option>
											<option value="UK">UK</option>
											<option value="others">Others</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col" id='source_col'>
								<div class="form-group row">
									<div class="col-sm-12">
										<label class="col-form-label">Source</label>
										<select id="lead-source" class=" form-control form-select" name="insert_type" onchange="sourceChanged()">
											<option value="Linkedin">Linkedin</option>
											<option value="Twitter">Twitter</option>
											<option value="Youtube">Youtube</option>
											<option value="Google">Google</option>
											<option value="Event">Event</option>
											<option value="Offline">Offline</option>
											<option value="Subagent">Subagent</option>
											<option value="Other Social Platform">Other Social Platform</option>
											<option value="others">Others</option>
										</select>
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
							<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded" onclick="checkUserExistOrNot()">Save</button>&nbsp;&nbsp;
							<button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Cancel</button>
						</div>
						<!-- </form> -->
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>

<div class="modal center fade" id="new_fields_values_modal" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded" style="margin-right:10px" data-bs-toggle="modal" data-bs-target="#add_lead">Back</button>
				<h4 class="modal-title text-center">Duplicate Lead</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					@csrf
					<div class="col-md-12" id="newDuplicateLeadValues">
						<div class="row" style="border-bottom: 1px solid #dee2e6; color: grey; font-size: 16px; font-weight: 600; margin-bottom: 5px">
							<div class="col-6">
								<p>Fields Name</p>
							</div>
							<div class="col-3">
								<p>Change Values</p>
							</div>
							<div class="col-2">

							</div>

						</div>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>

@if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
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
		getCountries()

		function getCountries() {
			$.ajax({
				type: 'GET',
				url: "{{ route('countries.info') }}",
				success: function(countries) {
					var options = '<option value="" selected>Select Country</option>';
					countries.forEach(function(country) {
						options += '<option value="' + country.name + '">' + country.name + '</option>';
					});
					$('#country-info').html(options);

				}
			});
		}
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

	function sourceChanged() {
		let source = $("#lead-source").val();

		if (source == 'others') {
			let newHtml = `<div class="form-group row">
									<div class="col-sm-12">
										<label class="col-form-label">Source</label>
										<select id="lead-source" class=" form-control form-select" name="insert_type" onchange="sourceChanged()">
											<option value="Linkedin">Linkedin</option>
											<option value="Twitter">Twitter</option>
											<option value="Youtube">Youtube</option>
											<option value="Google">Google</option>
											<option value="Event">Event</option>
											<option value="Offline">Offline</option>
											<option value="Subagent">Subagent</option>
											<option value="Other Social Platform">Other Social Platform</option>
											<option value="others" selected>Others</option>
										</select>
									</div>
								</div>
								<div class="form-group row" id="source_input">
									<div class="col-sm-12">
										<label class="col-form-label">Source </label>
										<input type="text" class="form-control" name="insert_type" placeholder="Write a source">
									</div>
								</div>`
			$("#source_col").html(newHtml)
		} else {
			$("#source_input").html('')
		}

	}

	function destinationChanged() {
		let destination = $("#lead-destination").val();
		if (destination == 'others') {
			let newHtml = `	<div class="form-group row">
									<div class="col-sm-12">
										<label class="col-form-label">Desired Destination</label>
										<select id="lead-destination" class=" form-control form-select" name="destination" onchange="destinationChanged()">
											<option value="N/A">N/A</option>
											<option value="Australia">Australia</option>
											<option value="Canada">Canada</option>
											<option value="Sweden">Sweden</option>
											<option value="USA">USA</option>
											<option value="UK">UK</option>
											<option value="others" selected>Others</option>
										</select>
									</div>
								</div>
								<div class="form-group row" id="destination_input">
									<div class="col-sm-12">
										<label class="col-form-label">Destination</label>
										<input type="text" class="form-control" name="destination" placeholder="Write a destination">
									</div>
								</div>`
			$("#destination_col").html(newHtml)
		} else {
			$("#destination_input").html('')
		}

	}

	function checkUserExistOrNot() {
		let email = $("input[name='email']").val();
		let mobile = $("input[name='mobile']").val();
		var url = "{{route('leads.check.duplicate')}}";

		$.ajax({
			type: 'POST',
			url: url,
			data: {
				_token: "{{csrf_token()}}",
				email,
				mobile
			},
			success: function(data) {
				let newLead = {
					email,
					mobile
				}
				newLead.name = $("input[name='name']").val();
				newLead.intake_month = $("select[name='intake_month']").val();
				newLead.intake_year = $("input[name='intake_year']").val();
				newLead.status = $("select[name='status']").val();
				newLead.last_education = $("select[name='last_education']").val();
				newLead.completion_date = $("input[name='completion_date']").val();
				newLead.education_details = $("input[name='education_details']").val();
				newLead.english = $("select[name='english']").val();
				newLead.english_result = $("input[name='english_result']").val();
				newLead.job_experience = $("input[name='job_experience']").val();
				newLead.owner_id = $("select[name='owner_id']").val();
				newLead.category_id = $("select[name='category_id']").val();
				newLead.subcategory_id = $("select[name='subcategory_id']").val();
				newLead.insert_type = $("input[name='insert_type']").val() || $("select[name='insert_type']").val();
				newLead.destination = $("input[name='destination']").val() || $("select[name='destination']").val();
				console.log({
					newLead
				})
				let url = "{{route('leads.field.values')}}"
				$.ajax({
					type: 'POST',
					url: url,
					data: {
						_token: '{{csrf_token()}}',
						valueFromLead: newLead
					},
					success: function(data) {
						if (!Array.isArray(data)) {
							var subcats = `
								<input hidden value="${data.id}" id="lead_id" name="lead_id">

								<div class="row" style="border-bottom: 1px solid #dee2e6; color: grey; font-size: 16px; font-weight: 600; margin-bottom: 5px">
											<div class="col-3">
												<p>Fields Name</p>
											</div>
											<div class="col-9">
												<p>Change Values</p>
								</div>


							</div>`;

							let tableColumnsHtml = ''
							for (let item of data.values) {
								subcats += `
									<div class="row p-2" style="border-bottom: 1px solid #dee2e6">
												<div class="col-3">
													<span class="badge bg-primary-light">${item.name}</span>
												</div>
												<div class="row col-9" style="align-item:center">
													<div class="col-4">
														<input class="form-control col-4" name="previous" value="${item.previous}" readonly>
													</div>
													<div class="col-1">
														->
													</div>
													<div class="col-4">
														<input class=" form-control col-4" name="newest" value="${item.newest}" readonly>
													</div>
												</div>
										</div>
								`
							}

							subcats += `
							<div class="text-center py-3">
										<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded" onClick="updateLeadById('${encodeURIComponent(JSON.stringify(data))}')">Update</button>&nbsp;&nbsp;
										<button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Cancel</button>
									</div>
							`
							$('#newDuplicateLeadValues').html(subcats);
							$('#add_lead').modal('hide')
							$('#new_fields_values_modal').modal('show')
						} else {
							let url = "{{route('leads.store')}}"
							$.ajax({
								type: 'POST',
								url: url,
								data: {
									_token: "{{csrf_token()}}",
									...newLead
								},
								success: function(data) {
									window.location.reload()
								}
							});
						}

					}
				});
			}
		});
	}

	function updateLeadById(data) {
		let valueFromLead = JSON.parse(decodeURIComponent(data))
		var url = "{{route('leads.update.id')}}";
		$.ajax({
			type: 'POST',
			url: url,
			data: {
				_token: '{{csrf_token()}}',
				valueFromLead
			},
			success: function(data) {
				window.location.reload()
			}
		});
	}
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