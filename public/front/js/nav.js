
    var c=null;
$(".layer_clcik").click(function () {
    $('.pop_layer,.gif_mask').show();
    $('.navbar').css({ 'height': '0', 'border-top': 'none' });
    $(this).addClass("navdrop");
});


$('.hideGif').click(function () {
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

    $(".gif_mask").click(function () {
        $('body').css('position', 'relative');
        $('.pop_layer,.pop_layer1,.gif_mask').hide();
    })


} else {

    $('.gif_mask').click(function () {
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