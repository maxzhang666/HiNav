<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

class HnNotice extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'hn_notice';

}
