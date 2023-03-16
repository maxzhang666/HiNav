<?php

namespace App\Admin\Metrics\Forms;


use App\Extensions\Constants;
use App\Extensions\FormSaver;
use Dcat\Admin\Widgets\Form;

class IndexSetting extends Form
{
    use  FormSaver;

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);

        $this->dataKeys = [
            'index_setting'
        ];
    }

    public function form()
    {
        $this->tab('首页配置', function (Form $form) {
            $form->number(Constants::Index_Block_Columns, '网址列数')->required()->default(4)->help('网址块列表一行显示的个数');
        });

    }
}
