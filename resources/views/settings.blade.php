<?php $page="settings";?>
@extends('layout.mainlayout')
@section('content')		
	<div class="page-wrapper">
			<div class="content container-fluid">
			
				@component('components.breadcrumb')                
                  @slot('title') Settings  @endslot
                  @slot('li_1') Dashboard @endslot
                  @slot('li_2') Settings @endslot
                  @slot('li_3') <i class="fa fa-cog" aria-hidden="true"></i> @endslot
                @endcomponent
				@component('components.settings-page') 
				@endcomponent
				<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Website Basic Details</h5>
								</div>
								<div class="card-body pt-0">
									<form>
										<div class="settings-form">
											<div class="form-group">
												<label>Website Name <span class="star-red">*</span></label>
												<input type="text" class="form-control" placeholder="Enter Website Name">
											</div>
											<div class="form-group">
												<p class="settings-label">Logo <span class="star-red">*</span></p>
												<div class="settings-btn">
													<input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" class="hide-input">
													<label for="file" class="upload">
														<i class="feather-upload"></i>
													</label>
												</div>
												<h6 class="settings-size">Recommended image size is <span>150px x 150px</span></h6>
												<div class="upload-images">
													<img src="assets/img/logo.png" alt="Image">
													<a href="javascript:void(0);" class="btn-icon logo-hide-btn">
														<i class="feather-x-circle"></i>
													</a>
												</div>
											</div>
											<div class="form-group">
												<p class="settings-label">Favicon <span class="star-red">*</span></p>
												<div class="settings-btn">
													<input type="file" accept="image/*" name="image" id="files" onchange="loadFile(event)" class="hide-input">
													<label for="file" class="upload">
														<i class="feather-upload"></i>
													</label>
												</div>
												<h6 class="settings-size">
													Recommended image size is <span>16px x 16px or 32px x 32px</span>
												</h6>
												<h6 class="settings-size mt-1">Accepted formats: only png and ico</h6>
												<div class="upload-images upload-size">
													<img src="assets/img/favicon.png" alt="Image">
													<a href="javascript:void(0);" class="btn-icon logo-hide-btn">
														<i class="feather-x-circle"></i>
													</a>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-5 col-md-6">
													<div class="form-group">
														<div class="status-toggle d-flex justify-content-between align-items-center">
															<p class="mb-0">RTL</p>
															<input type="checkbox" id="status_1" class="check">
															<label for="status_1" class="checktoggle">checkbox</label>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group mb-0">
												<div class="settings-btns">
													<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Update</button>&nbsp;&nbsp;
													<button type="submit" class="btn btn-secondary btn-rounded">Cancel</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Address Details</h5>
								</div>
								<div class="card-body pt-0">
									<form>
										<div class="settings-form">
											<div class="form-group">
												<label>Address Line 1 <span class="star-red">*</span></label>
												<input type="text" class="form-control" placeholder="Enter Address Line 1">
											</div>
											<div class="form-group">
												<label>Address Line 2 <span class="star-red">*</span></label>
												<input type="text" class="form-control" placeholder="Enter Address Line 2">
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>City <span class="star-red">*</span></label>
														<input type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>State/Province <span class="star-red">*</span></label>
														<select class="select form-control">
															<option selected="selected">Select</option>
															<option>California</option>
															<option>Tasmania</option>  
															<option>Auckland</option>
															<option>Marlborough</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Zip/Postal Code <span class="star-red">*</span></label>
														<input type="text" class="form-control">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Country <span class="star-red">*</span></label>
														<select class="select form-control">
															<option selected="selected">Select</option>
															<option>India</option>
															<option>London</option>  
															<option>France</option>
															<option>USA</option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group mb-0">
												<div class="settings-btns">
													<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Update</button>&nbsp;&nbsp;
													<button type="submit" class="btn btn-secondary btn-rounded">Cancel</button>
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
	</div>
<!-- /Main Wrapper -->
@component('components.modal-popup')                
@endcomponent
@component('components.theme-settings')                
@endcomponent
@endsection
	  