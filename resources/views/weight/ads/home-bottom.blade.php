@php use App\Extensions\Constants; @endphp
@if(admin_setting(Constants::Ad_Index_Bottom))
    <div class="container apd apd-footer">{!! stripslashes( admin_setting(Constants::Ad_Index_Bottom_Content) )  !!}</div>
@endif
