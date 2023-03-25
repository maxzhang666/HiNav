<?php

namespace App\Admin\Metrics\Forms;


use App\Extensions\Constants;
use App\Extensions\FormSaver;
use Dcat\Admin\Widgets\Form;

class OtherSetting extends Form
{
    use  FormSaver;

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);

        $this->dataKeys = [
            Constants::Other_Weather,
            Constants::Other_Weather_Position,
            Constants::Other_Hitokoto
        ];
    }

    public function form()
    {
        $this->switch(Constants::Other_Weather, '天气')->help('天气')->default(0);

        $this->radio(Constants::Other_Weather_Position, '天气位置')->help('天气展示位置')->options(Constants::Other_Weather_Position_Data)->default("header");

        $this->switch(Constants::Other_Hitokoto, '一言')->help('右上角显示一言')->default(0);
    }
}
