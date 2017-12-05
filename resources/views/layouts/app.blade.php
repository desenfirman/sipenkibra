<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIPENKIBRA</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/animate.css">
    <script src="/js/jquery-3.2.1.min.js"></script>

    <style>
        .container{
            background-color: #ffffff;
        }
 body {
    background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
    background-size: 400% 400%;
    -webkit-animation: Gradient 15s ease infinite;
    -moz-animation: Gradient 15s ease infinite;
    animation: Gradient 15s ease infinite;
}

@-webkit-keyframes Gradient {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}

@-moz-keyframes Gradient {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}

@keyframes Gradient {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}
    </style>
</head>
<body>
    @include('layouts.nav')
    <br>
    <br>
    <br>
    @yield('content')
    <br>
    <br>
    <br>
    <!-- Scripts -->
    <script src="/js/bootstrap-notify.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/tether.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
