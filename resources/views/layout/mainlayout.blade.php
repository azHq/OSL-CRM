<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.partials.head')
  @stack('style')
</head>

<body id="skin-color" class="inter">
  @if(!Route::is(['login','register','error-404','error-500']))
  @include('layout.partials.header')
  @include('layout.partials.nav')
  @endif

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <div id="page-view">

    </div>

  </div>
  <!-- /Page Wrapper -->

  </div>
  <!-- /Main Wrapper -->
  @include('layout.partials.footer-scripts')
  @stack('script')
  @if(!Route::is(['login','register','error-404','error-500']))
  <script>
    $(document).ready(function() {
      var url = window.location.href;
      gotoRoute(url);
    });
  </script>
  @endif
</body>

</html>