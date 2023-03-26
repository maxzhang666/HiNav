<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HnMenu
 *
 * @property int $id
 * @property string $name
 * @property string $pid
 * @property string $link
 * @property string $type
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu whereUpdatedAt($value)
 * @property int $sort 排序
 * @method static \Illuminate\Database\Eloquent\Builder|HnMenu whereSort($value)
 * @mixin \Eloquent
 */
class HnMenu extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'hn_menu';

    public static function GetPid($pid = 0): array
    {
        $list = HnMenu::all();
        $data = [0 => '无'];
        foreach ($list as $item) {
            //dd($item->Id,$id);
            if ($item->Id == $pid) {
                continue;
            }
            $data[$item->Id] = $item->name;
        }
        return $data;
    }

    /**
     * 获取顶级菜单
     * @param int $id
     * @return string[]
     */
    public static function GetRoots($id = 0): array
    {
        $data = [0 => '顶级'];
//        HnMenu::wherePid(0)->get()
        foreach (HnMenu::wherePid(0)->get() as $item) {
            $data[$item->id] = $item->name;
        }
        return $data;
    }

    public static function GetPids($pid = -1): array
    {
        $list = [];
        if ($pid == -1) {
            $list = HnMenu::all();
        } else {
            $list = HnMenu::wherePid($pid)->get();
        }

        $data = [0 => '顶级'];
        foreach ($list as $item) {
            $data[$item->Id] = $item->name;
        }
        return $data;
    }

}
