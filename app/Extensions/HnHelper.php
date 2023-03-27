<?php

namespace App\Extensions;

use App\Models\HnItem;
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

    /**
     * @return string
     */
    public static function get_columns(): string
    {
        switch (admin_setting(Constants::Index_Block_Columns)) {
            case 2:
                $class = ' col-sm-6 ';
                break;
            case 3:
                $class = ' col-sm-6 col-md-4 ';
                break;
            case 4:
                $class = ' col-sm-6 col-md-4 col-xl-3 ';
                break;
            case 6:
                $class = ' col-sm-6 col-md-4 col-xl-5a col-xxl-6a ';
                break;
            case 10:
                $class = ' col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-10a ';
                break;
            default:
                $class = ' col-sm-6 col-md-4 col-lg-3 ';
        }
        return $class;
    }

    public static function before_class(HnItem $item): string
    {
        if ($item->type == 2 || !empty($item->qrcode)) {
            return 'wechat';
        } else if ($item->type == 3) {
            return 'down';
        }
        return '';
    }

    public static function new_window(): string
    {
        if (admin_setting(\App\Extensions\Constants::Basic_New_Window, 1)) {
            return 'target="_blank"';
        } else {
            return '';
        }
    }

    public static function nofollow($url, $details = false): string
    {
        if ($details)
            return '';
        else {
            if (admin_setting(Constants::Basic_Is_Nofollow, 0))
                //站内白名单判断
//                if (is_go_exclude($url))
                if (false)
                    return '';
                else
                    return 'rel="nofollow"';
            else
                return '';
        }
    }

    public static function go_to($url)
    {
        if (admin_setting(Constants::Basic_Url_Go_To, 0) == 1) {

            if (HnHelper::go_exclude($url))
                return $url;
            else
                return '/go/?url=' . urlencode(base64_encode($url));
        } else {
            return $url;
        }
    }

    public static function go_exclude($url): bool
    {
        $exclude_links = array();
        $site = get_option('home');
        if (!$site)
            $site = get_option('siteurl');
        $site = str_replace(array("http://", "https://"), '', $site);
        $p = strpos($site, '/');
        if ($p !== FALSE)
            $site = substr($site, 0, $p);/*网站根目录被排除在屏蔽之外，不仅仅是博客网址*/
        $exclude_links[] = "http://" . $site;
        $exclude_links[] = "https://" . $site;
        $exclude_links[] = 'javascript';
        $exclude_links[] = 'mailto';
        $exclude_links[] = 'skype';
        $exclude_links[] = '/';/* 有关相对链接*/
        $exclude_links[] = '#';/*用于内部链接*/

        //跳转白名单
        $a = [];// explode(PHP_EOL, io_get_option('exclude_links'));
        $exclude_links = array_merge($exclude_links, $a);
        foreach ($exclude_links as $val) {
            if (stripos(trim($url), trim($val)) === 0) {
                return true;
            }
        }
        return false;
    }
}
