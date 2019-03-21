@extends('admin.layouts.base')
@section('head_styles')
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="admin-assets/css/skins/skin-blue.min.css">
@endsection
@section('layout')
<div class="wrapper">
    @include('admin.parts.header')
    @include('admin.parts.main-sidebar')
    @yield('main')
    @include('admin.parts.footer')
    @include('admin.parts.control-sidebar')
</div>
@endsection
@section('app_scripts')
    <script src="admin-assets/js/adminlte.min.js"></script>
@endsection