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

            Constants::Index_Block_Columns
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
        });

    }
}
