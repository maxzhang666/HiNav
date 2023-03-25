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

    const Index_Notice ='index_notice';
    const Index_Notice_Show = 'index_notice_show';
    const Index_Notice_Show_Num = 'index_notice_show_num';

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
    const Index_Search_Background_Img = 'index_search_background_img';
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

    const Data_Search_List = [
        [
            'id' => 'group-a',
            'name' => '常用',
            'default' => 'type-baidu',
            'list' => [
                [
                    'name' => '百度',
                    'placeholder' => '百度一下',
                    'id' => 'type-baidu',
                    'url' => 'https://www.baidu.com/s?wd=',
                ],
                [
                    'name' => 'Google',
                    'placeholder' => '谷歌两下',
                    'id' => 'type-google',
                    'url' => 'https://www.google.com/search?q=',
                ],
//                [
//                    'name' => '站内',
//                    'placeholder' => '站内搜索',
//                    'id' => 'type-zhannei',
//                    'url' => home_url() . '/?post_type=sites&s=',
//                ],
                [
                    'name' => '淘宝',
                    'placeholder' => '淘宝',
                    'id' => 'type-taobao',
                    'url' => 'https://s.taobao.com/search?q=',
                ],
                [
                    'name' => 'Bing',
                    'placeholder' => '微软Bing搜索',
                    'id' => 'type-bing',
                    'url' => 'https://cn.bing.com/search?q=',
                ],
            ]
        ],
        [
            'id' => 'group-b',
            'name' => '搜索',
            'default' => 'type-baidu1',
            'list' => [
                [
                    'name' => '百度',
                    'placeholder' => '百度一下',
                    'id' => 'type-baidu1',
                    'url' => 'https://www.baidu.com/s?wd=',
                ],
                [
                    'name' => 'Google',
                    'placeholder' => '谷歌两下',
                    'id' => 'type-google1',
                    'url' => 'https://www.google.com/search?q=',
                ],
                [
                    'name' => '360',
                    'placeholder' => '360好搜',
                    'id' => 'type-360',
                    'url' => 'https://www.so.com/s?q=',
                ],
                [
                    'name' => '搜狗',
                    'placeholder' => '搜狗搜索',
                    'id' => 'type-sogo',
                    'url' => 'https://www.sogou.com/web?query=',
                ],
                [
                    'name' => 'Bing',
                    'placeholder' => '微软Bing搜索',
                    'id' => 'type-bing1',
                    'url' => 'https://cn.bing.com/search?q=',
                ],
                [
                    'name' => '神马',
                    'placeholder' => 'UC移动端搜索',
                    'id' => 'type-sm',
                    'url' => 'https://yz.m.sm.cn/s?q=',
                ],
            ]
        ],
        [
            'id' => 'group-c',
            'name' => '工具',
            'default' => 'type-br',
            'list' => [
                [
                    'name' => '权重查询',
                    'placeholder' => '请输入网址(不带http://)',
                    'id' => 'type-br',
                    'url' => 'http://rank.chinaz.com/all/',
                ],
                [
                    'name' => '友链检测',
                    'placeholder' => '请输入网址(不带http://)',
                    'id' => 'type-links',
                    'url' => 'http://link.chinaz.com/',
                ],
                [
                    'name' => '备案查询',
                    'placeholder' => '请输入网址(不带http://)',
                    'id' => 'type-icp',
                    'url' => 'https://icp.aizhan.com/',
                ],
                [
                    'name' => 'PING检测',
                    'placeholder' => '请输入网址(不带http://)',
                    'id' => 'type-ping',
                    'url' => 'http://ping.chinaz.com/',
                ],
                [
                    'name' => '死链检测',
                    'placeholder' => '请输入网址(不带http://)',
                    'id' => 'type-404',
                    'url' => 'http://tool.chinaz.com/Links/?DAddress=',
                ],
                [
                    'name' => '关键词挖掘',
                    'placeholder' => '请输入关键词',
                    'id' => 'type-ciku',
                    'url' => 'http://www.ciku5.com/s?wd=',
                ],
            ]
        ],
        [
            'id' => 'group-d',
            'name' => '社区',
            'default' => 'type-zhihu',
            'list' => [
                [
                    'name' => '知乎',
                    'placeholder' => '知乎',
                    'id' => 'type-zhihu',
                    'url' => 'https://www.zhihu.com/search?type=content&q=',
                ],
                [
                    'name' => '微信',
                    'placeholder' => '微信',
                    'id' => 'type-wechat',
                    'url' => 'http://weixin.sogou.com/weixin?type=2&query=',
                ],
                [
                    'name' => '微博',
                    'placeholder' => '微博',
                    'id' => 'type-weibo',
                    'url' => 'http://s.weibo.com/weibo/',
                ],
                [
                    'name' => '豆瓣',
                    'placeholder' => '豆瓣',
                    'id' => 'type-douban',
                    'url' => 'https://www.douban.com/search?q=',
                ],
                [
                    'name' => '搜外问答',
                    'placeholder' => 'SEO问答社区',
                    'id' => 'type-why',
                    'url' => 'https://ask.seowhy.com/search/?q=',
                ],
            ]
        ],
        [
            'id' => 'group-e',
            'name' => '生活',
            'default' => 'type-taobao1',
            'list' => [
                [
                    'name' => '淘宝',
                    'placeholder' => '淘宝',
                    'id' => 'type-taobao1',
                    'url' => 'https://s.taobao.com/search?q=',
                ],
                [
                    'name' => '京东',
                    'placeholder' => '京东',
                    'id' => 'type-jd',
                    'url' => 'https://search.jd.com/Search?keyword=',
                ],
                [
                    'name' => '下厨房',
                    'placeholder' => '下厨房',
                    'id' => 'type-xiachufang',
                    'url' => 'http://www.xiachufang.com/search/?keyword=',
                ],
                [
                    'name' => '香哈菜谱',
                    'placeholder' => '香哈菜谱',
                    'id' => 'type-xiangha',
                    'url' => 'https://www.xiangha.com/so/?q=caipu&s=',
                ],
                [
                    'name' => '12306',
                    'placeholder' => '12306',
                    'id' => 'type-12306',
                    'url' => 'http://www.12306.cn/?',
                ],
                [
                    'name' => '快递100',
                    'placeholder' => '快递100',
                    'id' => 'type-kd100',
                    'url' => 'http://www.kuaidi100.com/?',
                ],
                [
                    'name' => '去哪儿',
                    'placeholder' => '去哪儿',
                    'id' => 'type-qunar',
                    'url' => 'https://www.qunar.com/?',
                ],
            ]
        ],
        [
            'id' => 'group-f',
            'name' => '求职',
            'default' => 'type-zhaopin',
            'list' => [
                [
                    'name' => '智联招聘',
                    'placeholder' => '智联招聘',
                    'id' => 'type-zhaopin',
                    'url' => 'https://sou.zhaopin.com/jobs/searchresult.ashx?kw=',
                ],
                [
                    'name' => '前程无忧',
                    'placeholder' => '前程无忧',
                    'id' => 'type-51job',
                    'url' => 'https://search.51job.com/?',
                ],
                [
                    'name' => '拉钩网',
                    'placeholder' => '拉钩网',
                    'id' => 'type-lagou',
                    'url' => 'https://www.lagou.com/jobs/list_',
                ],
                [
                    'name' => '猎聘网',
                    'placeholder' => '猎聘网',
                    'id' => 'type-liepin',
                    'url' => 'https://www.liepin.com/zhaopin/?key=',
                ],
            ]
        ],

    ];


}
