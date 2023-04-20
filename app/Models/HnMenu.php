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

    private static function buildTree($data, $parentId, $depth, &$result): void
    {
        foreach ($data as $row) {
            if ($row['pid'] == $parentId) {
                // 添加缩进符号
                $indent = '';
                if ($depth > 0) {
                    $indent = '┗';
                    $indent .= str_repeat('━', $depth);
                }
                // 组装线性数据
                $row['name'] = $indent . $row['name'];
                // 添加到结果字符串中
                $result[] = $row;
                // 递归遍历子节点
                self::buildTree($data, $row['id'], $depth + 1, $result);
            }
        }
    }

    public static function ListTree($pid = 0): array
    {
//        降序排列
        $menus = HnMenu::select(['id', 'pid', 'name'])->wherePid($pid)->orderBy('sort', 'desc')->get()->toArray();

        $result = [];

        self::buildTree($menus, 0, 0, $result);

        return $result;
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

    public static function GetPids($pid = 0, $needRoot = true): array
    {
        $list = self::ListTree($pid);

        $data = [];
        if ($needRoot) {
            $data = [0 => '顶级'];
        }
        foreach ($list as $item) {
            $data[$item->id] = $item->name;
        }
        return $data;
    }

}
