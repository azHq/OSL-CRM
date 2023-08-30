<div class="modal center fade" id="add_lead_meta" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Leads From Meta</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12" id="metaList">
						<div class="row" style="border-bottom: 1px solid #dee2e6; color: grey; font-size: 16px; font-weight: 600; margin-bottom: 5px">
							<div class="col-6">
								<p>Form Name</p>
							</div>
							<div class="col-3">
								<p>Page Name</p>
							</div>
							<div class="col-2">

							</div>

						</div>
						<!-- <div class="row p-2" style="border-bottom: 1px solid #dee2e6">
							<div class="col-6">
								<p>Test Form One</p>
							</div>
							<div class="col-3">
								<p>My Facebook Page</p>
							</div>
							<div class="col-3">
								<button class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Map Fields</button>&nbsp;&nbsp;
							</div>

						</div> -->
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>

<div class="modal center fade" id="lead_meta_fields" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Map Fields with META</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<!-- <form method="POST" action="{{ route('leads.map.fields') }}"> -->
					@csrf
					<div class="col-md-12" id="mapMetaList">
						<input hidden value="" id="lead_id" name="lead_id">
						<div class="row" style="border-bottom: 1px solid #dee2e6; color: grey; font-size: 16px; font-weight: 600; margin-bottom: 5px">
							<div class="col-3">
								<p>Meta Fields Name</p>
							</div>
							<div class="col-9">
								<p>DB Fields Name</p>
							</div>


						</div>
					</div>

					<!-- </form> -->

				</div>

			</div>

		</div><!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>


<div class="modal center fade" id="duplicate_leads_meta" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Duplicates Leads</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12" id="duplicateLeads">
						<div class="row" style="border-bottom: 1px solid #dee2e6; color: grey; font-size: 16px; font-weight: 600; margin-bottom: 5px">
							<div class="col-6">
								<p>Name</p>
							</div>
							<div class="col-3">
								<p>Number</p>
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


<div class="modal center fade" id="fields_values_modal" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="border-0 btn btn-primary btn-gradient-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#duplicate_leads_meta">Back</button>
				<h4 class="modal-title text-center">Fields Values</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					@csrf
					<div class="col-md-12" id="duplicateLeadValues">
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
	$('#add-lead-meta').on('click', function() {
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
		var url = "{{route('leads.from.meta')}}";
		$.ajax({
			type: 'GET',
			url: url,
			success: function(data) {
				var subcats = `
					<div class="row" style="border-bottom: 1px solid #dee2e6; color: grey; font-size: 16px; font-weight: 600; margin-bottom: 5px">
						<div class="col-6">
							<p>Form Name</p>
						</div>
						<div class="col-3">
							<p>Page Name</p>
						</div>
						<div class="col-2">

						</div>

					</div>`;
				data.leadgen_forms.forEach(function(lead) {
					subcats += `
					<div class="row p-3" style="border-bottom: 1px solid #dee2e6">
						<div class="col-5">
							<p>${lead.name}</p>
						</div>
						<div class="col-3">
							<p>${data.page.name}</p>
						</div>
						${lead.mapped ?
							`<div class="row col-4">
								<div class="col-6">
								<button type="button" class="btn btn-success btn-rounded">Mapped</button>
								</div>
								<div class="col-6">
									<button class="border-0 btn btn-primary btn-gradient-primary btn-rounded" data-bs-toggle="modal" data-bs-target="" onclick="syncLead(${lead.id})" id="dup-modal">Sync</button>&nbsp;&nbsp;
								</div>
                            </div>`
							:`<div class="col-3">
							<button class="border-0 btn btn-primary btn-gradient-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#lead_meta_fields" onclick="mapFields(${lead.id})">Map Fields</button>&nbsp;&nbsp;
							</div>`
					}


					</div>
						`
				})
				$('#metaList').html(subcats);


			}
		});


	});

	function updateAllTapped(item) {
		let valueFromLead = JSON.parse(decodeURIComponent(item))
		var url = "{{route('leads.update.all')}}";
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

	function viewFields(item) {
		let valueFromLead = JSON.parse(decodeURIComponent(item))
		var url = "{{route('leads.field.values')}}";
		$.ajax({
			type: 'POST',
			url: url,
			data: {
				_token: '{{csrf_token()}}',
				valueFromLead
			},
			success: function(data) {
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
				$('#duplicateLeadValues').html(subcats);

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

	function syncLead(leadId) {
		let url = "{{route('leads.syncLeads')}}";
		$.ajax({
			type: 'POST',
			url: url,
			data: {
				_token: '{{csrf_token()}}',
				lead_id: leadId
			},
			success: function(data) {

				if (data.length > 0) {
					$('#lead_meta_fields').modal('hide')
					$('#duplicate_leads_meta').modal('show')
					let encodedValues = encodeURIComponent(JSON.stringify(data))
					encodedValues = encodedValues.replaceAll("'", "")
					var subcats = `
					<div class="row" style="border-bottom: 1px solid #dee2e6; color: grey; font-size: 16px; font-weight: 600; margin-bottom: 5px">
						<div class="col-6">
							<p>Name</p>
						</div>
						<div class="col-3">
							<p>Phone</p>
						</div>
						<div class="col-2">
						<button class="border-0 btn btn-primary btn-gradient-primary btn-rounded" onclick="updateAllTapped('${encodedValues}')">Update All</button>&nbsp;&nbsp;

						</div>

					</div>`;
					data.forEach(function(item) {
						let encodedValues = encodeURIComponent(JSON.stringify(item))
						encodedValues = encodedValues.replaceAll("'", "")

						subcats += `
					<div class="row p-2" style="border-bottom: 1px solid #dee2e6">
						<div class="col-6">
							<p>${item.name}</p>
						</div>
						<div class="col-3">
							<p>${item.mobile}</p>
						</div>
						<div class="col-3">
							<button class="border-0 btn btn-primary btn-gradient-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#fields_values_modal" onclick="viewFields('${encodedValues}')">View</button>&nbsp;&nbsp;
						</div>
					</div>
						`
					})
					$('#duplicateLeads').html(subcats);
				} else {
					window.location.reload()
				}
			}
		});
	}

	function mapFields(leadId) {
		var url = "{{route('leads.getLeads.meta', 'lead_id')}}";
		url = url.replace('lead_id', leadId);
		$.ajax({
			type: 'GET',
			url: url,
			success: function(data) {
				$('#lead_id').val(leadId);
				if (data.leads.length) {
					var subcats = `
					<input hidden value="${leadId}" id="lead_id" name="lead_id">

					<div class="row" style="border-bottom: 1px solid #dee2e6; color: grey; font-size: 16px; font-weight: 600; margin-bottom: 5px">
								<div class="col-3">
									<p>Meta Fields Name</p>
								</div>
								<div class="col-9">
									<p>DB Fields Name</p>
								</div>


							</div>`;

					let tableColumnsHtml = ''
					data.table_columns.forEach((item) => {
						//split the above string into an array of strings 
						//whenever a blank space is encountered
						const arr = item.split("_");
						//loop through each element of the array and capitalize the first letter.

						for (var i = 0; i < arr.length; i++) {
							arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);

						}
						//Join all the elements of the array back into a string 
						//using a blankspace as a separator 
						let str2 = arr.join(" ");
						if (str2 == 'English') {
							str2 = 'English Proficiency'
						} else if (str2 == 'Completion Date') {
							str2 = 'Last Education Year'
						}
						tableColumnsHtml += `<option value="${item}">${str2}</option>`
					})
					data.leads[0].field_data.forEach(function(field) {
						subcats += `
					<div class="row p-2" style="border-bottom: 1px solid #dee2e6">
								<div class="col-3">
									<span class="badge bg-primary-light">${field.name}</span>
								</div>
								<div class="col-9">
									<select class=" form-control form-select" name="${field.name}" readonly >
										<option value="none">None</option>
										${tableColumnsHtml}
									</select>
								</div>
							</div>
						`
					})
					subcats += `
						<div class="row p-2" style="border-bottom: 1px solid #dee2e6">
								<div class="col-3">
									<span class="badge bg-primary-light">Purpose</span>
								</div>
								<div class="col-9">
									<select class=" form-control form-select" name="status" readonly >
										<option value="none">None</option>
										<option value="Study Abroad">Study Abroad</option>
										<option value="English Teaching">English Teaching</option>
									</select>
								</div>
						</div>
						<div class="form-group text-center">
							<button class="btn btn-primary account-btn" type="submit" onclick="addAndGetDuplicates('${encodeURIComponent(JSON.stringify(data.leads[0].field_data))}')">Map</button>
						</div>
						`
					$('#mapMetaList').html(subcats);
				}
				// $("#lead_meta_fields").show()
			}
		});
	}

	function addAndGetDuplicates(fieldValues) {
		let values = JSON.parse(decodeURIComponent(fieldValues))
		let request = {
			lead_id: $(`#lead_id`).val()
		}
		for (let item of values) {
			request[item.name] = $(`select[name='${item.name}']`).val()
		}
		request['status'] = $(`select[name='status']`).val()
		console.log({
			request
		})
		let url = "{{route('leads.map.fields')}}"
		$.ajax({
			type: 'POST',
			url: url,
			data: {
				_token: '{{csrf_token()}}',
				...request
			},
			success: function(data) {

				if (data.length > 0) {
					$('#lead_meta_fields').modal('hide')
					$('#duplicate_leads_meta').modal('show')
					let encodedValues = encodeURIComponent(JSON.stringify(data))
					encodedValues = encodedValues.replaceAll("'", "")
					var subcats = `
					<div class="row" style="border-bottom: 1px solid #dee2e6; color: grey; font-size: 16px; font-weight: 600; margin-bottom: 5px">
						<div class="col-6">
							<p>Name</p>
						</div>
						<div class="col-3">
							<p>Phone</p>
						</div>
						<div class="col-2">
						<button class="border-0 btn btn-primary btn-gradient-primary btn-rounded" onclick="updateAllTapped('${encodedValues}')">Update All</button>&nbsp;&nbsp;

						</div>

					</div>`;
					data.forEach(function(item) {
						let encodedValues = encodeURIComponent(JSON.stringify(item))
						encodedValues = encodedValues.replaceAll("'", "")

						subcats += `
					<div class="row p-2" style="border-bottom: 1px solid #dee2e6">
						<div class="col-6">
							<p>${item.name}</p>
						</div>
						<div class="col-3">
							<p>${item.mobile}</p>
						</div>
						<div class="col-3">
							<button class="border-0 btn btn-primary btn-gradient-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#fields_values_modal" onclick="viewFields('${encodedValues}')">View</button>&nbsp;&nbsp;
						</div>
					</div>
						`
					})
					$('#duplicateLeads').html(subcats);
				} else {
					window.location.reload()
				}
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