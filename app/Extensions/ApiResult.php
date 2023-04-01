<?php

namespace App\Extensions;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

trait ApiResult
{
    public $isCache = false;

    /**
     * @param array  $data
     * @param bool   $isCache
     * @param string $msg
     * @param array  $ext
     * @return JsonResponse
     */
    public function success(array $data = [], bool $isCache = false, string $msg = '哎哟不错哦', array $ext = []): JsonResponse
    {
        $res = [
            'status'  => true,
            'code'    => 1,
            'message' => $msg,
            'cache'   => $isCache,
            'data'    => $data,
        ];
        if (count($ext) > 0) {
            foreach ($ext as $key => $item)
                $res['ext'][$key] = $item;
        }
        try {

            $res = response()->json($res);
        } catch (\Exception $exception) {
            Log::error('序列化异常', [$res]);
            return response()->json(['status' => true, 'code' => 1], 200, [], JSON_UNESCAPED_UNICODE);
        }
        return $res;
    }

    /**
     * @param array  $data
     * @param string $msg
     * @return JsonResponse
     */
    public function fail(array $data = [], string $msg = '要不再试一次？'): JsonResponse
    {
        return response()->json([
            'status'  => false,
            'code'    => 0,
            'message' => $msg,
            'data'    => $data,
        ],
            200, [], JSON_UNESCAPED_UNICODE);
    }
}
