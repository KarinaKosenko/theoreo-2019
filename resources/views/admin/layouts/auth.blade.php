@extends('admin.layouts.base')
@section('head_styles')
    <link rel="stylesheet" href="admin-assets/plugins/iCheck/square/blue.css">
@endsection
@section('layout')
@yield('page-auth')
@endsection
@section('app_scripts')
    <script src="admin-assets/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
@endsection
