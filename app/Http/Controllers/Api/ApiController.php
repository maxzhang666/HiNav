<?php

namespace App\Http\Controllers\Api;

use App\Extensions\ApiResult;
use App\Http\Controllers\Controller;
use App\Models\HnMenu;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    use ApiResult;

    public function menus(): JsonResponse
    {
        $pid = request()->input('pid', 0);
        $res = HnMenu::wherePid($pid)->select(['id', 'name'])->get()->toArray();
        return $this->success($res);
    }

    public function addSite(): JsonResponse
    {
        $name = request()->input('name', '');
        $url = request()->input('url', '');
        $desc = request()->input('desc', '');
        $res = HnMenu::create(['name' => $name, 'url' => $url]);
        return $this->success($res);
    }
}
