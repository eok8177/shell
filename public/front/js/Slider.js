var change = {
  37: -40, // Arrow Left
  38: 0,
  39: 40, // Arrow Right
  40: 0,
}

function Slider(swipestart, min, max, index, IsOk, lableIndex) {
    var _self = this;
    _self.swipestart = swipestart;
    _self.min = min;
    _self.max = max;
    _self.index = index;
    _self.IsOk = IsOk;
    _self.lableIndex = lableIndex;

    var mobile = navigator.userAgent.match(/(iPhone|iPod|Android|ios|iOS|iPad|Backerry|WebOS|Symbian|Windows Phone|Phone)/i) ? true : false;

    _self.mobile = mobile;

    var width = document.body.clientWidth;

    var isMobile = width <= 767;
    _self.isMobile = isMobile;
}


Slider.prototype.Init = function () {
    //document.getElementById("btnSubmit").disabled = true;
    var _self = this;
    _self.index = 0;
    $("#label").on("mousedown", function (event) {
        var e = event || window.event;
        _self.lableIndex = e.clientX - this.offsetLeft;
        if (!_self.IsOk)
            _self.HanderIn();
    });

    $("#pageSlide").on("mousemove", function (event) {
        if (!_self.IsOk)
            _self.HanderMove(event);
    });

    $(document).on("mouseup", function (event) {
        if (!_self.IsOk)
            _self.HanderOut();

    });


    $("#label").on("touchstart", function (event) {
        try {
            var e = event || window.event;
            //event.originalEvent.changedTouches[0].clientX //event.originalEvent.pageX
            _self.lableIndex = event.originalEvent.changedTouches[0].clientX - this.offsetLeft;
            if (!_self.IsOk)
                _self.HanderIn();

        } catch (e) {
            console.log(navigator.appVersion + "TouchEvent！" + e.message);
        }
    });

    $("#pageSlide").on("touchmove", function (event) {
        try {
            if (!_self.IsOk)
                _self.HanderMove(event);
        } catch (e) {
            console.log(navigator.appVersion + "touchmove！" + e.message);
        }

    });

    $(document).on("touchend", function (event) {
        try {
            if (!_self.IsOk)
                _self.HanderOut();
        } catch (e) {
            console.log(navigator.appVersion + "touchend！" + e.message);
        }

    });

    $(document).on("keydown", '#label', function(e){
        // console.log(_self);
        if (_self.index <= 0 || isNaN(_self.index)) {
            _self.index = 0;
            _self.lableIndex = 0;
        }
        if (!_self.IsOk) {
            _self.HanderIn();
            var animation = change[e.which];
            _self.index += animation;
            _self.Move();
        }
    });
}

Slider.prototype.HanderIn = function () {
    var _self = this;
    _self.swipestart = true;
    _self.min = 0;
    _self.max = $("#slider").width();
    // console.log(_self.max);
    if (_self.lableIndex < 0) {
        _self.lableIndex = 0;
    }
}

Slider.prototype.HanderOut = function () {
    var _self = this;
    _self.swipestart = false;
    _self.Move();
}

Slider.prototype.HanderMove = function (event) {
    var _self = this;
    if (_self.swipestart && !_self.IsOk) {
        event.preventDefault();
        var event = event || window.event;
        if (_self.mobile) {
            //event.originalEvent.changedTouches[0].clientX //event.originalEvent.pageX
            _self.index = event.originalEvent.changedTouches[0].clientX - _self.lableIndex;

        } else if (_self.isMobile && !_self.mobile) {
            _self.index = event.clientX - _self.lableIndex;
        } else {
            _self.index = event.clientX - _self.lableIndex;
        }
        _self.Move();
    }
}


Slider.prototype.SliderCallBack = null;

Slider.prototype.Move = function () {
    var _self = this;
    if (_self.index > 0) {
        var style = "";
        if (_self.isMobile) {
            style = {
                "border-bottom-left-radius": "0px", "border-top-left-radius": "0px",
                "border-bottom-right-radius": "10px", "border-top-right-radius": "10px"
            };
        } else {
            style = {
                "border-bottom-left-radius": "0px", "border-top-left-radius": "0px",
                "border-bottom-right-radius": "10px", "border-top-right-radius": "10px"
            };
        }
        $(".slider.left").css(style);
    }


    //$(".warn").text("index:" + _self.index + "， max" + _self.max + ",lableIndex:" + _self.lableIndex + ",value:" + $("#captcha").val());
    var num; //30  62
    if (_self.isMobile) { num = 10; } else { num = 19; }
    if ((_self.index + num) >= _self.max) {
        _self.index = _self.max - num;
    }
    if (_self.index < 0) {
        _self.index = _self.min;
        var style = "";
        if (_self.isMobile) {
            var style = {
                "border-bottom-left-radius": "10px", "border-top-left-radius": "10px",
                "border-bottom-right-radius": "0px", "border-top-right-radius": "0px"
            };
        } else {
            var style = {
                "border-bottom-left-radius": "10px", "border-top-left-radius": "10px",
                "border-bottom-right-radius": "0px", "border-top-right-radius": "0px"
            };
        }
        $(".slider.left").css(style);
    }
    $(".label").css("left", _self.index + "px");
    if (_self.index == (_self.max - num)) {

        _self.swipestart = false;
        _self.IsOk = true;
        $("#captcha").val(1);
        $("#lableTip").text(document.getElementById("lableTip").attributes["data-hasslider"].value);
        _self.SliderCallBack.call(this, [1])

        //document.getElementById("btnSubmit").disabled = false;k
    } else {
        _self.IsOk = false;
        $("#captcha").val(0);
        $("#lableTip").text(document.getElementById("lableTip").attributes["data-noslider"].value);

        //document.getElementById("btnSubmit").disabled = true;
    }
}