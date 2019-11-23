<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
    {{-- Custom fonts for this template--}}
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    {{-- Custom styles for this template--}}
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
    @yield('styles')
    <style>
        @media only screen and (min-width:768px) {
            .sidebar_position {
                right: 16% !important;
                position: relative !important;
            }

            .sidebar_width {
                width: 11.5rem !important;
            }
            {{--  .sidebar_width>span{
                color:black !important;
            }  --}}
        }

        @media only screen and (min-width:320px) and (max-width:767px) {
            .sidebar_position {
                right: 24% !important;
                position: relative !important;
            }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.layouts.sidebar')
        {{-- Content Wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">

            {{-- Main Content --}}
            <div id="content">
                @include('admin.layouts.topbar')
                @yield('content')
            </div>
            @include('admin.layouts.footer')
        </div>
    </div>
    {{-- Scroll to Top Button--}}
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>
{{-- Bootstrap core JavaScript--}}
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{-- Core plugin JavaScript--}}
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

{{-- Custom scripts for all pages--}}
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

{{-- Page level plugins --}}
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
@stack('scripts')

</html>
