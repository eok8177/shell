function Global() {
    var _self = this;
}
Global.submitCallback = null;
Global.confirmCallback = null;

$(document).ready(function () {
    //form body
    $("body").find(".form").each(function () {
        var form = this;
        this.onclick = function (e) {
            return Main(e, form);
        }

        var i = 0;
        document.onkeyup = function (eve) {
            var e = eve || window.event || arguments.callee.caller.arguments[0];
            if (e && e.keyCode == 13 && i === 0) {
                i++;
                return Main(e, form, true);
            }
        }
    });

    function Main(e, form, _Enter) {
        i = 0;
        var button = null;
        try {
            button = e.srcElement == null ? document.activeElement : e.srcElement;
        } catch (e) {
            console.log(e.message)
            button = document.activeElement;
        }
        if ($(button).is(".check") || _Enter) {
            var sub = (checkform(form) && CheckInputRex(form) && checkselect(form) && checkChecked(form) && checkValid(form));
            if (sub) {
                // Call our callback, but using our own instance as the context
                Global.submitCallback.call(form, [e]);
            } else
            return sub;
        } else if ($(button).is(".confirm")) {
            var sub = confirm($(button).attr("title"));
            if (sub) {
                Global.confirmCallback.call(form, [e]);
            } else
            return sub;
        } else {
            return true;
        }
    }

    function checkform(form) {
        var b = true;
        $(form).find(".notnull").each(function () {
            if ($.trim($(this).val()).length <= 0 || $.trim($(this).val()) == $.trim($(this).attr("placeholder"))) {//|| $(this).val() == this.defaultValue
                $('#msg').html($(this).attr("nullmsg"));
                $(this).select();
                $(this).focus();
                return b = false;
            }
        });
        if (b == true) {
            $(form).find(".warn").text("");
            $(form).find(".errorMessage").hide();
        }
        return b;
    }

    function checkselect(form) {
        var b = true;
        $(form).find(".select").each(function (i) {
            var ck = $(this).find('option:selected').text();
            if (ck.indexOf("选择") > -1) {
                $('#msg').html($(this).attr("nullmsg"));
                $(this).select();
                $(this).focus();
                return b = false;
            }
        });
        return b;
    }

    function checkValid(form) {
        var b = true;
        $(form).find(".valid").each(function (i) {
            var isValid = parseInt($(this).val());
            if (!isValid) {
                $('#msg').html($(this).attr("validmsg"));
                $(this).select();
                $(this).focus();
                return b = false;
            }

        });
        return b;
    }

    function checkChecked(form) {
        var b = true;
        $(form).find(".checkbox").each(function (i) {
            var ck = $(this)[0].checked;
            if (!ck) {
                $('#msg').html($(this).attr("nullmsg"))
                $(this).select();
                $(this).focus();
                return b = false;
            }
        });
        return b;
    }

    function GetFlase(value, reg, ele) {
        if (reg.test(value)) {
            return true;
        }
        $('#msg').html($(ele).attr("logicmsg"));
        $(ele).focus();
        $(ele).select();
        return false;
    }

    function CheckInputRex(form) {
        var b = true;
        $(form).find("input[type='text']").each(function () {
            if (typeof ($(this).attr("regex")) == 'string') {
                if ($.trim($(this).val()).length > 0 && $.trim($(this).val()) != $.trim($(this).attr("placeholder"))) {
                    var value = $(this).attr("value") || $(this).val();
                    var regx = eval($(this).attr("regex"));
                    return b = GetFlase(value, regx, this);
                }
            }
        });
        return b;
    }
});
