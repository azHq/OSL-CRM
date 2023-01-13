<?php $page="projects-dashboard";?>
@extends('layout.mainlayout')
@section('content')		
	<!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

			@component('components.breadcrumb')                
              @slot('title') Project Dashboard  @endslot
              @slot('li_1') Dashboard @endslot
              @slot('li_2') Project Dashboard @endslot
              @slot('li_3') <i class="la la-table" aria-hidden="true"></i> @endslot
            @endcomponent
			<div class="row graphs">
				<div class="col-md-6">
					<div class="card h-100">
						<div class="card-body">
	                    	<h3 class="card-title">Sales Overview</h3>
							<div id="line-charts"></div>
	                	</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card h-100">
						<div class="card-body">
							<h3 class="card-title">Completed Tasks</h3>
							<canvas id="mixed-chart" width="800" height="450"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="row graphs">
				<div class="col-md-6">
					<div class="card h-100">
						<div class="card-body">
							<h3 class="card-title">Sales Statistics</h3>
							<canvas id="bar-chart-grouped" width="800" height="450"></canvas>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card h-100">
						<div class="card-body">
	                    	<h3 class="card-title">Total Revenue</h3>
							<div id="bar-charts"></div>
	                	</div>
					</div>
				</div>

				
			</div>
			
			<div class="row graphs">
				<div class="col-md-6">
					<div class="card h-100">
	                    <div class="card-body">
	                    	<h3 class="card-title">Yearly Projects</h3>
	                      <canvas id="bar-chart" width="800" height="550"></canvas>
	                    </div>
	                </div>
				</div>
				<div class="col-md-6">
					<div class="card h-100">
	                    <div class="card-body">
	                    	<h3 class="card-title">Number of Employees</h3>
	                      <canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
	                    </div>
	                </div>
				</div>
			</div>
			
			<div class="row graphs">
				<div class="col-md-6 mb-0"> 
					<div class="card h-100">
	                  <div class="card-body">
	                  	<h3 class="card-title">Total Lead</h3>
	                     <canvas id="pie-chart" width="800" height="450"></canvas>
	                  </div>
	                </div>
					
				</div>
				<div class="col-md-6 mb-0">
					
					<div class="card h-100 mb-0">
	                    <div class="card-body">
	                    	<h3 class="card-title">Total Sales</h3>
	                     <div id="chart"></div>
	                    </div>
	                </div>
				</div>
				
			</div>
			
			
		</div>			
	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@component('components.modal-popup')                
@endcomponent
@component('components.theme-settings')                
@endcomponent
@endsection