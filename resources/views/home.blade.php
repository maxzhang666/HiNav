@php use App\Extensions\Constants;use App\Models\HnMenu;use Jenssegers\Agent\Facades\Agent; @endphp
@extends('layouts.main')
@section("content")
    @php
        $all_menus=HnMenu::all();
        $hn_menus = $all_menus->where('type','=', Constants::Menu_Type_Data['侧边主菜单']);
        $top_root_menus = $hn_menus->where('pid','=', 0);
        foreach ($top_root_menus as &$menu){
            $menu->sub_menus = $hn_menus->where('pid','=', $menu->id);
        }
    @endphp
    @foreach($top_root_menus as $root_menu)
        @foreach($root_menu->sub_menus as $item)
            @php
                $icon='icon-tag';
                    //        $taxonomy = $mid['object'];
                    //        $quantity = io_get_option('card_n');
                    //        if($taxonomy == "favorites") {
                    //            $icon = 'icon-tag';
                    //        } elseif($taxonomy == "apps") {
                    //            $icon = 'icon-app';
                    //        } elseif($taxonomy == "books") {
                    //            $icon = 'icon-book';
                    //        } elseif($taxonomy == "category") {
                    //            $icon = 'icon-publish';
                    //        } else {
                    //            $icon = 'icon-tag';
                    //        }
            @endphp

            <div class="d-flex flex-fill ">
                <h4 class="text-gray text-lg mb-4">
                    <i class="site-tag iconfont {!! $icon !!} icon-lg mr-1" id="term-{!! $item->id !!}"></i>
                    @if ($root_menu->name != "" && admin_setting(Constants::Index_Tab_Parent_Name,0) && !Agent::isPhone())
                        {{$root_menu->name}}<span style="color:#f1404b"> · </span>
                    @endif
                    {!! $item->name !!}
                </h4>
                <div class="flex-fill"></div>
                {{--        <?php--}}
                {{--        $site_n = isset($quantity[$taxonomy]) ? $quantity[$taxonomy] : $quantity['apps'];--}}
                {{--        $category_count = io_get_category_count($mid['object_id']);//10;//$mid->category_count;--}}
                {{--        $count = $site_n;--}}
                {{--        if ($site_n == 0) $count = min(get_option('posts_per_page'), $category_count);--}}
                {{--        if ($site_n >= 0 && $count < $category_count) {--}}
                {{--            $link = $mid['url'];//esc_url( get_term_link( $mid, $taxonomy ) );--}}
                {{--            echo "<a class='btn-move text-xs' href='$link'>more+</a>";--}}
                {{--        }--}}
                {{--        ?>--}}
            </div>
            <div class="row {{admin_setting(Constants::Content_Card_Mode,'def')=='min'?"row-sm":''}}">

                {{--        <?php show_card($site_n, $mid['object_id'], $taxonomy); ?>--}}
            </div>
        @endforeach
    @endforeach
@endsection
