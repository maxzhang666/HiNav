@php
    use App\Extensions\Constants;use App\Extensions\HnHelper;$sites_type = $site->type;
    $link_url = $site->link;
    $title = $site->name;
    $is_html = '';
    $width = 128;
    $tooltip = 'data-toggle="tooltip" data-placement="bottom"';
    $default_ico=asset('asset/imgs/favicon.png');

    if($site->qrcode){
        $title="<img src='" . get_post_meta_img(get_the_ID(), '_wechat_qr', true) . "' width='{$width}'>";
        $is_html = 'data-html="true"';
    } else {
        switch(admin_setting(Constants::Index_Card_Prompt,'url')) {
            case 'null':
                $tooltip = '';
                break;
            case 'url':
                if($link_url==""){
                    if($sites_type == "down")
                        $title = $title.'下载'.$title.'“'.$title().'”';
                    elseif ($sites_type == "wechat")
                        $title = $title.'居然没有添加二维码'.$title;
                    else
                        $title = $title.'没有 url'.$title;
                }
                break;
            case 'summary':
                if($sites_type == "down")
                    $title = $title.'下载'.$title.'“'.$title().'”';
                else
                    $title = htmlspecialchars($site->desc_mini) ?: preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$site->desc);
                break;
            case 'qr':
                if($link_url==""){
                    if($sites_type == "down")
                        $title = $title.'下载'.$title.'“'.$title().'”';
                    elseif ($sites_type == "wechat")
                        $title = $title.'居然没有添加二维码'.$title;
                    else
                        $title = $title.'没有 url'.$title;
                }
                else{
                    $title = "<img src='" . str_ireplace( array('$size','$url'), array($width,$link_url), admin_setting(Constants::Other_QrCode_Api) ). "' width='{$width}' height='{$width}'>";
                    $is_html = 'data-html="true"';
                }
                break;
            default:
        }
    }

    $url = '';
    $blank =HnHelper::new_window();
    $is_views = '';

//        if(io_get_option('details_page')){
//            $url=get_permalink();
//        }else{
//            if($sites_type && $sites_type != "sites"){
//                $url=get_permalink();
//            }
//            elseif($link_url==""){
//                $url = 'javascript:';
//                $blank = '';
//            }else{
//                $is_views = 'is-views';
//                $blank = 'target="_blank"' ;
//                $url = go_to($link_url);
//            }
//        }

    if( true ){
//        if($post->post_type != 'sites'){
//            $ico =  io_theme_get_thumb();
//        }
//        else{
//            $ico = get_post_meta_img($post->ID, '_thumbnail', true);
//        }
    $ico=HnHelper::get_icon($link_url,$site->type);
    }
@endphp
<div class="url-body default">
    {{--    详情页面埋点--}}
    <a href="{!! $link_url !!}" {!! $blank !!} {!! $site->type==1&& admin_setting(Constants::Basic_Url_Go_To,0)==1? '':HnHelper:: nofollow($link_url, true)!!} data-url="<?php echo rtrim($link_url, "/") ?>"
       class="card no-c <?php echo $is_views ?> mb-4 site-{!! $site->id !!}" {!! $tooltip.' '.$is_html !!} title="{{$title}}">
        <div class="card-body">
            <div class="url-content d-flex align-items-center">
                @if (true)
                    <div class="url-img rounded-circle mr-2 d-flex align-items-center justify-content-center">
                        @if (admin_setting(Constants::Basic_Img_Lazyload,1))
                            <img class="lazy" src="{{ $default_ico }}" data-src="{{ $ico }}" onerror="javascript:this.src='{{ $default_ico }}'">
                        @else
                            <img class="" src="{{ $ico }}" onerror="javascript:this.src='{{ $default_ico }}'">
                        @endif
                    </div>
                @endif

                <div class="url-info flex-fill">
                    <div class="text-sm overflowClip_1">
                        <!----><?php //show_sticky_tag(is_sticky()) . show_new_tag(get_the_time('Y-m-d H:i:s')) ?><!---->
                        <strong>{{$title}}</strong>
                    </div>
                    <p class="overflowClip_1 m-0 text-muted text-xs">
                        {!! htmlspecialchars($site->desc_min) ?: preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/", "", $site->id) !!}
                    </p>
                </div>
            </div>
        </div>
    </a>
    @if (!empty($link_url) && admin_setting(Constants::Basic_To_Go_Btn,1) )
        <a href="{{HnHelper:: go_to($link_url) }}" class="togo text-center text-muted is-views" target="_blank" data-id="{{ $site->id }}"
           data-toggle="tooltip" data-placement="right" title="直达{!! $title !!}" {!! HnHelper::nofollow($link_url)!!}><i
                class="iconfont icon-goto"></i></a>
    @endif
</div>
