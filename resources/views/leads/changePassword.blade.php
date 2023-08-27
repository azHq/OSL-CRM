<div class="modal center fade" id="change_password_lead" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
	<div class="modal-dialog lkb-modal-dialog" role="document">
		<button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Change Password</h4>
				<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="container">

					<div class="account-box">
						<div class="account-wrapper">

							<!-- Account Form -->
							<form method="POST" action="{{ route('change.password.by.id') }}">
								@csrf
								<div class="form-group">
									<label>Password</label>
									<input type="password" placeholder="Password" id="change-password" class="form-control pass-input " name="password" value="">
									<span class="fa fa-eye-slash toggle-change-password"></span>

									<div class="text-danger pt-2">
										@error('0')
										{{$message}}
										@enderror
										@error('email')
										{{$message}}
										@enderror
									</div>
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<div class="pass-group">
										<input type="text" hidden id="change-id" class="form-control pass-input " name="id" value="{{$id}}">
										<input type="password" placeholder="Confirm Password" id="confirm-change-password" class="form-control pass-input " name="confirm-password" value="">
										<span class="fa fa-eye-slash toggle-change-password"></span>
										<div class="text-danger pt-2">
											@error('0')
											{{$message}}
											@enderror
											@error('password')
											{{$message}}
											@enderror
										</div>
									</div>
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Submit</button>
								</div>
							</form>
							<!-- /Account Form -->

						</div>
					</div>
				</div>

			</div>

		</div><!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>

<script>
	$(document).on('click', '.toggle-change-password', function() {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $(".pass-input");
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	$(document).ready(function() {
		$('input').attr('autocomplete', 'off');
	});
</script>