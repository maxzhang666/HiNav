@php use App\Extensions\Constants; @endphp
@php
    $search_position = json_decode(admin_setting(Constants::Index_Search_Position,"[]"));
@endphp

@if(( in_array("top",$search_position) || in_array("tool",$search_position) ) )
    <div class="modal fade search-modal" id="search-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    @include('weight.search.modal')
                    <div class="px-1 mb-3">
                        <i class="text-xl iconfont icon-hot mr-1" style="color:#f1404b;"></i>
                        <span class="h6">热门推荐</span>
                    </div>
                    <div class="mb-3">
                        {{--                            <?php wp_menu("search_menu") ?>--}}
                    </div>
                </div>
                <div style="position: absolute;bottom: -40px;width: 100%;text-align: center;">
                    <a href="javascript:" data-dismiss="modal"><i class="iconfont icon-close-circle icon-2x" style="color: #fff;"></i></a>
                </div>
            </div>
        </div>
    </div>
@endif
{{--<?php wp_footer(); ?>--}}
@if(admin_setting(Constants::Color_Full_Loading,0))
    <script type="text/javascript">
        $(document).ready(function () {
            var siteWelcome = document.getElementById('loading');
            siteWelcome.classList.add('close');
            setTimeout(function () {
                siteWelcome.remove();
            }, 600);
        });
    </script>
@endif
@if(\Illuminate\Support\Facades\Route::is('home'))
    {{--@if ( || is_front_page())--}}
    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $('a.smooth[href="' + window.location.hash + '"]').click();
            }, 300);
            $(document).on('click', 'a.smooth', function (ev) {
                ev.preventDefault();
                if ($('#sidebar').hasClass('show')) {
                    $('#sidebar').modal('toggle');
                }
                $("html, body").animate({
                    scrollTop: $($(this).attr("href")).offset().top - 90
                }, {
                    duration: 500,
                    easing: "swing"
                });
                if ($(this).hasClass('go-search-btn')) {
                    $('#search-text').focus();
                }
                @if(admin_setting(Constants::Index_Tab_Mode,0))
                var menu = $("a" + $(this).attr("href"));
                menu.click();
                toTarget(menu.parent().parent());
                @endif
            });
            $(document).on('click', 'a.tab-noajax', function (ev) {
                var url = $(this).data('link');
                if (url)
                    $(this).parents('.d-flex.flex-fill.flex-tab').children('.btn-move.tab-move').show().attr('href', url);
                else
                    $(this).parents('.d-flex.flex-fill.flex-tab').children('.btn-move.tab-move').hide();
            });
        });
    </script>
@else
    <script type="text/javascript">
        $(document).on('click', 'a.smooth-n', function (ev) {
            ev.preventDefault();
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top - 90
            }, {
                duration: 500,
                easing: "swing"
            });
        });
    </script>
@endif
<!-- 自定义代码 -->
{{--{{ io_get_option('code_2_footer') }}--}}
<!-- end 自定义代码 -->

<script type='text/javascript' id='popper-js-extra'>
    /* <![CDATA[ */
    var theme = {
        "ajaxurl": "http:\/\/onenav\/wp-admin\/admin-ajax.php",
        "addico": "http:\/\/onenav\/wp-content\/themes\/WebStack%20Pro\/images\/add.png",
        "order": "asc",
        "formpostion": "top",
        "defaultclass": "io-white-mode",
        "isCustomize": "",
        "icourl": "https:\/\/api.iowen.cn\/favicon\/",
        "icopng": ".png",
        "urlformat": "1",
        "customizemax": "10",
        "newWindow": "1",
        "lazyload": "",
        "minNav": "",
        "loading": ""
    };
    /* ]]> */
</script>
<script type='text/javascript' src='{{asset('asset/js/popper.min.js')}}' id='popper-js'></script>
<script type='text/javascript' src='{{asset('asset/js/bootstrap.min.js')}}' id='bootstrap-js'></script>
<script type='text/javascript' src='{{asset('asset/js/theia-sticky-sidebar.js')}}' id='sidebar-js'></script>
<script type='text/javascript' src='{{asset('asset/js/jquery.fancybox.min.js')}}' id='lightbox-js-js'></script>
<script type='text/javascript' src='{{asset('asset/js/app.js')}}' id='appjs-js'></script>
