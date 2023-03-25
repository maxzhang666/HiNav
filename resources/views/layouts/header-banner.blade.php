@php use App\Extensions\HnHelper;use App\Extensions\Constants @endphp
<div id="header" class="page-header big sticky">
    <div class="navbar navbar-expand-md">
        <div class="container-fluid p-0">
            <a href="{{$url}}" class="navbar-brand d-md-none">
                <img src="{{admin_setting(Constants::Icon_Logo_Small_White)}}" class="logo-light" alt="{{$title}}">
                <img src="{{admin_setting(Constants::Icon_Logo_Small)}}" class="logo-dark d-none" alt="{{$title}}">
            </a>
            <div class="collapse navbar-collapse order-2 order-md-1">
                <div class="header-mini-btn">
                    <label>
                        <input id="mini-button" type="checkbox" {!! admin_setting(Constants::Basic_Mini_Nav,0)?'':'checked="checked"' !!}>
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <path class="line--1" d="M0 40h62c18 0 18-20-17 5L31 55"/>
                            <path class="line--2" d="M0 50h80"/>
                            <path class="line--3" d="M0 60h62c18 0 18 20-17-5L31 45"/>
                        </svg>
                    </label>

                </div>
                <ul class="navbar-nav site-menu mr-4">
                    {{--                            顶部菜单--}}
                </ul>
                @if(admin_setting(Constants::Other_Weather,0)&&admin_setting(Constants::Other_Weather_Position)=='header')
                    <!-- 天气 -->
                    <div class="weather">
                        <div id="he-plugin-simple" style="display: contents;"></div>
                        <script>WIDGET = {
                                CONFIG: {
                                    "modules": "12034",
                                    "background": 5,
                                    "tmpColor": "888",
                                    "tmpSize": 14,
                                    "cityColor": "888",
                                    "citySize": 14,
                                    "aqiSize": 14,
                                    "weatherIconSize": 24,
                                    "alertIconSize": 18,
                                    "padding": "10px 10px 10px 10px",
                                    "shadow": "1",
                                    "language": "auto",
                                    "borderRadius": 5,
                                    "fixed": "false",
                                    "vertical": "middle",
                                    "horizontal": "left",
                                    "key": "a922adf8928b4ac1ae7a31ae7375e191"
                                }
                            }</script>
                        <script src="//widget.heweather.net/simple/static/js/he-simple-common.js?v=1.1"></script>
                    </div>
                    <!-- 天气 end -->
                @endif
            </div>
            <ul class="nav navbar-menu text-xs order-1 order-md-2">
                @if(admin_setting(Constants::Other_Hitokoto))
                    <!-- 一言 -->
                    <li class="nav-item mr-3 mr-lg-0 d-none d-lg-block">
                        <div class="text-sm overflowClip_1">
                            <script src="//v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
                            <span id="hitokoto"></span>
                        </div>
                    </li>
                    <!-- 一言 end -->
                @endif
                @if(admin_setting(Constants::Index_Search_Position) && in_array("top",json_decode( admin_setting(Constants::Index_Search_Position,"[]"))))
                    <li class="nav-item  mobile-menu ml-4">
                        <a href="javascript:" data-toggle="modal" data-target="#search-modal"><i class="iconfont icon-search icon-2x"></i></a>
                    </li>
                @endif
                <li class="nav-item d-md-none mobile-menu ml-4">
                    <a href="javascript:" id="sidebar-switch" data-toggle="modal" data-target="#sidebar"><i class="iconfont icon-classification icon-2x"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
