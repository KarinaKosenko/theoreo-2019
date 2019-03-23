@extends('admin.layouts.base')
@push('head_styles')
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ admin_asset('css/skins/skin-blue.min.css') }}">
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
@endpush