@php use App\Extensions\Constants;use App\Extensions\GLib;
    $searchPosition = json_decode(admin_setting(Constants::Index_Search_Position,"[]"));
@endphp
@if(in_array("home",$searchPosition) && admin_setting(Constants::Index_Search_Big))
    @php
        // padding-bottom
       $padding = '';
       //if(!is_home() || !is_front_page())
       //    $padding = 'no-padding-bottom ';
       if(false){
           //文章轮播
           $padding .= 'post-top ';
       }

       // gradual
       $gradual = '';
       $searchBackground=admin_setting(Constants::Index_Search_Background);
       if($searchBackground!="no-bg" &&admin_setting(Constants::Index_Search_Background_Gradual)){
           $gradual = 'bg-gradual ';
       }

       $style='';
       if($searchBackground=="css-color"){
           $style = 'style="background-image: linear-gradient(45deg, '.admin_setting(Constants::Index_Search_Background_Color1).' 0%, '.admin_setting(Constants::Index_Search_Background_Color2).' 50%, '.admin_setting(Constants::Index_Search_Background_Color3).' 100%);"';
       }
       if($searchBackground=="css-img"){
           $style = 'style="background-image: url('. Illuminate\Support\Facades\Storage::url(admin_setting(Constants::Index_Search_Background_Img)).')"';
       }
       if($searchBackground=="css-bing")
       {
           $data = app(GLib::class)->GetJsonArray('https://cn.bing.com/HPImageArchive.aspx',[
               'format'=>'js',
               'idx'=>rand(-1,7),
                'n'=>1,
                'mkt'=>'zh-CN
           ']);
           $imgurl = "https://cn.bing.com".$data['images'][0]['url'];
           $style = 'style="background-image: url('.$imgurl.')"';
       }
    @endphp
    <div class="header-big  {!! $padding !!} {!! $gradual !!} {!! admin_setting(Constants::Index_Search_Background) !!}  mb-4" {!! $style !!}>;
        @if($searchBackground=='canvas-fx')
            <iframe class="canvas-bg" scrolling="no" sandbox="allow-scripts allow-same-origin" src="{{route('tool.canvas')}}"></iframe>
        @endif
        @if(in_array("home",$searchPosition))
            {{--引入搜索模块--}}
        @else
            <div class="no-search my-2 p-1"></div>
@endif
@endif
