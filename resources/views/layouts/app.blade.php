<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="M3yhMc4QcyTRKMZR63GuyRqM-zN3cSZdJSBjug4q6tU" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shell Anti-Counterfeit System') }}</title>



    <link rel="stylesheet" href="front/css/slick.css" />
    <link rel="stylesheet" href="front/css/front.css" />
    <link rel="stylesheet" href="front/css/index.css" />
    <link rel="stylesheet" href="front/css/select.css" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <script type="text/javascript" src="front/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="front/js/BroswerUtil.js"></script>
    <script type="text/javascript" src="front/js/Slider.js"></script>

    <script type="text/javascript" src="front/js/slick.min.js"></script>
    <script type="text/javascript" src="front/js/functionUtil.js"></script>
    <script type="text/javascript" src="front/js/Red.js"></script>
    <style type="text/css">
        .loading
        {
            width: 100px;
            height: 100px;
            position: fixed;
            text-align: center;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            z-index: 20001;
        }
        
        .loading-mask
        {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 20000;
            background-color: #000;
            filter: alpha(opacity=30);
            -moz-opacity: 0.30;
            opacity: 0.30;
            text-align: center;
            overflow: hidden;
            overflow-y: visible;
        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127964234-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-127964234-2');
    </script> 
</head>
<body>
    <div id="loading-mask" class="loading-mask none"></div>
    <div id="loading" class="loading none">
        <img src="front/images/loading.gif" />
    </div>
    <div class="gif_mask none"></div>
    <div class="main">
        @yield('content')
    </div>
</body>
</html>
<script type="text/javascript" src="front/js/common.js"></script>
<script type="text/javascript" src="front/js/nav.js"></script>

<script>
   var slider1 = new Slider();
   slider1.Init();
   slider1.SliderCallBack = function (c) {
       var image = new Image();
       // image.src = "Ajax/security.ashx?token=" + $("#TOKEN").val();
   }
   $(window).resize(function () {
       slider1.HanderIn();
       slider1.HanderOut();
   });
</script>

<script type="text/javascript">
    Global.submitCallback = function () {
        (function () {
            $('#msg').html();
            $('#loading-mask').show();
            $('#loading').show();
            var code = $('#txtCode').val();
            if (!/^\d{8}$/.test(code)) {
                $('#msg').html($('#txtCode').attr('logicmsg'));
                return;
            }
            $.ajax({
                url: 'api/check',
                type: 'POST',
                data: { code: $('#txtCode').val() },
                success: function (data) {
                    var code = $('#txtCode').val();
                    // console.log(data);
                    $('#msg').html(data.msg);
                    $('#loading-mask').hide();
                    $('#loading').hide();
                },
                error: function (err) {
                    console.log(err.statusText);
                    $('#msg').html("{{$messages['server_error'] ?? 'Извините, сеть перегружена, пожалуйста, попробуйте позже.'}}");
                    $('#loading-mask').hide();
                    $('#loading').hide();
                }
            });
        })();
    };
</script>