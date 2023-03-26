@php use App\Extensions\Constants; @endphp
@if(admin_setting(Constants::Ad_Index_Top))
    @php
        $ad_one = admin_setting(Constants::Ad_Index_Top_One,0);
        $ad_two = admin_setting(Constants::Ad_Index_Top_Two,0);
    @endphp
    @if($ad_one&&$ad_two)
        <div class="row mb-4">
            <div class="apd apd-home col-12 col-xl-6">{!! admin_setting(Constants::Ad_Index_Top_One_Content) !!}</div>
            <div class="apd apd-home col-12 col-xl-6 d-none d-xl-block">{!! admin_setting(Constants::Ad_Index_Top_Two_Content) !!}</div>
        </div>
    @elseif($ad_one)
        <div class="row mb-4">
            <div class="apd apd-home col-12">{!! admin_setting(Constants::Ad_Index_Top_One_Content) !!}</div>
        </div>
    @elseif($ad_two)
        <div class="row mb-4">
            <div class="apd apd-home col-12">{!! admin_setting(Constants::Ad_Index_Top_Two_Content) !!}</div>
        </div>
    @endif
@endif
