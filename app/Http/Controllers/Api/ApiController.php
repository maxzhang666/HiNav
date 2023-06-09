<?php

namespace App\Http\Controllers\Api;

use App\Extensions\ApiResult;
use App\Http\Controllers\Controller;
use App\Models\HnItem;
use App\Models\HnMenu;
use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Http\JsonResponse;


class ApiController extends Controller
{
    use ApiResult;

    public function menus(): JsonResponse
    {
        return $this->success(HnMenu::ListTree());
    }

    public function addSite(): JsonResponse
    {
        $name = request()->input('name', '');
        $url  = request()->input('url', '');
        $desc = request()->input('desc', '');
        $cat  = request()->input('cat', 0);
        $icon = request()->input('icon', '');
        if (HnItem::whereLink($url)->exists()) {
            return $this->fail([], '已存在该站点');
        }
        $sort = HnItem::all()->count() + 1;

        $hnItem           = new HnItem();
        $hnItem->name     = $name;
        $hnItem->icon     = $icon;
        $hnItem->link     = $url;
        $hnItem->desc_min = $desc;
        $hnItem->cat      = $cat;
        $hnItem->sort     = $sort;
        $hnItem->save();
        return $this->success();
    }

    public function switchMode(Factory $factory)
    {
        $mode = request()->input('mode_toggle');

        //$factory->forever('night_mode',$mode);

        return $this->success()->withCookie($factory->forever('night_mode', $mode));
    }
}
