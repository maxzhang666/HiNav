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
            Constants::Site_Title,
            Constants::Site_Description,
            Constants::Site_Keywords,
            Constants::Site_Url,

            Constants::Index_Card_Prompt,
            Constants::Index_Block_Columns,
            Constants::Index_Site_Show_Num,
            Constants::Index_Two_Columns_For_Mini,
            Constants::Index_Tab_Parent_Name,
            Constants::Index_Notice,
            Constants::Index_Notice_Show,
            Constants::Index_Notice_Show_Num,

            Constants::Index_Search_Position,
            Constants::Index_Search_Big,
            Constants::Index_Search_Background,
            Constants::Index_Search_Background_Color1,
            Constants::Index_Search_Background_Color2,
            Constants::Index_Search_Background_Color3,
            Constants::Index_Search_Background_Img,
            Constants::Index_Search_Background_Canvas,
            Constants::Index_Search_Background_Gradual

        ];
    }

    public function form()
    {
        $this->tab('站点信息', function (Form $form) {
            $form->text(Constants::Site_Title, '站点标题')->required();
            $form->text(Constants::Site_Url, '站点地址')->required();
            $form->text(Constants::Site_Keywords, '站点关键词')->required();
            $form->textarea(Constants::Site_Description, '站点描述')->required();
        });
        $this->tab('首页配置', function (Form $form) {
            $form->radio(Constants::Index_Card_Prompt, '网址块提示样式')->options(Constants::Index_Card_Prompt_Data)->default('url')->help('网址块提示样式');
            $form->radio(Constants::Index_Block_Columns, '网址列数')->options(Constants::Index_Block_Columns_Data)->default(4)->help('网址块列表一行显示的个数');
            $form->number(Constants::Index_Site_Show_Num, '网址展示数')->help('在首页分类下显示的网址数量')->default(20);
            $form->switch(Constants::Index_Two_Columns_For_Mini, '小屏幕显示两列')->help('小屏幕下网址块列表一行显示两列')->default(0);
            $form->divider();
            $form->switch(Constants::Index_Tab_Parent_Name, '显示父级分类')->help('网址块分类名前面显示父级分类名称')->default(0);
            $form->radio(Constants::Index_Notice, '公告')->options(Constants::Data_Switch)->default(0)->help('首页公告')
                ->when(1, function (Form $form) {
                    $form->switch(Constants::Index_Notice_Show, '公告展示')->help('公告内容');
                    $form->number(Constants::Index_Notice_Show_Num, '公告展示数')->help('公告展示数')->default(2);
                });
            $form->divider();
            $form->checkbox(Constants::Index_Search_Position, '搜索框位置')->options(Constants::Index_Search_Position_Data)->default(["home"])->help('搜索框显示位置')
                ->when(["home"], function (Form $form) {
                    $form->radio(Constants::Index_Search_Big, '大搜索框')->options(Constants::Data_Switch)->default(0)->help('搜索框大小')
                        ->when(1, function (Form $form) {
                            $form->radio(Constants::Index_Search_Background, '背景样式')->options(Constants::Index_Search_Background_Data)->default("css-color")->help('搜索框背景样式')
                                ->when('css-color', function (Form $form) {
                                    $form->color(Constants::Index_Search_Background_Color1, '背景颜色1')->help('搜索框背景颜色')->default("#ff3a2b");
                                    $form->color(Constants::Index_Search_Background_Color2, '背景颜色2')->help('搜索框背景颜色')->default("#ed17de");
                                    $form->color(Constants::Index_Search_Background_Color3, '背景颜色3')->help('搜索框背景颜色')->default("#f4275e");
                                })
                                ->when('css-img', function (Form $form) {
                                    $form->image(Constants::Index_Search_Background_Img, '背景图片')->help('搜索框背景图片')->uniqueName()->autoUpload();
                                })
                                ->when('canvas-fx', function (Form $form) {
                                    $form->radio(Constants::Index_Search_Background_Canvas, '背景特效')->options([
                                        0 => '随机',
                                        1 => '1',
                                        2 => '2',
                                        3 => '3',
                                        4 => '4',
                                        5 => '5',
                                        6 => '6',
                                        7 => '7'
                                    ])->default(0)->help('搜索框背景特效');
                                });
                        });
                    $form->switch(Constants::Index_Search_Background_Gradual, '渐变背景')->help('搜索框背景渐变')->default(0);
                });
        });

    }
}
