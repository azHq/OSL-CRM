@extends('layout.mainlayout')
@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		@component('components.custombreadcrumb')
		@slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
		@slot('title') Convert Student @endslot
		@push('list') <li class="breadcrumb-item"><a href="{{route('leads.index')}}">Leads</a></li> @endpush
		@push('list') <li class="breadcrumb-item active">Convert Student</li> @endpush
		@endcomponent

		<div class="row mt-4">
			<div class="col-md-12">
				<form action="{{ route('students.store') }}" method="POST">
					@csrf
					<h4>Student Information</h4>
					<div class="row">
						<div class="col">
							<div class="form-group row">
								<div class="col-md-12"><label class="col-form-label">Name <span class="text-danger">*</span></label></div>
								<div class="col-md-12">
									<input class="form-control" type="text" value="{{$lead->name}}" name="name" required>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="email" value="{{$lead->email}}" required>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Phone <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="mobile" value="{{$lead->mobile}}" required>
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
									<input type="text" class="form-control" name="intake_year" placeholder="{{date('Y')}}">
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
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Last Education <span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="last_education" required>
										<option value="PHD">PHD</option>
										<option value="MBA">MBA</option>
										<option value="Masters">Masters</option>
										<option value="Bachelors">Bachelors</option>
										<option value="Diploma">Diploma</option>
										<option value="HSC">HSC</option>
										<option value="SSC">SSC</option>
										<option value="A-levels">A-levels</option>
										<option value="o-levels">o-levels</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="col-form-label">Last Education Year</label>
									<input id="edit-lead-completion_date" type="text" class="form-control" name="completion_date" placeholder="{{date('Y')}}">
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
									<label class="col-form-label">English <span class="text-danger">*</span></label>
									<select class=" form-control form-select" name="english" required>
										<option value="IELTS (Academic)">IELTS (Academic)</option>
										<option value="IELTS (General)">IELTS (General)</option>
										<option value="MOI">MOI</option>
										<option value="OIETC">OIETC</option>
										<option value="PTE">PTE</option>
										<option value="Internal Test">Internal Test</option>
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
					<input type="hidden" name="lead_id" value="{{$lead->id}}" required>
					<div class="text-center py-3">
						<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
						<button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
<!-- /Main Wrapper -->

</div>
<!-- /Main Wrapper -->
@endsection