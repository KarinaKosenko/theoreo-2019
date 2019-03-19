<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta charset="UTF-8">
    <title>Froggle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="kywords" content="">
    <meta name="description" content="">
    <meta name="author" content="parapix.ru">

    <meta property="og:site_name" content="Froggle"/>
    <meta property="og:title" content="Froggle - сайт скидок" />
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://froggle.com"/>
    <meta property="og:image" content="/theme/images/icon/share.png" />
    <meta property="og:description" content="Описание сайта" />

    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/icon/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/icon/apple-touch-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/icon/apple-touch-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/icon/apple-touch-icon-152x152.png')}}">

    <link rel="shortcut icon" href="{{asset('img/icon/favicon.ico')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">

    <link rel="stylesheet" href="{{asset('js/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('js/owl-carousel/owl.theme.css')}}">
</head>
<body>
<noscript>
    <div class="notice notice--warning">
        <div class="container text-center">
            <!--noindex-->
            Внимание! В вашем браузере отключен <b>JavaScript</b>. Для работы с сайтом, <b>включите его</b>.
            <!--/noindex-->
        </div>
    </div>
</noscript>

@include('blocks.header')

<main class="main" role="main">
    <div class="wrapper">
        @yield('content')
    </div>
</main>

@include('blocks.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('jquery-1.11.3.min.js');</script>
<script src="{{asset('js/plugins.min.js')}}"></script>
<script src="{{asset('js/main.min.js')}}"></script>

</body>
</html>