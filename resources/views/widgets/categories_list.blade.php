<div class="row-fluid">
    <div class="box-list">
        <div class="category-box col-md-24 anim js-box-list" data-box-list="category">
            <nav class="menu anim" role="navigation">
                <ul class="list-inline list-unstyled menu__list">
                    @foreach($categories as $category)
                    <li class="menu__item">
                        <input id="{{$category->code}}"
                               class="menu__input"
                                data-href="{{route('site.action.category',[
                                'category_code' => $category->code
                                ])}}"
                               type="checkbox">
                        <label for="{{$category->code}}"><i class="ico ico-arrow pull-left"></i>{{$category->name}}</label>
                    </li>
                    @endforeach
                 </ul>
            </nav>
        </div>
    </div>
</div>


@push('botton-scripts')
    <script>
        $('.menu__input').click(function(){
            window.location.href = $(this).data('href');
        });
        $(function(){
            if(window.SETTING.activeCategory){
                $('#' + window.SETTING.activeCategory).prop('checked', true);
            }
        })
    </script>
@endpush