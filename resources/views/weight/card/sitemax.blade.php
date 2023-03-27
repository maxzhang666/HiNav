@php    use App\Models\HnItem;@endphp
<div class="url-body max">
    <a href="{{ $url }}" @if($sites_type == "sites" && get_post_meta($post->ID, '_goto', true)) @else nofollow($link_url, io_get_option('details_page')) @endif {{ $blank }} data-id="{{ $post->ID }}"
    data-url="{{ rtrim($link_url,"/") }}" class="card {{ $is_views }} mb-4 site-{{ $post->ID }}" {{ $tooltip . ' ' . $is_html }} title="{{ $title }}">
    <div class="card-body py-2 px-3">
        <div class="url-content align-items-center d-flex flex-fill">
            @if(!io_get_option('no_ico'))
                <div class="url-img rounded-circle mr-2 d-flex align-items-center justify-content-center">
                    @if(io_get_option('lazyload'))
                        <img class="lazy" src="{{ $default_ico }}" data-src="{{ $ico }}" onerror="javascript:this.src='<?php echo $default_ico; ?>'">
                    @else
                        <img class="" src="{{ $ico }}" onerror="javascript:this.src='<?php echo $default_ico; ?>'">
                    @endif
                </div>
            @endif
            <div class="url-info flex-fill">
                <div class="text-sm overflowClip_1">
                    <?php show_sticky_tag(is_sticky()) . show_new_tag(get_the_time('Y-m-d H:i:s')) ?><strong>{{ the_title() }}</strong>
                </div>
                <p class="overflowClip_1 text-muted text-xs">{{ htmlspecialchars(get_post_meta($post->ID, '_sites_sescribe', true)) ?: preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",get_the_excerpt($post->ID)); }}</p>
            </div>
        </div>
        <div class="url-like">
            <div class="text-muted text-xs text-center mr-1">
                @if( function_exists( 'the_views' ) ) { the_views( true, '<span class="views"><i class="iconfont icon-chakan"></i>','</span>' ); }
                $liked        = isset($_COOKIE['liked_' . get_the_ID()]) ? 'liked' : '';
                ?>
                <span class="home-like pl-2 {{ $liked }}" data-id="{{ get_the_ID() }}"><i class="iconfont icon-heart"></i> <span class="home-like-{{ get_the_ID() }}">{{ get_like(get_the_ID()) }}</span></span>
            </div>
        </div>
        <div class="url-goto-after mt-2">
        </div>
    </div>
    </a>
    <div class="url-goto px-3 pb-1">
        <div class="d-flex align-items-center" style="white-space:nowrap">
            <div class="tga text-xs py-1">
                    <?php
                    $post_tags = get_the_terms(get_the_ID(), 'sitetag');
                    if (!$post_tags) $post_tags = get_the_terms(get_the_ID(), 'favorites');
                    if ($post_tags) {
                        $c = count($post_tags) > 4 ? 4 : count($post_tags);
                        for ($i = 0; $i < $c; $i++) {
                            echo '<span class="mr-1"><a href="' . get_tag_link($post_tags[$i]->term_id) . '" rel="tag">' . $post_tags[$i]->name . '</a></span>';
                        }
                    } else {
                        echo '<span class="mr-1"><a class="no-tag">没添加标签</a></span>';
                    }

                    ?>
            </div>
            @if($link_url != '')
                <a href="{{ ($sites_type == "sites" && get_post_meta($post->ID, '_goto', true))?$link_url:go_to($link_url) }}" class="togo text-center text-muted is-views" target="_blank" data-id="{{ $post->ID }}"
                   data-toggle="tooltip" data-placement="right" title="直达"><i class="iconfont icon-goto"></i></a>
            @endif
        </div>
    </div>
</div>

