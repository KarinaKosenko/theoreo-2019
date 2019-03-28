<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Froggle' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="kywords" content="">
    <meta name="description" content="">
    <meta name="author" content="parapix.ru">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    @stack('styles')
    @stack('head-scripts')

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
    @section('header')
        <header class="header anim js-header">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row-fluid">
                    @include('blocks.header')
                    @include('modals.cities_select')
                    @include('widgets.search_form')
                </div>
                    @include('widgets.categories_list')
            </div>
        </div>
        </header>
    @show

<main class="main" role="main">
    <div class="wrapper">
        <div class="container-fluid">

            @section('sort_cat')
                @include('widgets.sorting')
            @show

            @yield('content')

            @section('button_load')
                @include('widgets.button_loader')
            @show
        </div>
    </div>
</main>

@include('blocks.footer')
@include('modals.city_form')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('jquery-1.11.3.min.js');</script>
<script src="{{asset('js/plugins.min.js')}}"></script>
<script src="{{asset('js/main.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@stack('botton-scripts')

</body>
</html>