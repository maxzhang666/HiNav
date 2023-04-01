@php use App\Extensions\Constants;use App\Models\HnMenu;use Jenssegers\Agent\Facades\Agent; @endphp
@extends('layouts.main')
@section("content")
    @php
        $all_menus=HnMenu::all()->sortByDesc('sort');
        $hn_menus = $all_menus->where('type','=', Constants::Menu_Type_Data['侧边主菜单']);
        $top_root_menus = $hn_menus->where('pid','=', 0);
        foreach ($top_root_menus as &$menu){
            $menu->sub_menus = $hn_menus->where('pid','=', $menu->id);
        }
    @endphp
    @foreach($top_root_menus as $root_menu)
        @if($root_menu->sub_menus->count()>0)
            @foreach($root_menu->sub_menus as $item)
                @include('weight.card-row',['pmenu'=>$root_menu,'menu'=>$item])
            @endforeach
        @else
            @include('weight.card-row',['pmenu'=>'','menu'=>$root_menu])
        @endif
    @endforeach
@endsection
