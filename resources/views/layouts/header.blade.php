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
</head>
