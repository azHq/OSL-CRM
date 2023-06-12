<div class="modal center fade" id="add_lead_meta" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
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
						<div class="row p-2" style="border-bottom: 1px solid #dee2e6">
							<div class="col-6">
								<p>Test Form One</p>
							</div>
							<div class="col-3">
								<p>My Facebook Page</p>
							</div>
							<div class="col-3">
								<button class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Map Fields</button>&nbsp;&nbsp;
							</div>

						</div>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>

<div class="modal center fade" id="lead_meta_fields" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Map Fields with META</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="row">
					<form method="POST" action="{{ route('leads.map.fields') }}">
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
						<div class="form-group text-center">
							<button class="btn btn-primary account-btn" type="submit">Map</button>
						</div>
					</form>

				</div>

			</div>

		</div><!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>

@if (Auth::user()->hasRole('super-admin'))
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
					<div class="row p-2" style="border-bottom: 1px solid #dee2e6">
						<div class="col-6">
							<p>${lead.name}</p>
						</div>
						<div class="col-3">
							<p>${data.page.name}</p>
						</div>
						${lead.mapped ?
							`<div class="col-3">
                                <button type="button" class="btn btn-success btn-rounded">Mapped</button>
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
						str2 = str2 == 'English' ? 'English Proficiency' : str2

						tableColumnsHtml += `<option value="${item}">${str2}</option>`
					})
					data.leads[0].field_data.forEach(function(field) {
						subcats += `
					<div class="row p-2" style="border-bottom: 1px solid #dee2e6">
								<div class="col-3">
									<span class="badge bg-primary-light">${field.name}</span>
								</div>
								<div class="col-9">
									<select class=" form-control form-select" name="${field.name}" readonly>
										<option value="none">None</option>
										${tableColumnsHtml}
									</select>
								</div>
							</div>
						`
					})
					$('#mapMetaList').html(subcats);
				}
				// $("#lead_meta_fields").show()
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