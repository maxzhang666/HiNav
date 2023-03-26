@php    use App\Extensions\Constants;use App\Extensions\HnHelper;use App\Models\HnItem;@endphp
@php
    $cardMode = admin_setting(Constants::Content_Card_Mode,'def');
@endphp
@foreach(HnItem::whereCat($menu->id)->get() as $site)
    @if($cardMode=='max')
        <div class="url-card {!! HnHelper::get_columns() !!} {!! HnHelper::before_class($site) !!} ">
            @include('weight.card.sitemax',['site' => $site])
        </div>
    @elseif($cardMode=='min')
        <div class="url-card col-6 {!! HnHelper::get_columns() !!} {!! HnHelper::before_class($site) !!} ">
            @include('weight.card.sitemax',['site' => $site])
        </div>
    @else
        <div class="url-card {!! admin_setting(Constants::Index_Two_Columns_For_Mini,0)?"col-6":'' !!} {!! HnHelper::get_columns() !!} {!! HnHelper::before_class($site) !!} ">
            @include('weight.card.site',['site' => $site])
        </div>
    @endif
@endforeach
