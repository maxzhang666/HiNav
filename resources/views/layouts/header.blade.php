@php use App\Extensions\Constants;use App\Extensions\HnHelper; @endphp
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{$title.$title_after}}</title>
    <meta name="theme-color" content="{{ HnHelper::get_theme_mode()   =="black-mode"?'#2C2E2F':'#f9f9f9'}}"/>
    <meta name="keywords" content="{{$keywords}}"/>
    <meta name="description" content="{{ stripslashes($description) }}"/>
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:title" content="{{$title.$title_after}}">
    <meta property="og:description" content="{{$description}}">
    @if($logo)
        <meta property="og:image" content="{{$logo}}">
    @endif
    <meta property="og:site_name" content="{{$title}}">
    <link rel="shortcut icon" href="{{admin_setting(Constants::Icon_Favicon)}} ">
    <link rel="apple-touch-icon" href="{{admin_setting(Constants::Icon_Favicon_Apple)}} ">
    {{--head、自定义颜色--}}
    <link rel='stylesheet' href='{{asset("asset/css/all.min.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("asset/css/v4-shims.min.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("asset/css/iconfont.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("asset/css/bootstrap.min.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("asset/css/jquery.fancybox.min.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{mix("asset/css/app.css")}}' type='text/css' media='all'/>
    <script type='text/javascript' src='{{asset("asset/js/jquery.min.js")}}'></script>
    <script type='text/javascript' id='jquery-js-after'>
        /* <![CDATA[ */
        function loadFunc(func) {
            var oldOnload = window.onload;
            if (typeof window.onload != "function") {
                window.onload = func;
            } else {
                window.onload = function() {
                    oldOnload();
                    func();
                }
            }
        }
        /* ]]> */
    </script>
</head>
