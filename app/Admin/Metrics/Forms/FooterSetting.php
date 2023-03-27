<?php

namespace App\Admin\Metrics\Forms;


use App\Extensions\Constants;
use App\Extensions\FormSaver;
use Dcat\Admin\Widgets\Form;

class FooterSetting extends Form
{
    use  FormSaver;

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);

        $this->dataKeys = [
            Constants::Footer_Beian_No,
            Constants::Footer_Analytics_Code,
            Constants::Footer_CopyRight,
        ];
    }

    public function form()
    {
        $this->tab('页脚配置', function (Form $form) {
            $form->text(Constants::Footer_Beian_No, '备案号');
        });

        $this->textarea(Constants::Footer_CopyRight, '版权信息')->rows(3)->help('版权信息');



        $this->textarea(Constants::Footer_Analytics_Code, '统计代码')->rows(3)->help('统计代码');

    }
}
