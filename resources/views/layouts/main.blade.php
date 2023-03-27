@php use App\Extensions\HnHelper;use App\Extensions\Constants @endphp
@php
    // content 内容部分判断
    $content_class = 'content-site customize-site';
    if(false){
        //分类，标签
        //if(is_category() || is_tag()){
        $content_class = 'container is_category';
    } elseif(false) {
        //} elseif(is_tax("sitetag") || is_tax("favorites")) {
        if(get_term_children(get_queried_object_id(), 'favorites')){
            $content_class = 'content-site customize-site';
        } else {
            $content_class = 'container container-lg customize-site';
        }
    } elseif (false) {
        //} elseif (is_tax("apptag") || is_tax("apps") || is_tax("books") || is_tax("booktag") || is_tax("series")) {
        $content_class='container container-lg';
    }
    $searchPosition = json_decode(admin_setting(Constants::Index_Search_Position,"[]"));
@endphp
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
        @include('tools.header')
        <div id="content" class="{!! $content_class !!}">
            @if(!(in_array("home",$searchPosition) && admin_setting(Constants::Index_Search_Big)))
                @if( in_array("home",$searchPosition) )
                    @include('weight.notice')
                @endif
                @include('weight.search.default')
                @include('weight.ads.hometop')
            @else
                <div class="no-search my-2 p-1"></div>
            @endif
            @yield("content")
        </div>
        @include('layouts.copyright')
    </div>
</div>
@include('layouts.footer')
</body>
</html>
