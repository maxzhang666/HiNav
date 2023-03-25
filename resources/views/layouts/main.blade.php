@php use App\Extensions\HnHelper;use App\Extensions\Constants @endphp
    <!DOCTYPE html>
<html lang="zh-CN">
@include('layouts.header')
<body class="{{HnHelper::get_theme_mode()}}">
@if(admin_setting(Constants::Color_Full_Loading)=="1")
    <div id="loading">
        <div id="preloader_3"></div>
    </div>
@endif
<div class="page-container">
    @include('layouts.nav')
    <div class="main-content flex-fill">
        @include('layouts.header-banner')
        @include('layouts.tool-header')
        @yield("content")
    </div>
</div>
<script type='text/javascript' id='popper-js-extra'>
    /* <![CDATA[ */
    var theme = {"ajaxurl":"http:\/\/onenav\/wp-admin\/admin-ajax.php","addico":"http:\/\/onenav\/wp-content\/themes\/WebStack%20Pro\/images\/add.png","order":"asc","formpostion":"top","defaultclass":"io-white-mode","isCustomize":"","icourl":"https:\/\/api.iowen.cn\/favicon\/","icopng":".png","urlformat":"1","customizemax":"10","newWindow":"1","lazyload":"","minNav":"","loading":""};
    /* ]]> */
</script>
<script type='text/javascript' src='{{asset('asset/js/popper.min.js')}}' id='popper-js'></script>
<script type='text/javascript' src='{{asset('asset/js/bootstrap.min.js')}}' id='bootstrap-js'></script>
<script type='text/javascript' src='{{asset('asset/js/theia-sticky-sidebar.js')}}' id='sidebar-js'></script>
<script type='text/javascript' src='{{asset('asset/js/jquery.fancybox.min.js')}}' id='lightbox-js-js'></script>
<script type='text/javascript' src='{{asset('asset/js/app.js')}}' id='appjs-js'></script>
</body>
</html>
