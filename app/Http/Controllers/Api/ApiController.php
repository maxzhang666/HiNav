<?php

namespace App\Http\Controllers\Api;

use App\Extensions\ApiResult;
use App\Http\Controllers\Controller;
use App\Models\HnItem;
use App\Models\HnMenu;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    use ApiResult;

    public function menus(): JsonResponse
    {
        $res = [];
        $menus = HnMenu::select(['id', 'pid', 'name'])->get();
        foreach ($menus as &$menu) {
            if ($menus->where('pid', $menu['id'])->count() > 0) {
                continue;
            }
            $res[] = $menu->toArray();
        }
        return $this->success($res);
    }

    public function addSite(): JsonResponse
    {
        $name = request()->input('name', '');
        $url = request()->input('url', '');
        $desc = request()->input('desc', '');
        $cat = request()->input('cat', 0);
        $icon = request()->input('icon', '');
        if (HnItem::whereLink($url)->exists()) {
            return $this->fail([], '已存在该站点');
        }
        $sort = HnItem::all()->count() + 1;

        $hnItem = new HnItem();
        $hnItem->name = $name;
        $hnItem->icon = $icon;
        $hnItem->link = $url;
        $hnItem->desc_min = $desc;
        $hnItem->cat = $cat;
        $hnItem->sort = $sort;
        $hnItem->save();
        return $this->success();
    }
}
