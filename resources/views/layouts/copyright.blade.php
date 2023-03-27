@php use App\Extensions\Constants; @endphp
@include('weight.ads.home-bottom')
@php
    $search_position = json_decode(admin_setting(Constants::Index_Search_Position,"[]"));
@endphp
<footer class="main-footer footer-type-1 text-xs">
    <div id="footer-tools" class="d-flex flex-column">
        <a href="javascript:" id="go-to-up" class="btn rounded-circle go-up m-1" rel="go-top">
            <i class="iconfont icon-to-up"></i>
        </a>
        @if( in_array("tool",$search_position) )
            <a href="javascript:" data-toggle="modal" data-target="#search-modal" class="btn rounded-circle m-1" rel="search">
                <i class="iconfont icon-search"></i>
            </a>
        @endif
        @if(admin_setting(Constants::Other_Weather,0) && admin_setting(Constants::Other_Weather_Position)=='footer')
            <!-- 天气  -->
            <div class="btn rounded-circle weather m-1">
                <div id="he-plugin-simple" style="display: contents;"></div>
                <script>WIDGET = {
                        CONFIG: {
                            "modules": "02",
                            "background": 5,
                            "tmpColor": "888",
                            "tmpSize": 14,
                            "cityColor": "888",
                            "citySize": 14,
                            "aqiSize": 14,
                            "weatherIconSize": 24,
                            "alertIconSize": 18,
                            "padding": "7px 2px 7px 2px",
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
        <a href="javascript:" id="switch-mode" class="btn rounded-circle switch-dark-mode m-1" data-toggle="tooltip" data-placement="left" title="夜间模式">
            <i class="mode-ico iconfont icon-light"></i>
        </a>
    </div>
    <div class="footer-inner">
        <div class="footer-text">
            @if(admin_setting(Constants::Footer_CopyRight))
                {!! admin_setting(Constants::Footer_CopyRight) !!}
            @else
                Copyright © {{ date('Y') }} {{ $title }} @if(admin_setting(Constants::Footer_Beian_No))
                    <a href="http://www.beian.miit.gov.cn/" target="_blank" rel="link noopener">{{ admin_setting(Constants::Footer_Beian_No) }}</a>
                @endif
                &nbsp;&nbsp;Design by <a href="#" target="_blank"><strong>嗨，导航</strong></a>&nbsp;&nbsp;{!! admin_setting(Constants::Footer_Analytics_Code) !!}
            @endif
        </div>
    </div>
</footer>
