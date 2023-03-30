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
            Constants::Other_Hitokoto,
            Constants::Other_QrCode_Api,
            Constants::Other_Random_Head_Img,
            Constants::Other_IconFont_Switch,
            Constants::Other_Icon_Source_Https,
            Constants::Other_Icon_Source,
            Constants::Other_Icon_Source_Type,
        ];
    }

    public function form()
    {
        $this->switch(Constants::Other_Weather, '天气')->help('天气')->default(0);

        $this->radio(Constants::Other_Weather_Position, '天气位置')->help('天气展示位置')->options(Constants::Other_Weather_Position_Data)->default("header");

        $this->switch(Constants::Other_Hitokoto, '一言')->help('右上角显示一言')->default(0);

        $this->divider();


        $this->radio(Constants::Other_IconFont_Switch, '图标库')->help('是否使用自定义图标库')->options(Constants::Data_Switch)->default(0)
            ->when(1, function (Form $form) {
                $form->text(Constants::Other_IconFont_Url, '图标库地址')->help('图标库地址');
            });

        $this->divider();
        $this->text(Constants::Other_QrCode_Api, '二维码API')->help('二维码API')->default('https://my.tv.sohu.com/user/a/wvideo/getQRCode.do?width=$size&height=$size&text=$url');

        $this->textarea(Constants::Other_Random_Head_Img, '随机首图')->help('一行一个图片地址，注意不要有空格')
            ->default('https://i.loli.net/2020/01/16/uS1vfU5a3TC9kYe.jpg' . PHP_EOL . 'https://i.loli.net/2020/01/16/Achos3jun7BHPYC.jpg' . PHP_EOL . 'https://i.loli.net/2020/01/16/DLwVPrJq8O16dG7.jpg' . PHP_EOL . 'https://i.loli.net/2020/01/16/MWBL2q7bSGl5pcz.jpg' . PHP_EOL . 'https://i.loli.net/2020/01/16/6Oy5EltQCaim3R7.jpg' . PHP_EOL . 'https://i.loli.net/2020/01/16/lh6mCo5IuRALM1f.jpg' . PHP_EOL . 'https://i.loli.net/2020/01/16/ZB2CknpYy8zXx3c.jpg' . PHP_EOL . 'https://i.loli.net/2020/01/16/SWRgep4hKOU7uac.jpg' . PHP_EOL . 'https://i.loli.net/2020/01/16/95Xzaj7x4OVKqFv.jpg' . PHP_EOL . 'https://i.loli.net/2020/01/16/AKv8lyzT3rUH2Ic.jpg');

        $this->switch(Constants::Other_Icon_Source_Https, '图源Https要求')->help("根据图标源 api 要求设置，如果api要求不能包含协议名称，请开启此选项")->default(1);
        $this->text(Constants::Other_Icon_Source, "图标源")->help('图标Api')->default("https://api.iowen.cn/favicon/");
        $this->text(Constants::Other_Icon_Source_Type, "图标源格式")->help('如：.png ,请根据api格式要求设置，如不需要请留空')->default('.png');
    }
}
