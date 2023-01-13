@extends('layout.mainlayout')
@section('content')		
	<!-- Main Wrapper -->
    <div class="main-wrapper">
			<div class="account-content">
				
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
						<a href="{{url('/')}}"><img src="{{ URL::asset('/assets/img/logo.png')}}" alt="Dreamguy's Technologies"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Register</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							
							<!-- Account Form -->
							<form action="{{ route('register.custom') }}" method="POST">
								@csrf
								<div class="form-group">
									<label>Name</label><span class="text-danger ms-1">*</span>
									<input type="text" placeholder="Name" id="name" class="form-control"
                                	name="name" value="{{old('name')}}">
	                                 	<div class="text-danger pt-2">
		                                 	@error('name')
		                            			{{$message}}
		                                	@enderror
	                                	</div>
								</div>
								<div class="form-group">
									<label>Email</label><span class="text-danger ms-1">*</span>
									<input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" value="">
		                               <div class="text-danger pt-2">
			                               @error('email')
			                            		{{$message}}
			                                @enderror
		                                </div>
								</div>
								<div class="form-group">
									<label>Password</label><span class="text-danger ms-1">*</span>
									<div class="pass-group">
										<input type="password" placeholder="Password" id="password" class="form-control pass-input"
                                		name="password" value="{{old('password')}}">
										<span class="fa fa-eye-slash toggle-password"></span>
										<div class="text-danger pt-2">
		                                	@error('password')
		                            			{{$message}}
		                                	@enderror
		                            	</div>
									</div>
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Register</button>
								</div>
								<div class="account-footer">
									<p>Already have an account? <a href="{{url('login')}}">Login</a></p>
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