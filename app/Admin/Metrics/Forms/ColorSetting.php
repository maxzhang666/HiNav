<?php

namespace App\Admin\Metrics\Forms;


use App\Extensions\Constants;
use App\Extensions\FormSaver;
use Dcat\Admin\Widgets\Form;

class ColorSetting extends Form
{
    use  FormSaver;

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);

        $this->dataKeys = [
            Constants::Color_Theme,
            Constants::Color_Full_Loading,
            constants::Color_Customer_Color
        ];
    }

    public function form()
    {
        $this->tab('颜色配置', function (Form $form) {
            $form->radio(Constants::Color_Theme, '主题颜色')
                ->options(Constants::Color_Theme_Data)
                ->default('white_mode')
                ->help('如果在前台通过“主题切换开关”手动切换主题，此设置无效，或者清除浏览器cookie才能生效');

            $form->switch(Constants::Color_Full_Loading, '全屏加载')
                ->default(0)
                ->help('开启后，页面加载时会显示全屏加载动画，关闭后，页面加载时不会显示全屏加载动画');

            $form->switch(Constants::Color_Customer_Color, '自定义颜色')
                ->default(0)
                ->help('开启后，可以自定义主题颜色，关闭后，主题颜色只能选择上面的主题颜色');

            #region TODO 自定义颜色
            #endregion
        });

    }
}
