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
            Constants::Icon_Logo_White,
            Constants::Icon_Logo_Small,
            Constants::Icon_Logo_Small_White,
        ];
    }

    public function form()
    {
        $this->tab('图标配置', function (Form $form) {

            $form->text(Constants::Icon_Logo, 'Logo图标')
                ->help('Logo图标，建议尺寸：高80px，长小于360px，格式：.png')
                ->default(asset('asset/imgs/logo@2x.png'));
            if (admin_setting(Constants::Icon_Logo, asset('asset/imgs/logo@2x.png'))) {
                $form->display('当前Logo')->with(function () {
                    return '<img src="' . admin_setting(Constants::Icon_Logo, asset('asset/imgs/logo@2x.png')) . '" alt="Logo图标" style="width: 360px;height: 80px;background-color: lightgrey;">';
                });
            }

            $form->text(Constants::Icon_Logo_White, 'Logo图标（亮色）')
                ->help('Logo图标（白色），建议尺寸：高80px，长小于360px，格式：.png')
                ->default(asset('asset/imgs/logo_l@2x.png'));
            if (admin_setting(Constants::Icon_Logo_White, asset('asset/imgs/logo_l@2x.png'))) {
                $form->display('当前Logo（亮色）')->with(function () {
                    return '<img src="' . admin_setting(Constants::Icon_Logo_White, asset('asset/imgs/logo_l@2x.png')) . '" alt="Logo图标（白色）" style="width: 360px;height: 80px;">';
                });
            }

            $form->divider();

            $form->text(Constants::Icon_Logo_Small, 'Logo图标（小）')
                ->help('Logo图标（小），建议尺寸：80x80，格式：.png')
                ->default(asset('asset/imgs/logo-collapsed@2x.png'));
            if (admin_setting(Constants::Icon_Logo_Small, asset('asset/imgs/logo-collapsed@2x.png'))) {
                $form->display('当前Logo（小）')->with(function () {
                    return '<img src="' . admin_setting(Constants::Icon_Logo_Small, asset('asset/imgs/logo-collapsed@2x.png')) . '" alt="Logo图标（小）" style="width: 80px;height: 80px;background-color:lightgrey">';
                });
            }

            $form->text(Constants::Icon_Logo_Small_White, 'Logo图标（小，亮色）')
                ->help('Logo图标（小，白色），建议尺寸：80x80，格式：.png')
                ->default(asset('asset/imgs/logo-dark_collapsed@2x.png'));
            if (admin_setting(Constants::Icon_Logo_Small_White, asset('asset/imgs/logo-dark_collapsed@2x.png'))) {
                $form->display('当前Logo（小，亮色）')->with(function () {
                    return '<img src="' . admin_setting(Constants::Icon_Logo_Small_White, asset('asset/imgs/logo-dark_collapsed@2x.png')) . '" alt="Logo图标（小，白色）" style="width: 80px;height: 80px;">';
                });
            }

            $form->divider();

            $form->text(Constants::Icon_Favicon, 'Favicon图标')
                ->help('Favicon图标，建议尺寸：16x16，格式：.ico')
                ->default(asset('asset/imgs/favicon.ico'));
            if (admin_setting(Constants::Icon_Favicon)) {
                $form->display('当前Favicon')->with(function () {
                    return '<img src="' . admin_setting(Constants::Icon_Favicon) . '" alt="Favicon图标" style="width: 16px;height: 16px;">';
                });
            }

            $form->text(Constants::Icon_Favicon_Apple, 'Favicon图标（苹果）')
                ->help('Favicon图标（苹果），建议尺寸：180x180，格式：.png')
                ->default(asset('asset/imgs/favicon.ico'));

            if (admin_setting(Constants::Icon_Favicon_Apple)) {
                $form->display('当前Favicon（苹果）')->with(function () {
                    return '<img src="' . admin_setting(Constants::Icon_Favicon_Apple) . '" alt="Favicon图标（苹果）" style="width: 16px;height: 16px;">';
                });
            }

        });
    }
}
