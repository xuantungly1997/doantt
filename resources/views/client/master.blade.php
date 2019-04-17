<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('frontend/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/bootstrap/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('frontend/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <script src="{{asset('frontend/js/menu.js')}}"></script>
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
</head>
<body>
<!-- ====uptop-===== -->
<script type="text/javascript" src="{{asset('frontend/js/uptop.js')}}"></script>
<div id="stop" class="scrollTop" >
    <span class="run"><i class="fas fa-angle-double-up"></i></span>
</div>
<!-- =====end up top==== -->
@include('client.header')

@yield('content')

@include('client.footer')
</body>
</html>