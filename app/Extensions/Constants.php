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
    #endregion

    #region 页脚配置
    const Footer_Beian_No = 'footer_beian_no';
    #endregion

    #region 图标设置
    const Icon_Logo = 'icon_logo';
    const Icon_Logo_White = 'icon_logo_white';
    const Icon_Favicon = 'icon_favicon';
    const Icon_Favicon_Apple = 'icon_favicon_apple';
    #endregion


    #region 颜色配置
    const Color_Theme = 'color_theme';
    const Color_Theme_Data = [
//        '深色' => 'dark',
//        '黑白' => 'black_white',
//        '浅灰' => 'light_gray',

        'black_mode' => '深色',
        'white_mode' => '亮色',
        'grey_mode' => '浅灰',
    ];

    const Color_Full_Loading = 'color_full_loading';
    const Color_Customer_Color = 'color_customer_color';
    #endregion
}
