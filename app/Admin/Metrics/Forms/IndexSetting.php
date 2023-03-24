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

            Constants::Index_Block_Columns,
            Constants::Index_Tab_Parent_Name,

            Constants::Basic_Mini_Nav,
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
            $form->radio(Constants::Index_Block_Columns, '网址列数')->options(Constants::Index_Block_Columns_Data)->default(4)->help('网址块列表一行显示的个数');
            $form->switch(Constants::Basic_Mini_Nav, '侧边栏折叠')->help('侧边栏折叠')->default(0);
            $form->switch(Constants::Index_Tab_Parent_Name, '显示父级分类')->help('网址块分类名前面显示父级分类名称')->default(0);
        });

    }
}
