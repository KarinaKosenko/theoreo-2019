@extends('admin.layouts.base')
@push('head_styles')
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ admin_asset('css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ admin_asset('font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ admin_asset('Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ admin_asset('datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ admin_asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ admin_asset('css/custom.css')}}">
@endpush
@section('child-layout')
<div class="wrapper">
    @include('admin.parts.header')
    @include('admin.parts.main-sidebar')
    @yield('content')
    @include('admin.parts.footer')
</div>
@endsection
@push('app_scripts')
    <script src="{{ admin_asset('js/adminlte.min.js') }}"></script>
    <script src="{{ admin_asset('jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ admin_asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{ admin_asset('jquery/jquery.dataTables.min.js')}}"></script>
    <script src="{{ admin_asset('bootstrap/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{ admin_asset('jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ admin_asset('fastclick/lib/fastclick.js')}}"></script>

    <script src="{{ admin_asset('js/demo.js')}}"></script>
@endpush