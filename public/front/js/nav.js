$('.slick').slick({
    autoplay:true,
    speed:1500,
    touchMove:true,
    autoplaySpeed:2000,
    arrows:true,
    swipe:true,
    useCSS:true,
	lazyLoad:'ondemand',
})

$('.layer_img').click(function () {

    if (navigator.userAgent.match(/mobile/i) && screen.width < 767) {
        // $(".pop_layer img").attr("src", $(this).attr("mobilelayergif"))
    } else{
        // $(".pop_layer img").attr("src", $(this).attr("layergif"))
    }

    $('.pop_layer,.gif_mask').show();
    $('.navbar').css({ 'height': '0', 'border-top': 'none' });
})

    var c=null;
$(".layer_clcik").click(function () {
    if (navigator.userAgent.match(/mobile/i) && screen.width < 767) {
         // $(".pop_layer img").attr("src", $($(this).find("a")[0]).attr("mobilelabelgif"));
    }else{
          // $(".pop_layer img").attr("src", $($(this).find("a")[0]).attr("labelgif"));
    }
    $('.pop_layer,.gif_mask').show();
    $('.navbar').css({ 'height': '0', 'border-top': 'none' });
    $(this).addClass("navdrop");
});


$('.hideGif').click(function () {
    // $(".pop_layer img").attr("src", "");
    $('.pop_layer,.gif_mask,.pop_layer1').hide();
    clearTimeout(c);
})


function GetQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return (r[2]); return '';
}

function CheckString(name) {
    if (name.length>80)
        return '';

    var pattern=new RegExp("[`/|<>~%!@#^''~！@#￥……——‘”“'？*()（），,。.、]");
    var r =name.match(pattern);
    if (r) 
        return '';
    else
     return name;
}


if (navigator.userAgent.match(/mobile/i) && screen.width < 767) {

    var ht = $(".cnt_left").height();
    $("#_select,#flags").css({ "top": 'auto', 'height': 'auto', 'max-height': '260px' });

    $('.country_left').click(function () {
        $(".gif_mask,.countryContainer").show();
        $('.select_flag').animate({ 'bottom': '0' });
        $("#navbar").css('border-top', 'none');
        $('body').css('position', 'fixed');

        $(".gif_mask").on('touchmove', function (e) {
            e.preventDefault();
        })

    })

    $(".gif_mask").click(function () {
        $('.select_flag,#_select').animate({ 'bottom': '-260px' });
        $('body').css('position', 'relative');
        $('.pop_layer,.pop_layer1,.gif_mask').hide();
                        // $(".pop_layer img").attr("src", "");
    })

    $(".select_flag li,#_select li").click(function () {
        $('body').css('position', 'relative');
        $('.select_flag,#_select').animate({ 'bottom': '-260px' }, 400, function () {
            $(".gif_mask").hide();
            $('form')[0].submit();
        });
    })


    $('.country_right').click(function () {
        $(".gif_mask,.countryContainer1").show();
        $('#_select').animate({ 'bottom': '0' });
        $("#navbar").css('border-top', 'none');
        $('body').css('position', 'fixed');

        $(".gif_mask").on('touchmove', function (e) {
            e.preventDefault();
        })

    })
} else {

    $("*").click(function (event) {

        if (!$(this).hasClass("countryContainer") && !$(this).hasClass("country_left")) {

            $(".countryContainer").hide();
        }
        if (!$(this).hasClass("countryContainer1") && !$(this).hasClass("country_right")) {

            $(".countryContainer1").hide();
        }
    });

    $('.gif_mask').click(function () {
        // $(".pop_layer img").attr("src", "");
        $('.pop_layer,.gif_mask,.pop_layer1').hide();
    })

    var ht = $(".cnt_left").height();
    $("#_select,#flags").css("top", ht + 4 + 'px');

    var tt = $("body").outerHeight(true);
    var ss = $("body").outerHeight(true) - $(".cn_main").offset().top - $(".cnt_left").height() - 114;
    $("#flags,#_select").css({ 'height': 'auto', 'max-height': ss });

}


function getCookie(c_name)
{
if (document.cookie.length>0)
  {
  c_start=document.cookie.indexOf(c_name + "=")
  if (c_start!=-1)
    { 
    c_start=c_start + c_name.length+1 
    c_end=document.cookie.indexOf(";",c_start)
    if (c_end==-1) c_end=document.cookie.length
    return unescape(document.cookie.substring(c_start,c_end))
    } 
  }
return ""
}