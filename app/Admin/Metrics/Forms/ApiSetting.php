<?php

namespace App\Admin\Metrics\Forms;


use App\Extensions\Constants;
use App\Extensions\FormSaver;
use Dcat\Admin\Widgets\Form;

class ApiSetting extends Form
{
    use  FormSaver;

    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);

        $this->dataKeys = [
            Constants::Api_Token
        ];
    }

    public function form()
    {
        $this->text(Constants::Api_Token, 'API Token')->required()->help('书签扩展通信密钥');
    }
}
