@component('components.breadcrumb')
@slot('title') Change Password @endslot
@slot('li_1') Dashboard @endslot
@slot('li_2') Employee Profile @endslot
@slot('li_3') <i class="feather-user" aria-hidden="true"></i> @endslot
@endcomponent
@section('content')
<!-- Main Wrapper -->

<div class="account-content m-auto">
	<div class="container">

		<div class="account-box">
			<div class="account-wrapper">

				<h3 class="account-title">Change Password</h3>

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

<!-- /Main Wrapper -->
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