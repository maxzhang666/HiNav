@php
    use App\Extensions\Constants;$logo_class = '';
    $logo_light_class = 'class="d-none"';
    if(admin_setting('theme_mode')=="grey-mode"){
        $logo_class = 'class="logo-dark d-none"';
        $logo_light_class = 'class="logo-light"';
    }
@endphp
<div id="sidebar" class="sticky sidebar-nav fade <?php echo admin_setting(Constants::Basic_Mini_Nav)==1?'mini-sidebar" style="width: 60px;':''?>">
    <div class="modal-dialog h-100  sidebar-nav-inner">
        <div class="sidebar-logo border-bottom border-color">
            <div class="logo overflow-hidden">
                <a href="{{$url}}" class="logo-expanded">
                    <img src="{{$logo_white}} " height="40" {{$logo_light_class}} alt="{{$title}}">
                    <img src="{{$logo}}" height="40" {{$logo_class}} alt="{{$title}}">
                </a>
                <a href="{{$url}}" class="logo-collapsed">
                    <img src="{{admin_setting(Constants::Icon_Logo_Small_White)}}" height="40" {{$logo_light_class}} alt="{{$title}}">
                    <img src="{{admin_setting(Constants::Icon_Logo_Small)}}" height="40" {{$logo_class}} alt="{{$title}}">
                </a>
            </div>
        </div>
        <div class="sidebar-menu flex-fill">
            <div class="sidebar-scroll">
                <div class="sidebar-menu-inner">
                    <ul>
                        {{--                        <?php--}}
                        {{--                        foreach ($categories as $category) {--}}
                        {{--                        if ($category['menu_item_parent'] == 0){--}}
                        {{--                        if ($category['type'] != 'taxonomy' && empty($category['submenu'])){--}}
                        {{--                            $icon = implode(" ", $category['classes']);--}}
                        {{--                            $url = trim($category['url']);--}}
                        {{--                        if (strlen($url) > 1 && substr($url, 0, 1) == '#') { ?>--}}
                        {{--                        <li class="sidebar-item">--}}
{{--                                                    <a href="<?php if (is_home() || is_front_page()): ?><?php else: echo home_url()?>/<?php endif; ?><?php echo $url ?>"--}}
                        {{--                               class="smooth">--}}
                        {{--                                <i class="<?php echo $icon ?> icon-fw icon-lg mr-2"></i>--}}
                        {{--                                <span><?php echo $category['title']; ?></span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <?php }--}}
                        {{--                            continue;--}}
                        {{--                        } else {--}}
                        {{--                            if (empty($category['classes']) || (count($category['classes']) == 1 && empty($category['classes'][0])))--}}
                        {{--                                $icon = get_cate_ico($category['post_content']);--}}
                        {{--                            else {--}}
                        {{--                                $classes = preg_grep('/^(fa[b|s]?|io)(-\S+)?$/i', $category['classes']);--}}
                        {{--                                if (!empty($classes)) {--}}
                        {{--                                    $icon = implode(" ", $category['classes']);--}}
                        {{--                                } else {--}}
                        {{--                                    $icon = '';--}}
                        {{--                                }--}}
                        {{--                            }--}}
                        {{--                        }--}}
                        {{--                        if (empty($category['submenu'])){ ?>--}}
                        {{--                        <li class="sidebar-item">--}}
                        {{--                            <a href="<?php if (is_home() || is_front_page()): ?><?php else: echo home_url()?>/<?php endif; ?>#term-<?php echo $category['object_id'];?>"--}}
                        {{--                               class="smooth">--}}
                        {{--                                <i class="<?php echo $icon ?> icon-fw icon-lg mr-2"></i>--}}
                        {{--                                <span><?php echo $category['title']; ?></span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <?php }else { ?>--}}
                        {{--                        <li class="sidebar-item">--}}
                        {{--                            <a href="javascript:;">--}}
                        {{--                                <i class="<?php echo $icon ?> icon-fw icon-lg mr-2"></i>--}}
                        {{--                                <span><?php echo $category['title']; ?></span>--}}
                        {{--                                <i class="iconfont icon-arrow-r-m sidebar-more text-sm"></i>--}}
                        {{--                            </a>--}}
                        {{--                            <ul>--}}
                        {{--                                    <?php foreach ($category['submenu'] as $mid) { ?>--}}

                        {{--                                <li>--}}
                        {{--                                    <a href="<?php if (is_home() || is_front_page()): ?><?php else: echo home_url()?>/<?php endif; ?>#term-<?php  echo $mid['object_id'] ;?>"--}}
                        {{--                                       class="smooth"><span><?php echo $mid['title']; ?></span></a>--}}
                        {{--                                </li>--}}
                        {{--                                <?php } ?>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        {{--                        <?php }--}}
                        {{--                        }--}}
                        {{--                        }--}}
                        {{--                        ?>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="border-top py-2 border-color">
            <div class="flex-bottom">
                <ul>
                    <li id="#" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-17 sidebar-item">
                        <a href="#">底部菜单</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
