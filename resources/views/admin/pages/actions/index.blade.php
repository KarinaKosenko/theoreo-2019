@extends('admin.layouts.primary')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Список акций
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.main.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Управление акциями</li>
            </ol>
        </section>
        <section class="content">

            <div class="row">

                <div class="col-xs-12">
                    <div class="box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                    <a
                                            href="{{route('actions.create')}}"
                                            name="success"
                                            class="btn btn-block btn-success">
                                        <strong>+</strong> Добавить акцию
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
                                    <th>Название акции</th>
                                    <th>Имя бренда</th>
                                    <th>Статус</th>
                                    <th>Дата создания</th>
                                    <th>Дата изменения</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($actions as $action)
                                    <tr>
                                    <td>{{$action->id}}</td>
                                    <td><a href="{{ route('actions.show',['action'=>$action->id]) }}">{{$action->title}}</a></td>
                                    <td>{{ $action->brand->name }}</td>
                                    <td>@if( $action->is_paid )
                                    Оплачена
                                            @else
                                        Не оплачена
                                            @endif
                                    </td>
                                    <td>{{$action->created_at}}</td>
                                    <td>{{$action->updated_at}}</td>
                                    <td>
                                        <a class="btn btn-default"
                                           href="{{ route('actions.show',['action' => $action->id]) }}"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a class="btn btn-default"
                                           href="{{ route('actions.edit',['action' => $action->id]) }}"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <div class="div-inline">
                                            <form
                                                    action="{{ route('actions.destroy',['action' => $action->id]) }}"
                                                    method="post"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$action->id}}">
                                                <button class="btn btn-default"
                                                   onclick="return confirm('Удалить {{$action->name}}?')"
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
                                    <th>Название акции</th>
                                    <th>Имя бренда</th>
                                    <th>Статус</th>
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