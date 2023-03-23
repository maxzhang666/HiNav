@php
    use App\Extensions\Constants;use App\Models\HnMenu;$logo_class = '';
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
                        @php
                            $hn_menus = HnMenu::whereType(Constants::Menu_Type_Data['侧边主菜单'])->get();
                            $root_menus = $hn_menus->where('pid','=', 0);
                        @endphp
                        @foreach($root_menus as $menu)
                            @php
                                $sub_menus = $hn_menus->where('pid','=', $menu->id);
                                $has_child = $sub_menus->count()>0;
                            @endphp
                            <li class="sidebar-item">
                                <a href="{!! $has_child?'javascript:;':'#term-'.$menu->id !!} javascript:;">
                                    <i class="{!! $menu->icon !!} icon-fw icon-lg mr-2"></i>
                                    <span>{{ $menu->name }}</span>
                                    @if($has_child)
                                        <i class="iconfont icon-arrow-r-m sidebar-more text-sm"></i>
                                    @endif
                                </a>
                                @if($has_child)
                                    <ul>
                                        @foreach($sub_menus as $sub_menu)
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
                <ul>
                    <li id="#" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-17 sidebar-item">
                        <a href="#">底部菜单</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
