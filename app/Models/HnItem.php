<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HnItem
 *
 * @property int $id
 * @property string $name 名称
 * @property string $desc 简介
 * @property string $desc_min 一句话简介
 * @property string $type 类型，1网址2公众号/小程序
 * @property string $link 地址
 * @property string|null $bak_link 备用地址
 * @property string|null $qrcode 二维码
 * @property string|null $official_link 官方站点
 * @property string|null $language 站点语言
 * @property string|null $country 站点国家
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereBakLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereDescMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereOfficialLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereQrcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereUpdatedAt($value)
 * @property string|null $icon 图标
 * @property int $sort 排序
 * @property int $cat 所属分类
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnItem whereSort($value)
 * @mixin \Eloquent
 */
class HnItem extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'hn_item';

}
