<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="CRMS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{--meta for form--}}
<meta property="og:url" content="http://localhost:8000/metaforms">
<meta property="fb:app_id" content="CRMS_ADMIN">
<meta property="og:form_id" content="CRMS-form-id">

<title>@yield('title')</title>
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{url('assets/img/logo-new.png')}}" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" />
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/fontawesome/css/all.min.css')}}" />
<!--<link rel="stylesheet" href="{{url('assets/plugins/fontawesome/css/fontawesome.min.css')}}">-->
<link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}" />
<!-- Feathericon CSS -->
<link rel="stylesheet" href="{{url('assets/css/feather.css')}}" />
<!--font style-->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600&display=swap" rel="stylesheet" />
<!-- Lineawesome CSS -->
<link rel="stylesheet" href="{{url('assets/css/line-awesome.min.css')}}" />
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/select2/css/select2.min.css')}}" />
<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}" />
<!-- Tagsinput CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" />
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/datatables/datatables.min.css')}}" />
<!-- Chart CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/morris.js/morris.css')}}" />
<!-- Ck Editor -->
<link rel="stylesheet" href="{{url('assets/css/ckeditor.css')}}" />
<!-- Summernote CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/summernote/dist/summernote-bs4.css')}}" />
<!-- Theme CSS -->
<link rel="stylesheet" href="{{url('assets/css/theme-settings.css')}}" />
<!-- Main CSS -->
<link rel="stylesheet" href="{{url('assets/css/style.css')}}" class="themecls" />

<link rel="stylesheet" href="{{url('assets/css/datetimepicker.css')}}"/>
<!-- <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}"/> -->
<!-- Custom Nav CSS -->
<link rel="stylesheet" href="{{url('assets/css/custom-nav.css')}}" />
<!-- jquery confirmation -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" />
<!-- full calendar css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css" />
<!-- toast css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

<style>
    .main-wrapper {
        background-image: url('../assets/img/sidebar_card_white.png');
    }

    .account-page {
        background-image: url('../assets/img/sidebar_card_white.png');
    }

    .url {
        cursor: pointer;
    }

    #page-view {
        padding-top: 1em;
    }
</style>

