<?php

namespace App\Extensions;

use Dcat\Admin\Support\Setting;
use Illuminate\Support\Facades\Cookie;

class HnHelper
{

    /**
     * @return Setting|mixed|string
     */
    public static function get_theme_mode()
    {
        $default_c = $theme_mode = admin_setting(Constants::Color_Theme);
        if ($default_c == 'black-mode') {
            $default_c = '';
        }
        $night_mode = Cookie::get('night_mode');
        if ($night_mode != '') {
            return (trim($night_mode) == '0' ? 'black-mode' : $default_c);
        } elseif ($theme_mode) {
            return $theme_mode;
        } else {
            return (trim($night_mode) == '0' ? 'black-mode' : $default_c);
        }
    }
}
