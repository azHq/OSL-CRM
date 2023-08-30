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
    <script type="text/javascript">
        function callbackThen(response) {
            // read Promise object
            response.json().then(function(data) {
                if (data.success && data.score > 0.5) {
                    console.log('valid recpatcha');
                } else {
                    document.getElementById('login-form').addEventListener('submit', function(event) {
                        event.preventDefault();
                        alert('recpatcha error');
                    });
                }
            });
        }

        function callbackCatch(error) {
            console.error('Error:', error)
        }
    </script>
  <!-- {!! htmlScriptTagJsApi([
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch',
]) !!} -->
</head>

<body class="">
    @yield('content')
    @include('layout.partials.footer-scripts')
    @stack('script')
</body>

</html>