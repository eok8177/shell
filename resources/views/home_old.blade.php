@extends('layouts.app')

@section('content')
<nav>
    <div class="nav">
        <div class="logo" onclick="location.href='/'">{!! $header_left->text ?? 'СИСТЕМА ПРОВЕРКИ ПОДЛИННОСТИ ПРОДУКЦИИ «ШЕЛЛ»'!!}</div>
        <div id="btn" class="btn"><span></span><span></span><span></span></div>
        <div id="navbar" class="navbar">
            <ul class="layer_clcik">
                <li><a href="#">{!! $header_right->text !!}</a></li>
            </ul>
        </div>  
    </div>
</nav>
<div class="layer_main">
    <div class="banner">
        <div class="slick">
            @foreach($banners as $banner)
            {{-- <div class=""><img src="/resize/994/320/?img={{urlencode($banner->image)}}" /></div> --}}
            <div class=""><img src="{{ url('/resize/994/320/?img='.urlencode($banner->image)) }}" alt="Shell" /></div>
            @endforeach
        </div>
    </div>

    <form class="container form" action="#" method="post" accept-charset="UTF-8">
        <div class="cn_main">
            <div class="cnt">
                <div class="cnt_left">
                    <div class="text">{!! $left_text->text !!}</div>
                    <div class="slide_cnt index-below-action">
                        <div id="slider" class="slider left">
                            <div id="pageSlide">
                                <input id="captcha" class="valid" type="hidden" data-validmsg="Протягніть бігунок вправо"
                                value="0">
                                <button id="label" class="label" title="Протягніть бігунок вправо"></button><span id="lableTip" data-hasslider="Дякуємо!" data-noslider="Протягніть бігунок вправо">Протягніть бігунок вправо</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cnt_right">
                    <div class="text">{!! $right_text->text !!}</div>

                    <label for="txtCode">{{$messages['placeholder'] ?? 'Введіть код тут'}}</label>
                    <input type="text" 
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');if (this.value.length > 8) {this.value = this.value.substring(0,8);}"
                        name="txtCode" value='' maxlength="8" class="inpt notnull"
                        placeholder="{{$messages['placeholder'] ?? 'Введіть код тут'}}"
                        data-nullmsg="{{$messages['empty_text'] ?? 'Пожалуйста, введите код. Поле не может быть пустым'}}"
                        data-regex="/^\d{8}$/"
                        data-logicmsg="{{$messages['less_input'] ?? 'Вы ввели менее 8 цифр. Пожалуйста, проверьте и введите правильный код'}}"
                        id="txtCode" 
                        autocomplete="off"
                    />
                    <span class="small-text">{{$messages['required_string'] ?? '*Код можна перевірити тільки один раз'}}</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="cnt1">
                <div id="msg"></div>
                <button type="submit" class="check sub">Перевірити код</button>
                <div class="clear"></div>
            </div>

            <div class="t_url">
                {!! $footer->text !!}
            </div>
        </div>
    </form>

    <div class="pop_layer none">
        {!! $popup->text !!}
        <button class="btn-close hideGif">x</button>
    </div>
</div>
@endsection
