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
        .color-change-2x {
            -webkit-animation: color-change-2x 5s linear infinite alternate both;
                    animation: color-change-2x 5s linear infinite alternate both;
        }
        @-webkit-keyframes color-change-2x {
          0% {
            background: #19dcea;
          }
          100% {
            background: #b22cff;
          }
        }
        @keyframes color-change-2x {
          0% {
            background: #19dcea;
          }
          100% {
            background: #b22cff;
          }
        }
    </style>
</head>
<body class="color-change-2x">
    @include('layouts.nav')
    @yield('content')
    <!-- Scripts -->
    <script src="/js/bootstrap-notify.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/tether.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
