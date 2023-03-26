@php use App\Extensions\Constants;use App\Models\HnNotice; @endphp
@php
    $notices = HnNotice::orderBy('id', 'desc')->limit(admin_setting(Constants::Index_Notice_Show_Num,2))->get();
@endphp
@if(admin_setting(Constants::Index_Notice,0)==1 && admin_setting(Constants::Index_Notice_Show,0)==1)
    <div id="bulletin_box" class="card my-2">
        <div class="card-body py-1 px-2 px-md-3 d-flex flex-fill text-xs text-muted">
            <div><i class="iconfont icon-bulletin" style="line-height:25px"></i></div>
            <div class="bulletin mx-1 mx-md-2">
                <ul class="bulletin-ul">
                    @foreach($notices as $notice)
                        <li class="scrolltext-title overflowClip_1">
                            <a href="{{empty($notice->link)?'#':$notice->link}}" target="_blank" rel="bulletin">{{ $notice->content }} ({{ $notice->publish_date }})</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-fill"></div>
            <a title="关闭" href="javascript:;" rel="external nofollow" class="bulletin-close" onClick="$('#bulletin_box').slideUp('slow');"><i class="iconfont icon-close" style="line-height:25px"></i></a>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#bulletin_box").textSlider({line: 1, speed: 300, timer: 4000});
        })
    </script>
@endif
