<?php $page="privacy-policy";?>
@extends('layout.mainlayout')
@section('content')		
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                @component('components.breadcrumb')                
                  @slot('title') Privacy Policy  @endslot
                  @slot('li_1') Dashboard @endslot
                  @slot('li_2') Privacy Policy @endslot
                  @slot('li_3') <i class="fa fa-question-circle" aria-hidden="true"></i> @endslot
                @endcomponent
                <div class="card p-3 mb-0 privacy_policies">
                    <div class="row">
                        <div class="col-sm-12">

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel sodales mauris. Nunc accumsan mi massa, ut maximus magna ultricies et:</p>
                            <ol>
                                <li>Integer quam odio, ullamcorper id diam in, accumsan convallis libero. Duis at lacinia urna.</li>
                                <li>Mauris eget turpis sit amet purus pulvinar facilisis at sed lacus.</li>
                                <li>Quisque malesuada volutpat orci, accumsan scelerisque lorem pulvinar vitae.</li>
                                <li>Vestibulum sit amet sem aliquam, vestibulum nisi sed, sodales libero.</li>
                            </ol>

                            <h4>Aenean accumsan aliquam justo, et rhoncus est ullamcorper at</h4>
                            <p>Donec posuere dictum enim, vel sollicitudin orci tincidunt ac. Maecenas mattis ex eu elit tincidunt egestas. Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a aliquam. Sed dapibus arcu eget egestas hendrerit.</p>

                            <p>Vivamus consectetur metus at nulla efficitur mattis. Aenean egestas eu odio vestibulum vestibulum. Duis nulla lectus, lacinia vitae nibh vitae, sagittis interdum lacus. Mauris lacinia leo odio, eget finibus lectus pharetra ut. Nullam in semper enim, id gravida nulla.</p>

                            <p>Fusce gravida auctor justo, vel lobortis sem efficitur id. Cras eu eros vitae justo dictum tempor.</p>

                            <h4>Etiam sed fermentum lectus. Quisque vitae ipsum libero</h4>
                            <p>Phasellus sit amet vehicula arcu. Etiam pulvinar dui libero, vitae fringilla nulla convallis in. Fusce sagittis cursus nisl, at consectetur elit vestibulum vestibulum:</p>
                            <ul>
                                <li>Nunc pulvinar efficitur interdum.</li>
                                <li>Donec feugiat feugiat pulvinar.</li>
                                <li>Suspendisse eu risus feugiat, pellentesque arcu eu, molestie lorem. </li>
                                <li>Duis non leo commodo, euismod ipsum a, feugiat libero.</li>
                            </ul>
                            <h4>pulvinar</h4> 
                            <p>Sed sollicitudin, diam nec tristique tincidunt, nulla ligula facilisis nunc, non condimentum tortor leo id ex.</p>

                            <p>Vivamus consectetur metus at nulla efficitur mattis. Aenean egestas eu odio vestibulum vestibulum. Duis nulla lectus, lacinia vitae nibh vitae, sagittis interdum lacus. Mauris lacinia leo odio, eget finibus lectus pharetra ut. Nullam in semper enim, id gravida nulla.</p>

                            <p>Donec posuere dictum enim, vel sollicitudin orci tincidunt ac. Maecenas mattis ex eu elit tincidunt egestas. Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a aliquam. Sed dapibus arcu eget egestas hendrerit.Donec posuere dictum enim, vel sollicitudin orci tincidunt ac. Maecenas mattis ex eu elit tincidunt egestas. Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a aliquam. Sed dapibus arcu eget egestas hendrerit.</p>

                            <h4>efficitur</h4>

                            <p>Fusce gravida auctor justo, vel lobortis sem efficitur id. Cras eu eros vitae justo dictum tempor.</p>

                            <p class="mb-0"><strong>Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a aliquam. Sed dapibus arcu eget egestas hendrerit.Donec posuere dictum enim, vel sollicitudin orci tincidunt ac.</strong></p>
                
                        </div>
                    </div>
                </div>
                
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