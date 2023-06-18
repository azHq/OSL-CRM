@extends('layout.authlayout')
@section('content')
<!-- Main Wrapper -->
<div class="row">
	<div class="col d-flex login-side-section" style="height: 100vh;">
		<!-- Account Logo -->
		<div class="d-flex m-auto">
			<a href="{{url('/')}}" class="m-auto"><img src="{{ URL::asset('/assets/img/new-login-logo.png')}}" alt="logo" class="login-logo"></a>
		</div>
		<!-- /Account Logo -->
	</div>
	<div class="col d-flex" style="height: 100vh;">
		<div class="account-content m-auto">
			<div class="container">

				<div class="account-box">
					<div class="account-wrapper">

						<h3 class="account-title">Reset Password</h3>

						<!-- Account Form -->
						<form method="POST" action="{{ route('reset.password') }}">
							@csrf
							<div class="form-group">
								<label>Password</label>
								<input type="password" placeholder="Password" id="password" class="form-control pass-input " name="password" value="123456">
								<span class="fa fa-eye-slash toggle-password"></span>

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
									<input type="text" hidden id="id" class="form-control pass-input " name="id" value="{{$id}}">
									<input type="password" placeholder="Confirm Password" id="confirm-password" class="form-control pass-input " name="confirm-password" value="123456">
									<span class="fa fa-eye-slash toggle-password"></span>
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
	</div>
</div>
<!-- /Main Wrapper -->
@endsection

@push('script')
<script>
	$(document).ready(function() {
		$('input').attr('autocomplete', 'off');
	});
</script>
@endpush