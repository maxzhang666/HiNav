<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HnNotice
 *
 * @property int $id
 * @property string|null $name
 * @property string $content
 * @property string $publish_date
 * @property int $views
 * @property int $likes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $link
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice query()
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HnNotice whereViews($value)
 * @mixin \Eloquent
 */
class HnNotice extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'hn_notice';

}
