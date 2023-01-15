@extends('layout.authlayout')
@section('content')
<!-- Main Wrapper -->
<div class="main-wrapper">
	<div class="account-content">

		<div class="container">

			<div class="account-box">
				<div class="account-wrapper">

					<!-- Account Logo -->
					<div class="d-flex">
						<a href="{{url('/')}}" class="m-auto"><img src="{{ URL::asset('/assets/img/logo (original).jpeg')}}" alt="logo" class="login-logo"></a>
					</div>
					<!-- /Account Logo -->

					<h3 class="account-title">Login</h3>

					<!-- Account Form -->
					<form method="POST" action="{{ route('login.post') }}">
						@csrf
						<div class="form-group">
							<label>Email Address</label>
							<input type="text" placeholder="Email" id="Email" class="form-control" name="email" value="" autocomplete="enter-email">
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
							<label>Password</label>
							<div class="pass-group">
								<input type="password" placeholder="Password" id="password" class="form-control pass-input " name="password" value="" autocomplete="off">
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
							<button class="btn btn-primary account-btn" type="submit">Login</button>
						</div>
						<div class="account-footer">
							<p>Don't have an account yet? <a href="{{url('register')}}">Register</a></p>
						</div>
					</form>
					<!-- /Account Form -->

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