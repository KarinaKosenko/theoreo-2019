<div class="wrapper">
    <div class="content-wrapper">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                @if(isset($action))
                    Редактирование "{{$action->title}}"
                @else
                    Добавление акции
                 @endif
                </h3>
            </div>
            <form method="post" action="
                    @if(isset($action))
                    {{route( 'actions.update',['action' =>$action->id] )}}
                    @else
                    {{route( 'actions.store' )}}
                    @endif
                    ">
                @csrf
                @if(isset($action))
                    @method('PUT')
                    <input type="hidden" name="current_id" value="{{$action->id ?? ''}}">
                @endif
                    <div class="box-body">
                @if ($errors->has('title'))
                    <div class="form-group has-error">
                    <label for="name">Название акции* ({{$errors->first('title')}})</label>
                @else
                    <div class="form-group">
                    <label for="name">Название акции*</label>
                @endif
                    <input type="text"
                           class="form-control"
                           id="title"
                           name="title"
                           placeholder="Введите название"
                           value="{{old('title',$action->title ?? '')}}">
                   </div>
               @if ($errors->has('brand_id'))
                   <div class="form-group has-error">
                   <label for="brand_id">Бренд* ({{$errors->first('brand_id')}})</label>
                @else
                    <div class="form-group">
                    <label for="brand_id">Бренд*</label>
                @endif
                    <select class="form-control select2 select2-hidden-accessible"
                            tabindex="-1" aria-hidden="true" name="brand_id">
                        @if(!isset($action))
                        <option disabled value="" selected>Выберете бренд</option>
                        @endif
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}"
                        @if(old('brand_id',$action->brand_id ?? '') == $brand->id)
                        selected
                                @endif>
                            {{$brand->name}}
                        </option>
                            @endforeach
                     </select>
               </div>


                @if ($errors->has('text'))
                    <div class="form-group has-error">
                    <label for="text">Описание акции* ({{$errors->first('text')}})</label>
                @else
                    <div class="form-group">
                    <label for="text">Описание акции*</label>
                @endif
                    <textarea class="form-control"
                              rows="3" name="text"
                              placeholder="Enter ...">{{old('text',$action->text ?? '')}}</textarea>
                    </div>

                    @if ($errors->has('type'))
                    <div class="form-group has-error">
                        <label for="type">Вид акции* ({{$errors->first('type')}})</label>
                        @else
                        <div class="form-group">
                        <label for="type">Вид акции*</label>
                            @endif
                        <div class="radio">
                            <label>
                                <input type="radio" name="type"
                                       value="discount"
                                       @if(old('type',$action->type ?? '') == 'discount')
                                       checked
                                        @endif
                                >
                                Скидка
                            </label>
                            <label>
                                <input type="radio" name="type"
                                       value="sale"
                                       @if(old('type',$action->type ?? '') == 'sale')
                                       checked
                                        @endif
                                >
                                Распродажа
                            </label>
                        </div>
                    </div>

                            @if ($errors->has('date_start'))
                            <div class="form-group has-error">
                            <label for="date_start">Дата начала акции* ({{$errors->first('date_start')}})</label>
                            @else
                            <div class="form-group">
                            <label for="date_start">Дата начала акции*</label>
                            @endif

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text"
                                           class="form-control pull-right datepicker"
                                           name="date_start" id="date_start"
                                           value="{{old('date_start',$action->date_start ?? '')}}"
                                           >
                                </div>
                            </div>

                            @if ($errors->has('date_end'))
                                <div class="form-group has-error">
                                <label for="date_end">Дата завершения акции* ({{$errors->first('date_end')}})</label>
                            @else
                                <div class="form-group">
                                <label for="date_end">Дата завершения акции*</label>
                            @endif

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text"
                                               class="form-control pull-right datepicker"
                                               name="date_end" id="date_end"
                                               value="{{old('date_end',$action->date_end ?? '')}}"
                                        >
                                    </div>
                                </div>

                @if ($errors->has('phone'))
                    <div class="form-group has-error">
                    <label for="phone">Телефоны ({{$errors->first('phone')}})</label>
                @else
                    <div class="form-group">
                    <label for="phone">Телефоны</label>
                @endif
                    <input type="text"
                           class="form-control"
                           id="phone" name="phone"
                           placeholder=""
                           value="{{old('phone',$action->phone ?? '')}}">
                   </div>

                @if ($errors->has('address'))
                    <div class="form-group has-error">
                    <label for="address">Адрес ({{$errors->first('address')}})</label>
                @else
                    <div class="form-group">
                    <label for="address">Адрес</label>
                @endif
                    <input type="text" class="form-control"
                           id="address" name="address"
                           placeholder="Введите адрес проведения"
                           value="{{old('address',$action->address ?? '')}}">
                </div>

                @if ($errors->has('category_id'))
                    <div class="form-group has-error">
                    <label for="category_id">Категория* ({{$errors->first('category_id')}})</label><br>
                @else
                    <div class="form-group">
                    <label for="category_id">Категория*</label><br>
                        @endif
                    <select class="form-control select2 select2-hidden-accessible"
                            tabindex="-1" aria-hidden="true" name="category_id">
                        @if(!isset($action))
                            <option disabled value="" selected>Выберете категорию</option>
                        @endif
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if(old('category_id',$action->category_id ?? '') == $category->id)
                                    selected
                                    @endif>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    </div>

                    @if ($errors->has('tags'))
                        <div class="form-group has-error">
                        <label for="tags">Теги ({{$errors->first('tags')}})</label>
                    @else
                        <div class="form-group">
                        <label for="tags">Теги</label>
                            @endif
                            <input type="text" id="tags" class="form-control"
                                   name="tags" value="{{old('tags',$tags ?? '')}}">

                    </div>

                @if ($errors->has('img'))
                    <div class="form-group has-error">
                    <label for="img">Изображение ({{$errors->first('img')}})</label>
                @else
                    <div class="form-group">
                    <label for="img">Изображение</label>
                @endif
                        <input type="text" id="img" class="form-control"
                               name="img" onchange="changeImg()"
                               value="{{old('img',$action->img ?? '')}}">
                        <img src="{{old('img',$action->img ?? '')}}" id="logo">

                    </div>


                    <div class="box-footer">
                        <button type="submit"
                                class="btn btn-primary">
                            @if(isset($action))
                                Сохранить
                            @else
                                Создать
                            @endif
                        </button>
                        <a type="button" href="{{ URL::previous() }}"
                                class="btn btn-primary">
                            Назад
                        </a>
                    </div>
            </form>
        </div>
    </div>
</div>

@push('app_scripts')
    <script>
        function changeImg() {
            let url=$('#img').val();
            $('#logo').attr('src',url);
        }

        $(function() {
                $('.datepicker').datepicker({dateFormat:'yy-mm-dd',});
        })
    </script>
@endpush