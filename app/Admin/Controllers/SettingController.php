<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Forms\ColorSetting;
use App\Admin\Metrics\Forms\FooterSetting;
use App\Admin\Metrics\Forms\IconSetting;
use App\Admin\Metrics\Forms\IndexSetting;
use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Card;

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
        return $content->header('首页配置')->description('')->body(new Card(IndexSetting::make()));
    }

    public function footer_setting(Content $content): Content
    {
        return $content->header('页脚配置')->description('')->body(new Card(FooterSetting::make()));
    }

    public function color_setting(Content $content): Content
    {
        return $content->header('颜色配置')->description('')->body(new Card(ColorSetting::make()));
    }

    public function icon_setting(Content $content): Content
    {
        return $content->header('图标配置')->description('')->body(new Card(IconSetting::make()));
    }
}
