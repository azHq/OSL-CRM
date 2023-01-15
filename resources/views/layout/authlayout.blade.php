<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
    @stack('style')
    <style>
        .login-side-section {

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #c7bad9, #a68fc7, #9077b5, #8869b5);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #c7bad9, #a68fc7, #9077b5, #8869b5);
        }
    </style>
</head>

<body class="">
    @yield('content')
    @include('layout.partials.footer-scripts')
    @stack('script')
</body>

</html>