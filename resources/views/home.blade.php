@extends('layouts.app')

@section('content')
<nav>
    <div class="nav">
        <div class="logo" onclick="location.href='/'">СИСТЕМА ПРОВЕРКИ ПОДЛИННОСТИ ПРОДУКЦИИ «ШЕЛЛ»</div>
        <div id="btn" class="btn"><span></span><span></span><span></span></div>
        <div id="navbar" class="navbar">
            <ul class="__layer_clcik">
                <li><a href="https://shell.ua" target="_blank">Информация о защитном коде</a></li>
            </ul>
        </div>  
    </div>
</nav>
<div class="layer_main">
    <div class="banner">
        <div class="slick">
            @foreach($banners as $banner)
            <div class=""><img src="{{$banner->image}}" /></div>
            @endforeach
        </div>
    </div>

    <form class="container form" action method="post" accept-charset="UTF-8">
        <div class="cn_main">
            <div class="cnt">
                <div class="cnt_left">
                    <p class="text">Спасибо, что приобрели продукцию «Шелл».<br />Воспользуйтесь нашей системой, чтобы проверить подлинность приобретенных товаров.</p>

                    <div class="slide_cnt index-below-action">
                        <div id="slider" class="slider left">
                            <div id="pageSlide">
                                <input id="captcha" class="valid" type="hidden" validmsg="Протяните бегунок вправо"
                                value="0">
                                <span id="label" class="label"></span><span id="lableTip" hasslider="Спасибо!" noslider="Протяните бегунок вправо">Протяните бегунок вправо</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cnt_right">
                    <p class="">Введите 8-значный цифровой код для проверки подлинности</p>
                    <p style="font-weight: bold" class="">Пожалуйста, сотрите верхний слой стикера, чтобы найти код</p>

                    <input type="text" 
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');if (this.value.length > 8) {this.value = this.value.substring(0,8);}"
                        name="txtCode" value='' maxlength="8" class="inpt notnull"
                        placeholder="Введите код здесь"
                        nullmsg="Пожалуйста, введите код. Поле не может быть пустым"
                        regex="/^\d{8}$/"
                        logicmsg="Вы ввели менее 8 цифр. Пожалуйста, проверьте и введите правильный код"
                        id="txtCode" 
                    />
                </div>
                <div class="clear"></div>
            </div>
            <div class="cnt1">
                <div id="msg"></div>
                <input type="button" value="Продолжить" class="check sub" />
                <div class="clear">
                </div>
            </div>

            <p class="t_url">
                <span>Invent Group | &copy; Все права защищены 2020</span> <span></span>
            </p>
        </div>
    </form>
</div>
@endsection
