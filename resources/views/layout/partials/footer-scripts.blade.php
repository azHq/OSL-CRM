<!-- jQuery -->
<script src="{{ URL::asset('/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core JS -->
<script src="{{ URL::asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Slimscroll JS -->
<script src="{{ URL::asset('/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- Form Validation JS -->
<script src="{{ URL::asset('/assets/js/form-validation.js')}}"></script>
<!-- Select2 JS -->
<script src="{{ URL::asset('/assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Datatable JS -->
<script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('/assets/plugins/datatables/datatables.min.js')}}"></script>
<!-- Datetimepicker JS -->
<script src="{{ URL::asset('/assets/js/moment.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Tagsinput JS -->
<script src="{{ URL::asset('/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{ URL::asset('/assets/plugins/sticky-kit/sticky-kit.min.js')}}"></script>
<!-- Mask JS -->
<script src="{{ URL::asset('/assets/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/mask.js')}}"></script>
<!-- Ck Editor JS -->
<script src="{{ URL::asset('/assets/js/ckeditor.js')}}"></script>
<!-- Chart JS -->
<!-- <script src="{{ URL::asset('/assets/plugins/morris.js/morris.js')}}"></script> -->
<script src="{{ URL::asset('/assets/plugins/raphael/raphael.min.js')}}"></script>
<!-- <script src="{{ URL::asset('/assets/js/chart.js')}}"></script> -->
<script src="{{ URL::asset('/assets/js/linebar.min.js')}}"></script>

<!-- <script src="{{ URL::asset('/assets/js/apex.min.js')}}"></script> -->
<!-- Summernote JS -->
<script src="{{ URL::asset('/assets/plugins/summernote/dist/summernote-bs4.js')}}"></script>
<!-- theme JS -->
<script src="{{ URL::asset('/assets/js/theme-settings.js')}}"></script>
<!-- Custom JS -->
<script src="{{ URL::asset('/assets/js/app.js')}}"></script>
<script src="{{ URL::asset('/assets/js/sticky.js')}}"></script>
<!-- jquery confirmation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('.url').on('click', function() {
            var url = $(this).data('href');
            var nav = $(this).data('nav');
            gotoRoute(url, nav);
        });
    });

    function gotoRoute(url, nav = null) {
        if (nav) {
            $('.nav-li').removeClass('active');
            $('#' + nav).addClass('active');
        }
        window.history.pushState("", "", url);
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                $('#page-view').html(data);
            }
        });
    }

    $(window).on('popstate', function(event) {
        // var url = window.location.href;
        var url = "{{ URL::previous() }}";
        var nav = url.split("//")[1];
        nav = nav.split("/")[1];
        gotoRoute(url, nav);
        // window.location.replace(url);
    });

    $(document).ready(function() {
        var referrer = document.referrer;
    });
</script>

<script>
	$(document).ready(function() {

		if ($('.intake-year').length > 0) {
			$('.intake-year').datetimepicker({
				format: 'YYYY',
				icons: {
					up: "fa fa-angle-up",
					down: "fa fa-angle-down",
					next: 'fa fa-angle-right',
					previous: 'fa fa-angle-left'
				}
			});
		}
	});
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.2/index.global.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>   