<?php $page="error-404";?>
@extends('layout.mainlayout')
@section('content')		
	<!-- Main Wrapper -->
    <div class="main-wrapper text-center">
			
			<div class="error-box">
				<h1>404</h1>
				<h3><i class="fa fa-warning"></i> Oops! Page not found!</h3>
				<p>The page you requested was not found.</p>
				<a href="{{url('/')}}" class="btn btn-custom btn-gradient-primary btn-rounded">Back to Home</a>
			</div>
		
        </div>
		<!-- /Main Wrapper -->
@endsection