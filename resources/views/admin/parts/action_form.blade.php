<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
        @if(isset($action))
            Редактирование "{{$action->title}}"
        @else
            Новая акция
         @endif
        </h3>
    </div>
    <div class="box-body">
    <div class="row">
    <div class="col-sm-12 col-md-9 col-lg-6">

    <form method="post" action="
            @if(isset($action)) {{route( 'actions.update',['action' =>$action->id] )}}
            @else {{route( 'actions.store' )}} @endif ">
        @csrf
        @if(isset($action))
            @method('PUT')
            <input type="hidden" name="current_id" value="{{$action->id ?? ''}}">
        @endif

        <div class="form-group @if ($errors->has('title')) has-error @endif ">
        <label for="name">Название акции* @if ($errors->has('title')) ({{$errors->first('title')}}) @endif </label>
        <input type="text"
               class="form-control"
               id="title"
               name="title"
               placeholder="Введите название"
               value="{{old('title',$action->title ?? '')}}">
        </div>

        <div class="form-group @if ($errors->has('brand_id')) has-error @endif ">
        <label for="brand_id">Бренд* @if ($errors->has('brand_id')) ({{$errors->first('brand_id')}}) @endif </label>
        <select class="form-control"
            tabindex="-1" aria-hidden="true" name="brand_id" id="brand_id">
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

        <div class="form-group @if ($errors->has('text')) has-error @endif ">
        <label for="text">Описание акции* @if ($errors->has('text')) ({{$errors->first('text')}}) @endif </label>
        <textarea class="form-control" rows="7" name="text" id="editor1"
                  placeholder="Enter ...">{{old('text',$action->text ?? '')}}</textarea>
        </div>

        <div class="form-group @if ($errors->has('type')) has-error @endif">
            <label for="type">Вид акции* @if ($errors->has('type')) ({{$errors->first('type')}}) @endif </label>
            <div class="radio">
                <label>
                    <input type="radio" name="type" value="discount"
                           @if(old('type',$action->type ?? '') == 'discount')
                           checked @endif >
                    Скидка
                </label>
                <label>
                    <input type="radio" name="type" value="sale"
                           @if(old('type',$action->type ?? '') == 'sale')
                           checked @endif >
                    Распродажа
                </label>
            </div>
        </div>

        <div class="form-group @if ($errors->has('date_start')) has-error @endif ">
        <label for="date_start">Дата начала акции* @if ($errors->has('date_start'))
                ({{$errors->first('date_start')}})@endif</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker"
                       name="date_start" id="date_start"
                       value="{{old('date_start',$action->date_start ?? '')}}">
            </div>
        </div>

        <div class="form-group @if ($errors->has('date_end'))has-error @endif">
        <label for="date_end">Дата завершения акции* @if ($errors->has('date_end'))
                ({{$errors->first('date_end')}}) @endif</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker"
                       name="date_end" id="date_end"
                       value="{{old('date_end',$action->date_end ?? '')}}">
            </div>
        </div>

        <div class="form-group @if ($errors->has('phone'))has-error @endif">
        <label for="phone">Телефоны @if ($errors->has('phone'))({{$errors->first('phone')}})@endif</label>
        <input type="text" class="form-control"
               id="phone" name="phone" placeholder=""
               value="{{old('phone',$action->phone ?? '')}}">
        </div>

        <div class="form-group @if ($errors->has('address'))has-error @endif">
        <label for="address">Адрес @if ($errors->has('address'))({{$errors->first('address')}}) @endif</label>
        <input type="text" class="form-control"
               id="address" name="address"
               placeholder="Введите адрес проведения"
               value="{{old('address',$action->address ?? '')}}">
        </div>

        <div class="form-group @if ($errors->has('category_id')) has-error @endif">
        <label for="category_id">Категория* @if ($errors->has('category_id'))
                ({{$errors->first('category_id')}}) @endif</label><br>
        <select class="form-control"
                tabindex="-1" aria-hidden="true" name="category_id" id="category_id">
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

        <div class="form-group @if ($errors->has('tags')) has-error @endif ">
        <label for="tag">Теги* @if ($errors->has('tags'))({{$errors->first('tags')}})@endif</label>
        <select class="form-control select2-container--classic" name="tags[]"
                id="tag" multiple="multiple">
            @foreach(array_unique(array_merge($tag_names,old('tags',[]))) as $tag)
                <option value="{{$tag}}" @if (in_array($tag,old('tags',$action_tags ?? []))) selected @endif >{{$tag}}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group @if ($errors->has('img')) has-error @endif">
            <label for="img">Изображение @if ($errors->has('img')) ({{$errors->first('img')}}) @endif
            </label>
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
</div>
</section>

@push('app_scripts')
    <script>
        function changeImg() {
            let url=$('#img').val();
            $('#logo').attr('src',url);
        }

        $(function() {
                $('.datepicker').datepicker({dateFormat:"yy-mm-dd",});
        });

        $(function () {
            CKEDITOR.replace('editor1');
             $('.textarea').wysihtml5();
        });

        $(function() {
            $('#tag').select2({
                placeholder: 'Выберете теги или создайте свои',
                tags: true,
            });
        });
    </script>
@endpush