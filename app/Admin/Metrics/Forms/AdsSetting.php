<?php

namespace App\Admin\Metrics\Forms;


use App\Extensions\Constants;
use App\Extensions\FormSaver;
use Dcat\Admin\Widgets\Form;

class AdsSetting extends Form
{
    use  FormSaver;

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);

        $this->dataKeys = [
            Constants::Ad_Index_Top,
            Constants::Ad_Index_Top_One,
            Constants::Ad_Index_Top_One_Content,
            Constants::Ad_Index_Top_Two,
            Constants::Ad_Index_Top_Two_Content,
            Constants::Ad_Index_Bottom,
        ];
    }

    public function form()
    {
        $this->tab("首页广告", function (Form $form) {
            $form->radio(Constants::Ad_Index_Top, '顶部广告')->options(Constants::Data_Switch)->default(0)->help('大搜索模式无效')
                ->when(1, function (Form $form) {
                    $form->switch(Constants::Ad_Index_Top_One, '顶部广告1')->default(0)->help('是否开启顶部广告1');
                    $form->textarea(Constants::Ad_Index_Top_One_Content, '顶部广告1')->rows(3)->help('顶部广告1')
                        ->default('<a href="#" target="_blank"><img src="' . asset('asset/imgs/ad.jpg') . '" alt="广告也精彩" /></a>');
                    $form->divider();
                    $form->switch(Constants::Ad_Index_Top_Two, '顶部广告2')->default(0)->help('是否开启顶部广告2');
                    $form->textarea(Constants::Ad_Index_Top_Two_Content, '顶部广告2')->rows(3)->help('顶部广告2')
                        ->default('<a href="#" target="_blank"><img src="' . asset('asset/imgs/ad.jpg') . '" alt="广告也精彩" /></a>');
                });
            $form->divider();
            $form->radio(Constants::Ad_Index_Bottom, '底部广告')->options(Constants::Data_Switch)->default(0)->help('大搜索模式无效')
                ->when(1, function (Form $form) {
                    $form->textarea(Constants::Ad_Index_Bottom_Content, '底部广告')->rows(3)->help('底部广告')
                        ->default('<a href="#" target="_blank"><img src="' . asset('asset/imgs/ad.jpg') . '" alt="广告也精彩" /></a>');
                });
        });

    }
}
