<?php $page="blank-page";?>
@extends('layout.mainlayout')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
                @component('components.breadcrumb')                
                    @slot('title') Blank Page  @endslot
                    @slot('li_1') Dashboard @endslot
                    @slot('li_2') Blank Page @endslot
                    @slot('li_3') <i class="la la-columns"></i> @endslot
                @endcomponent

                <!-- Content Starts -->
                    <p>Content Starts Here</p>
                <!-- /Content End -->
                
            </div>
            <!-- /Page Content -->
            
        </div>
        <!-- /Page Wrapper -->
        
    </div>
    <!-- /Main Wrapper -->
    @component('components.modal-popup')                
    @endcomponent
    @component('components.theme-settings')                
    @endcomponent
@endsection