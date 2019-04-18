<section class="more-info">
    <h4 class="more-info__heading">Похожие акции <span class="more-info__heading--num">({{count($similars)}})</span></h4>
    <div class="owl-carousel carousel">
        @foreach($similars as $similar)
        <div class="owl-item-block">
            <a href="{{route('site.action.show',['action_alias'=>$similar->code])}}" title="">
                <img src="{{$similar->img}}" class="owl-images" alt="">
            </a>
            <a
                    href="{{route('site.action.show',['action_alias'=>$similar->code])}}"
                    title="" class="more-info__heading--like">
                {{$similar->title}}
            </a>
        </div>
        @endforeach
    </div>
</section>