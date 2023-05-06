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
					<div class="col-md-12">
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
                        <div class="row p-2" style="border-bottom: 1px solid #dee2e6">
                            <div class="col-6">
                                <p>OSL CRM Lead Form</p>
                            </div>
                            <div class="col-3">
                                <p>My Facebook Page</p>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-success btn-rounded">Mapped</button>
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-6">
                                <p>Test Form</p>
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
