<?php

namespace App\Admin\Metrics\Forms;


use App\Extensions\Constants;
use App\Extensions\FormSaver;
use Dcat\Admin\Widgets\Form;

class IconSetting extends Form
{
    use  FormSaver;

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);

        $this->dataKeys = [
            Constants::Icon_Favicon,
            Constants::Icon_Logo,
            Constants::Icon_Favicon_Apple,
            Constants::Icon_Logo_White
        ];
    }

    public function form()
    {
        $this->tab('图标配置', function (Form $form) {

            $form->text(Constants::Icon_Favicon, 'Favicon图标')
                ->help('Favicon图标，建议尺寸：16x16，格式：.ico')
                ->default('https://cdn.jsdelivr.net/gh/zhongshaofa/CDN/img/favicon.ico');
            if (admin_setting(Constants::Icon_Favicon)) {
                $form->display('当前Favicon')->with(function () {
                    return '<img src="' . admin_setting(Constants::Icon_Favicon) . '" alt="Favicon图标" style="width: 16px;height: 16px;">';
                });
            }

            $form->text(Constants::Icon_Favicon_Apple, 'Favicon图标（苹果）')
                ->help('Favicon图标（苹果），建议尺寸：180x180，格式：.png')
                ->default('https://cdn.jsdelivr.net/gh/zhongshaofa/CDN/img/favicon.png');

            if (admin_setting(Constants::Icon_Favicon_Apple)) {
                $form->display('当前Favicon（苹果）')->with(function () {
                    return '<img src="' . admin_setting(Constants::Icon_Favicon_Apple) . '" alt="Favicon图标（苹果）" style="width: 16px;height: 16px;">';
                });
            }

        });
    }
}
