<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
    @stack('style')
</head>

<body class="account-page">
    @yield('content')
    @include('layout.partials.footer-scripts')
    @stack('script')
</body>

</html>