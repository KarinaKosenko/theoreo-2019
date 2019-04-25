@extends('admin.layouts.primary')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Список брендов
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.main.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Управление брендами</li>
            </ol>
        </section>
        <section class="content">

            <div class="row">

                <div class="col-xs-12">
                    <div class="box">
                        {{--<div class="box-header">--}}
                            {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
                        {{--</div>--}}


                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                    <a
                                            href="{{route('brands.create')}}"
                                            name="success"
                                            class="btn btn-block btn-success">
                                        <strong>+</strong> Добавить бренд
                                    </a>
                                </div>
                            </div>
                        @if (session('message'))
                            <li>{{ session('message') }}</li>
                    @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-brands" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя бренда</th>
                                    <th>Дата создания</th>
                                    <th>Дата изменения</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->created_at}}</td>
                                    <td>{{$brand->updated_at}}</td>
                                    <td>

                                        <a class="btn btn-default"
                                           href="{{ route('brands.edit',['brand' => $brand->id]) }}"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <div class="div-inline">
                                            <form
                                                    action="{{ route('brands.destroy',['brand' => $brand->id]) }}"
                                                    method="post"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$brand->id}}">
                                                <button class="btn btn-default"
                                                   onclick="return confirm('Удалить {{$brand->name}}?')"
                                                >
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя бренда</th>
                                    <th>Дата создания</th>
                                    <th>Дата изменения</th>
                                    <th>Управление</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

    @endsection

@push('app_scripts')

    <script>
        $(function () {
            $('#table-brands').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            });
        })
    </script>
@endpush