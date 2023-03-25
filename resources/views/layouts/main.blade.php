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
        @yield("content")
    </div>
</div>
</body>
</html>
