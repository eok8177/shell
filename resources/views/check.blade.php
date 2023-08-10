@extends('layouts.iframe')
@section('content')
<div class="layer_main">
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
                    <input type="tel" 
                        oninput="this.value = this.value.replace(/[^\wа-яА-Я0-9]/g, '');if (this.value.length > 8) {this.value = this.value.substring(0,8);}"
                        name="txtCode" value='' minlength="8" maxlength="8" class="inpt notnull"
                        placeholder="{{$messages['placeholder'] ?? 'Введіть код тут'}}"
                        data-nullmsg="{{$messages['empty_text'] ?? 'Пожалуйста, введите код. Поле не может быть пустым'}}"
                        data-regex="/^.{8}$/"
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
        </div>
    </form>
</div>
@endsection
