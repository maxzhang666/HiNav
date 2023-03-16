<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Content;

/**
 * Class SettingController
 * @package App\Admin\Controllers
 */
class SettingController extends Controller
{
    /**
     * @param Content $content
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content->header('')->description('')->body('');
    }
}
