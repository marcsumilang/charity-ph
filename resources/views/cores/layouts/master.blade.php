<!doctype html>
<html lang="en">
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="/images/favicon.png"/>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Playfair+Display:400,700&display=swap" rel="stylesheet">
    <script async src=“https://www.googletagmanager.com/gtag/js?id=UA-56469068-17“></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script>
        var base_url = "{{url('/')}}";
        var prefix = "/" + "{{Config::get('urlsegment.admin_prefix')}}";

        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-56469068-17');

    </script>
</head>

<body>
<div id="app">
    <public-header-component></public-header-component>

    @yield('content')

    <public-footer-component></public-footer-component>
</div>


<script src="{{mix('/js/app.js')}}"></script>
</body>

</html>
