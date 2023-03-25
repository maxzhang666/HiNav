<?php

namespace App\Extensions;

final class Constants
{
    #region 站点信息
    const Site_Title = 'site_title';
    const Site_Description = 'site_description';
    const Site_Keywords = 'site_keywords';
    const Site_Url = 'site_url';

    #endregion

    #region 首页配置
    const Index_Block_Columns = 'index_block_columns';
    const Index_Block_Columns_Data = [
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '6' => 6,
        '10' => 10,
    ];
    const Index_Tab_Parent_Name = 'index_tab_parent_name';
    const Index_Search_Position = 'index_search_position';
    const Index_Search_Big = 'index_search_big';
    const Index_Search_Background = 'index_search_background';
    const Index_Search_Background_Gradual = 'index_search_background_gradual';

    const Index_Search_Position_Data = [
        'home' => '首页',
        'top' => '顶部',
        'tool' => '工具栏',
    ];
    const Index_Search_Background_Data = [
        'no-bg' => '无背景',
        'css-color' => '颜色',
        'css-img' => '自定义图片',
        'css-bing' => 'bing 每日图片',
        'canvas-fx' => 'canvas 特效',
    ];
    const Index_Search_Background_Color1 = 'index_search_background_color1';
    const Index_Search_Background_Color2 = 'index_search_background_color2';
    const Index_Search_Background_Color3 = 'index_search_background_color3';
    const Index_Search_Background_Img= 'index_search_background_img';
    const Index_Search_Background_Canvas = 'index_search_background_canvas';
    #endregion

    #region 页脚配置
    const Footer_Beian_No = 'footer_beian_no';
    #endregion

    #region 图标设置
    const Icon_Logo = 'icon_logo';
    const Icon_Logo_White = 'icon_logo_white';
    const Icon_Logo_Small = 'icon_logo_small';
    const Icon_Logo_Small_White = 'icon_logo_small_white';
    const Icon_Favicon = 'icon_favicon';
    const Icon_Favicon_Apple = 'icon_favicon_apple';
    #endregion

    #region 基础配置
    const Basic_Mini_Nav = 'basic_mini_nav';
    const Basic_Page_Detail = 'basic_page_detail';
    const Basic_To_Go = 'basic_to_go';
    #endregion

    #region 颜色配置
    const Color_Theme = 'color_theme';
    const Color_Theme_Data = [
//        '深色' => 'dark',
//        '黑白' => 'black_white',
//        '浅灰' => 'light_gray',

        'black_mode' => '深色',
        'white_mode' => '亮色',
        'grey_mode' => '亮灰',
    ];

    const Color_Full_Loading = 'color_full_loading';
    const Color_Customer_Color = 'color_customer_color';
    #endregion

    #region 菜单配置
    const Menu_Type = [


        0 => '侧边主菜单',
        1 => '侧边底部菜单',
        2 => '顶部主菜单',
        3 => '搜索推荐菜单',
    ];
    const Menu_Type_Data = [
        '侧边主菜单' => 0,
        '侧边底部菜单' => 1,
        '顶部主菜单' => 2,
        '搜索推荐菜单' => 3,
    ];
    #endregion

    #region 网址配置
    const Content_Card_Mode = 'content_card_mode';
    #endregion

    #region 其他配置
    const Other_Weather = 'other_weather';
    const Other_Weather_Position = 'other_weather_position';
    const Other_Hitokoto = 'other_hitokoto';
    const Other_Weather_Position_Data = [
        'header' => '顶部',
        'footer' => '底部小工具',
    ];
    #endregion
    const Data_Switch = [
        1 => '开启',
        0 => '关闭',
    ];
}
