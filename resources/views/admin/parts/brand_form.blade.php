<div class="wrapper">
    <div class="content-wrapper">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                @if(isset($brand))
                    Редактирование "{{$brand->name}}"
                @else
                    Добавление бренда
                 @endif
                </h3>
            </div>
            <form method="post" action="
                    @if(isset($brand))
                    {{route( 'brands.update',['brand' =>$brand->id] )}}
                    @else
                    {{route( 'brands.store' )}}
                    @endif
                    ">
                @csrf
                @if(isset($brand))
                    @method('PUT')
                    <input type="hidden" name="current_id" value="{{$brand->id ?? ''}}">
                @endif
                    <div class="box-body">
                @if ($errors->has('name'))
                    <div class="form-group has-error">
                    <label for="name">Имя бренда* ({{$errors->first('name')}})</label>
                @else
                    <div class="form-group">
                    <label for="name">Имя бренда*</label>
                @endif
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Введите название"
                           value="{{old('name',$brand->name ?? '')}}">
                   </div>
               @if ($errors->has('type'))
                   <div class="form-group has-error">
                   <label for="type">Тип бренда ({{$errors->first('type')}})</label>
                @else
                    <div class="form-group">
                    <label for="type">Тип бренда</label>
                @endif
                    <select class="form-control select2 select2-hidden-accessible"
                            tabindex="-1" aria-hidden="true" name="type">

                        <option disabled value=""
                                @if(!isset($brand))
                                selected
                                @endif>
                            Выберете тип бренда</option>
                        <option value="federal_brand"
                        @if(old('type',$brand->type ?? '') == 'federal_brand')
                        selected
                                @endif>
                            Федеральный бренд
                        </option>
                        <option value="internet_shop"
                        @if(old('type',$brand->type ?? '') == 'internet_shop')
                        selected
                                @endif>
                            Интернет-магазин
                        </option>

                     </select>
               </div>


                @if ($errors->has('site_url'))
                    <div class="form-group has-error">
                    <label for="site_url">Ссылка на сайт ({{$errors->first('site_url')}})</label>
                @else
                    <div class="form-group">
                    <label for="site_url">Ссылка на сайт</label>
                @endif
                    <input type="text" class="form-control"
                           id="site_url" name="site_url" placeholder=""
                           value="{{old('site_url',$brand->site_url ?? '')}}">
                    </div>


                @if ($errors->has('vk_url'))
                    <div class="form-group has-error">
                    <label for="vk_url">Ссылка группы VK ({{$errors->first('vk_url')}})</label>
                @else
                    <div class="form-group">
                        <label for="vk_url">Ссылка группы VK</label>
                        @endif
                        <input type="text" class="form-control"
                               id="vk_url" name="vk_url" placeholder=""
                               value="{{old('vk_url',$brand->vk_url ?? '')}}">
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
                           value="{{old('phone',$brand->phone ?? '')}}">
                   </div>

                @if ($errors->has('sell_address'))
                    <div class="form-group has-error">
                    <label for="sell_address">Адрес ({{$errors->first('sell_address')}})</label>
                @else
                    <div class="form-group">
                    <label for="sell_address">Адрес</label>
                @endif
                    <input type="text" class="form-control"
                           id="sell_address" name="sell_address"
                           placeholder="Введите адрес компании"
                           value="{{old('sell_address',$brand->Sell_address ?? '')}}">
                </div>

                @if ($errors->has('categories'))
                    <div class="form-group has-error">
                        <label for="sell_address">Категории*
                            ({{$errors->first('categories')}}
                            )</label><br>
                        @else
                            <div class="form-group">
                                <label for="sell_address">Категории*</label><br>
                                @endif
                                @foreach($categories as $category)
                                    <div class="checkbox div-inline">
                                        <label>
                                            <input type="checkbox"
                                                   name="categories[]"
                                                   value="{{$category->id}}"
                                                   @if(old('categories'))

                                                   @elseif(in_array($category->id,$brand_catId ?? []))
                                                   checked
                                                    @endif
                                            >
                                            {{$category->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                @if ($errors->has('logo'))
                    <div class="form-group has-error">
                        <label for="img">Логотип
                            бренда
                            ({{$errors->first('img')}}
                            )</label>
                        @else
                            <div class="form-group">
                                <label for="img">Логотип
                                    бренда</label>
                                @endif
                                <input type="text"
                                       id="img"
                                       class="form-control"
                                       name="img"
                                       onchange="changeImg()"
                                       value="{{old('img',$brand->img ?? '')}}"
                                >
                                <img src="{{old('img',$brand->img ?? '')}}"
                                     id="logo">


                                {{--<p class="help-block">Example block-level help text here.</p>--}}
                            </div>
                    </div>

        <div class="box-footer">
            <button type="submit"
                    class="btn btn-primary">
                @if(isset($brand))
                    Сохранить
                    @else
                    Создать
                    @endif
            </button>
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
    </script>
@endpush