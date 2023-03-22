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
            if ($item->Id == $id) {
                continue;
            }
            $data[$item->Id] = $item->name;
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
