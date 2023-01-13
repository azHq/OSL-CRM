<?php $page="form-input-groups";?>
@extends('layout.mainlayout')
@section('content')		
		<!-- Page Wrapper -->
		<div class="page-wrapper">
            <div class="content container-fluid">
				
				@component('components.breadcrumb')                
                  @slot('title') Form Input Groups  @endslot
                  @slot('li_1') Dashboard @endslot
                  @slot('li_2') Form Input Groups @endslot
                  @slot('li_3') <i class="fa fa-object-group" aria-hidden="true"></i> @endslot
              	@endcomponent
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title mb-0">Basic Examples</h4>
							</div>
							<div class="card-body">
								<form action="#">
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Group Left</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-text" id="basic-addon1">@</span>
												<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Group Right</label>
										<div class="col-lg-9">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
												<span class="input-group-text" id="basic-addon2">@example.com</span>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">URL Example</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-text">https://</span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-3">Group with Price</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-text">$</span>
												<input type="text" class="form-control">
												<span class="input-group-text">.00</span>
											</div>
										</div>
									</div>

									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-3">Group with Price (Left)</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-text">$</span>
												<span class="input-group-text">0.00</span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title mb-0">Sizing</h4>
							</div>
							<div class="card-body">
								<form action="#">
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Input Group Large</label>
										<div class="col-lg-9">
											<div class="input-group input-group-lg">
												<span class="input-group-text" id="sizing-addon1">@</span>
												<input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Input Group Default</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-text" id="sizing-addon2">@</span>
												<input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
											</div>
										</div>
									</div>
									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-3">Input Group Small</label>
										<div class="col-lg-9">
											<div class="input-group input-group-sm">
												<span class="input-group-text" id="sizing-addon3">@</span>
												<input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon3">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title mb-0">Checkbox and Radio Addons</h4>
							</div>
							<div class="card-body">
								<form action="#">
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Checkbox</label>
										<div class="col-lg-9">
											<div class="input-group">
													<span class="input-group-text">
														<input type="checkbox">
													</span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-3">Radio</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-text">
													<input type="radio">
												</span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title mb-0">Multiple Addons</h4>
							</div>
							<div class="card-body">
								<form action="#">
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Radio and Text Addons</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-text">
													<input type="checkbox">
												</span>
												<span class="input-group-text">$</span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-3">Two Addons</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-text">$</span>
												<span class="input-group-text">0.00</span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card mb-0">
							<div class="card-header">
								<h4 class="card-title mb-0">Buttons with dropdowns</h4>
							</div>
							<div class="card-body">
								<form action="#">
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Radio and Text Addons</label>
										<div class="col-lg-9">
											<div class="input-group">
												<button type="button" class="btn btn-white dropdown-toggle" data-bs-toggle="dropdown">Action</button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#">Action</a>
													<a class="dropdown-item" href="#">Another action</a>
													<a class="dropdown-item" href="#">Something else here</a>
													<div role="separator" class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">Separated link</a>
												</div>
												<input type="text" class="form-control" placeholder="Left dropdown">
											</div>
										</div>
									</div>

									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-3">Two Addons</label>
										<div class="col-lg-9">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Right dropdown">
												<button type="button" class="btn btn-white dropdown-toggle" data-bs-toggle="dropdown">Action</button>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Action</a>
													<a class="dropdown-item" href="#">Another action</a>
													<a class="dropdown-item" href="#">Something else here</a>
													<div role="separator" class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">Separated link</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			
			</div>				
		</div>
		<!-- /page Wrapper -->
	
    </div>
	<!-- /Main Wrapper -->
@component('components.modal-popup')                
@endcomponent
@component('components.theme-settings')                
@endcomponent
@endsection