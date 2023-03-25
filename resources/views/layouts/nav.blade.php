@php
    use App\Extensions\Constants;use App\Models\HnMenu;
    $logo_class = '';
    $logo_light_class = 'class="d-none"';
    if(admin_setting(Constants::Color_Theme)=="grey_mode"){
        $logo_class = 'class="logo-dark d-none"';
        $logo_light_class = 'class="logo-light"';
    }
//    dd($logo_class,$logo_light_class,admin_setting(Constants::Color_Theme));
    $all_menus=HnMenu::all();
    $hn_menus = $all_menus->where('type','=', Constants::Menu_Type_Data['侧边主菜单']);
    $top_root_menus = $hn_menus->where('pid','=', 0);
    foreach ($top_root_menus as &$menu){
        $menu->sub_menus = $hn_menus->where('pid','=', $menu->id);
    }
    $bottom_menus = $all_menus->where ('type','=', Constants::Menu_Type_Data['侧边底部菜单']);
@endphp
<div id="sidebar" class="sticky sidebar-nav fade <?php echo admin_setting(Constants::Basic_Mini_Nav)==1?'mini-sidebar" style="width: 60px;':''?>">
    <div class="modal-dialog h-100  sidebar-nav-inner">
        <div class="sidebar-logo border-bottom border-color">
            <div class="logo overflow-hidden">
                <a href="{{$url}}" class="logo-expanded">
                    <img src="{{admin_setting(Constants::Icon_Logo_White)}} " height="40" {!! $logo_light_class !!} alt="{{$title}}">
                    <img src="{{admin_setting(Constants::Icon_Logo)}}" height="40" {!! $logo_class !!} alt="{{$title}}">
                </a>
                <a href="{{$url}}" class="logo-collapsed">
                    <img src="{{admin_setting(Constants::Icon_Logo_Small_White)}}" height="40" {!! $logo_light_class !!} alt="{{$title}}">
                    <img src="{{admin_setting(Constants::Icon_Logo_Small)}}" height="40" {!! $logo_class !!} alt="{{$title}}">
                </a>
            </div>
        </div>
        <div class="sidebar-menu flex-fill">
            <div class="sidebar-scroll">
                <div class="sidebar-menu-inner">
                    <ul>
                        @foreach($top_root_menus as $item)
                            @php
                                $has_child = $item->sub_menus->count()>0;
                            @endphp
                            <li class="sidebar-item">
                                <a href="{!! $has_child?'javascript:;':'#term-'.$item->id !!}">
                                    <i class="{!! $item->icon !!} icon-fw icon-lg mr-2"></i>
                                    <span>{{ $item->name }}</span>
                                    @if($has_child)
                                        <i class="iconfont icon-arrow-r-m sidebar-more text-sm"></i>
                                    @endif
                                </a>
                                @if($has_child)
                                    <ul>
                                        @foreach($item->sub_menus as $sub_menu)
                                            <li>
                                                <a href="#term-{{ $sub_menu->id }}" class="smooth"><span>{{$sub_menu->name}}</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="border-top py-2 border-color">
            <div class="flex-bottom">
                @if($bottom_menus->count()>0)
                    <ul>
                        @foreach($bottom_menus as $item)
                            <li id="menu-item-{{$item->id}}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-17 sidebar-item">
                                <a href="{{$item->link}}">{{$item->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
