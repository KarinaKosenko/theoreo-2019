@extends('layouts.base')

@section('content')

                <div class="row-fluid cont-flex">

                    <div id="sidebar_left">
                        <div class="all">
                            <input type="checkbox" name="all" id="all" />
                            <label for="all"></label>
                        </div>
                        <div class="accordion">
                            <form class="form" method="post">
                                <div class="group-1"><h3>Кухни</h3>
                                    <div class="trigger">
                                        <input class="check__input" type="checkbox" id="checkbox-1" name="checkbox-1" value="1" checked/>
                                        <label for="checkbox-1" class="checkbox">
                                            Европейская <i></i>
                                        </label>
                                    </div>
                                    <div class="trigger">
                                        <input class="check__input" type="checkbox" id="checkbox-2" name="checkbox-2" value="2"/>
                                        <label for="checkbox-2" class="checkbox">
                                            Русская <i></i>
                                        </label>
                                    </div>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-3" name="checkbox-3" value="3"/>
                                        <label for="checkbox-3" class="checkbox">
                                            Итальянская <i></i>
                                        </label>
                                    </div>
                                </div>

                                <div class="group-2"><h3>Услуги</h3>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-4" name="checkbox-4" value="4" checked/>
                                        <label for="checkbox-4" class="checkbox">
                                            С доставкой <i></i>
                                        </label>
                                    </div>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-5" name="checkbox-5" value="5" />
                                        <label for="checkbox-5" class="checkbox">
                                            В кафе <i></i>
                                        </label>
                                    </div>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-6" name="checkbox-6" value="6"/>
                                        <label for="checkbox-6" class="checkbox">
                                            Круглосуточно <i></i>
                                        </label>
                                    </div><br>
                                </div>
                                    <div>
                                        <input type="button" class="btn-1" value="Сбросить">
                                        <input type="submit" class="btn-2" value="Применить">
                                    </div>

                            </form>
                        </div>
                    </div>
                    <div id="container_content">
                        @foreach($actions as $action)
                            @include('widgets.action_std')
                        @endforeach
                    </div>

                    <div id="clear"></div>

                </div>

@endsection
@push('botton-scripts')
    <script>
        $("#all").change(function() {
            if(this.checked) {
                $(".accordion").show();
            }else
            {
                $(".accordion").hide();
            }
        })
        $('.group-1 input:checkbox').click(function(){
            if ($(this).is(':checked')) {
                $('.group-1 input:checkbox').not(this).prop('checked', false);
            }
        });
        $('.group-2 input:checkbox').click(function(){
            if ($(this).is(':checked')) {
                $('.group-2 input:checkbox').not(this).prop('checked', false);
            }
        });
    </script>
@endpush


