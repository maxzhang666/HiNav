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
        //$pid = request()->input('pid', 0);
        $res = HnMenu::where('pid', '!=', 0)->select(['id', 'name'])->get()->toArray();
        return $this->success($res);
    }

    public function addSite(): JsonResponse
    {
        $name = request()->input('name', '');
        $url = request()->input('url', '');
        $desc = request()->input('desc', '');
        $cat = request()->input('cat', 0);

        $hnItem = new HnItem();
        $hnItem->name = $name;
        $hnItem->link = $url;
        $hnItem->desc = $desc;
        $hnItem->cat = $cat;
        $hnItem->save();
        return $this->success();
    }
}
