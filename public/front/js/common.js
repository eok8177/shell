var bol = true;
var timer = null;
var t = $("#navbar").height();

var maxH = 50;
var minH = 0;
$("#btn").click(function () {
    if (bol) {
        $("#navbar").css('borderTop', '1px solid #eee');
        timer = setInterval(function () {
            t += 50;
            if (t >= maxH) {
                t = maxH;
                clearInterval(timer)
            }
            $("#navbar").animate({ height: t + 'px' });
        }, 3)
        bol = false;
    } else {
        if ($(".layer_clcik").hasClass("navdrop")) {
            $("#navbar").css('borderTop', '1px solid #eee');
            timer = setInterval(function () {
                t += 50;
                if (t >= maxH) {
                    t = maxH;
                    clearInterval(timer)
                }
                $("#navbar").animate({ height: t + 'px' });
                $(".layer_clcik").removeClass("tt")
            }, 3)
            bol = false;
        } else {
            timer = setInterval(function () {
                t -= 50;
                if (t <= minH) {
                    t = minH;
                    clearInterval(timer);
                }
                $("#navbar").animate({ height: t + 'px' });
            }, 3)
            bol = true;
        }
    }
})
