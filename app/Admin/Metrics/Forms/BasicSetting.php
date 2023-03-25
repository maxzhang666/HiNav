<?php

namespace App\Admin\Metrics\Forms;


use App\Extensions\Constants;
use App\Extensions\FormSaver;
use Dcat\Admin\Widgets\Form;

class BasicSetting extends Form
{
    use  FormSaver;

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);

        $this->dataKeys = [
            Constants::Basic_Mini_Nav,
            Constants::Basic_Page_Detail,
            Constants::Basic_To_Go,
        ];
    }

    public function form()
    {
        $this->switch(Constants::Basic_Mini_Nav, '侧边栏折叠')->help('侧边栏折叠')->default(0);

        $this->radio(Constants::Basic_Page_Detail, '页面详情')->options(Constants::Data_Switch)->help('启用网址详情页,关闭状态为网址块直接跳转到目标网址。')->default(0)
            ->when(1, function ($form) {
                $form->switch(Constants::Basic_To_Go, '直达按钮')->help('网址块显示直达按钮')->default(0);
            });


    }
}
