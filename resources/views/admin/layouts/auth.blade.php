@extends('admin.layouts.base')
@push('head_styles')
    <link rel="stylesheet" href="{{ admin_asset('plugins/iCheck/square/blue.css') }}">
@endpush
@section('child-layout')
@yield('page-auth')
@endsection
@push('app_scripts')
    <script src="{{ admin_asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
@endpush
