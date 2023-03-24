<?php

namespace App\Admin\Metrics\Forms;


use App\Extensions\Constants;
use App\Extensions\FormSaver;
use Dcat\Admin\Widgets\Form;

class ContentSetting extends Form
{
    use  FormSaver;

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);

        $this->dataKeys = [
            Constants::Content_Card_Mode
        ];
    }

    public function form()
    {
        $this->tab('网址设置', function (Form $form) {
            $form->radio(Constants::Content_Card_Mode, '卡片样式')->options([
                'max' => "<img src='" . asset('asset/imgs/op-site-c-max.jpg') . "' alt='max'>",
                'min' => "<img src='" . asset('asset/imgs/op-site-c-min.jpg') . "' alt='min'>",
                'def' => "<img src='" . asset('asset/imgs/op-site-c-def.jpg') . "' alt='def'>",
            ])->default('def')->help('选择首页网址块显示风格：大、中、小');
        });

    }
}
