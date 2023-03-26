@php use App\Extensions\Constants; @endphp
<div class="s-search">
    <div id="search" class="s-search mx-auto">
        <div id="search-list-menu" class="hide-type-list">
            <div class="s-type">
                <div class="s-type-list big">
                    <div class="anchor" style="position: absolute; left: 50%; opacity: 0;"></div>
                    @foreach (Constants::Data_Search_List as $value)
                        <label for="{{ $value['default'] }}" class="{{ $loop->first ? 'active' : '' }}" data-id="{{ $value['id'] }}"><span>{{ $value['name'] }}</span></label>
                    @endforeach
                </div>
            </div>
        </div>
        <form action="?s=" method="get" target="_blank" class="super-search-fm">
            <input type="text" id="search-text" class="form-control smart-tips search-key" zhannei="" placeholder="{{'输入关键字搜索'}}" style="outline:0" autocomplete="off">
            <button type="submit"><i class="iconfont icon-search"></i></button>
        </form>
        <div id="search-list" class="hide-type-list">
            @foreach (Constants::Data_Search_List as $key => $value)
                <div class="search-group {{ $value['id'] }} {{ $loop->first ? 's-current' : '' }}">
                    <ul class="search-type">
                        @foreach ($value['list'] as $s)
                            @if ($loop->first && $s['id'] == $value['default'])
                                <li><input checked="checked" hidden type="radio" name="type" id="{{ $s['id'] }}" value="{{ $s['url'] }}" data-placeholder="{{ $s['placeholder'] }}"><label for="{{ $s['id'] }}"><span
                                            class="text-muted">{{ $s['name'] }}</span></label></li>
                            @else
                                <li><input hidden type="radio" name="type" id="{{ $s['id'] }}" value="{{ $s['url'] }}" data-placeholder="{{ $s['placeholder'] }}"><label for="{{ $s['id'] }}"><span
                                            class="text-muted">{{ $s['name'] }}</span></label></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
        <div class="card search-smart-tips" style="display: none">
            <ul></ul>
        </div>
    </div>
</div>
