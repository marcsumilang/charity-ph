<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ mix('administrator/css/app.css') }}" rel="stylesheet">
    <script>

        var base_url = "{{url('/')}}";
        var prefix = "/" + "{{Config::get('urlsegment.admin_prefix')}}";

    </script>

</head>
<body>

<div class="wrapper" id="app">


    @if(Auth::guard('admin')->check())
        <div class="sidebar">
            {{--@include('admin.cores.includes.sidebar')--}}
            <admin-sidebar-component></admin-sidebar-component>
        </div>

        <div class="main-panel">
            <admin-navbar-component></admin-navbar-component>
            @yield('content')

            {{--@include('admin.cores.include
            s.footer')--}}
        </div>
    @else

        @yield('content')

    @endif


</div>


<!-- Scripts -->
<script src="{{ mix('administrator/js/app.js') }}"></script>

</body>
</html>
