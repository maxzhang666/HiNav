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
            Constants::Footer_Beian_No
        ];
    }

    public function form()
    {
        $this->tab('页脚配置', function (Form $form) {
            $form->text(Constants::Footer_Beian_No, '备案号');
        });

    }
}
