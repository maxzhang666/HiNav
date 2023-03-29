<?php

/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

use Dcat\Admin\Layout\Menu;
use Dcat\Admin\Layout\Navbar;

Admin::navbar(function (Navbar $navbar) {
    $navbar->$method(
        <<<HTML
<ul class="nav navbar-nav">
    <li class="nav-item">        &nbsp;
        <a style="cursor: pointer" href="/" target="_blank">
            <i class="feather icon-github" style="font-size: 1.5rem"></i> 打开首页
        </a>
    </li>
</ul>
HTML
    );
});
Admin::menu(function (Menu $menu) {
    $menu->add([
        //系统配置
        [
            'id' => 1, // 此id只要保证当前的数组中是唯一的即可
            'title' => '系统配置',
            'icon' => 'feather icon-align-justify',
            'uri' => '/#',
            'parent_id' => 0,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 11, // 此id只要保证当前的数组中是唯一的即可
            'title' => '首页信息',
            'icon' => 'fa-circle-o',
            'uri' => 'setting',
            'parent_id' => 1,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 12, // 此id只要保证当前的数组中是唯一的即可
            'title' => '页脚配置',
            'icon' => 'fa-circle-o',
            'uri' => 'setting/footer_setting',
            'parent_id' => 1,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 13, // 此id只要保证当前的数组中是唯一的即可
            'title' => '颜色效果',
            'icon' => 'fa-circle-o',
            'uri' => 'setting/color_setting',
            'parent_id' => 1,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 14, // 此id只要保证当前的数组中是唯一的即可
            'title' => '图标配置',
            'icon' => 'fa-circle-o',
            'uri' => 'setting/icon_setting',
            'parent_id' => 1,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 15, // 此id只要保证当前的数组中是唯一的即可
            'title' => '内容配置',
            'icon' => 'fa-circle-o',
            'uri' => 'setting/content_setting',
            'parent_id' => 1,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 16, // 此id只要保证当前的数组中是唯一的即可
            'title' => '基础配置',
            'icon' => 'fa-circle-o',
            'uri' => 'setting/basic_setting',
            'parent_id' => 1,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 17,
            'title' => '其他配置',
            'icon' => 'fa-circle-o',
            'uri' => 'setting/other_setting',
            'parent_id' => 1,
            'permission_id' => 'test',
            'roles' => 'test-roles',
        ],
        [
            'id' => 18,
            'title' => '广告配置',
            'icon' => 'fa-circle-o',
            'uri' => 'setting/ads_setting',
            'parent_id' => 1,
            'permission_id' => 'test',
            'roles' => 'test-roles',
        ],


        //导航设置
        [
            'id' => 2, // 此id只要保证当前的数组中是唯一的即可
            'title' => '导航设置',
            'icon' => 'fa-chain',
            'uri' => '/#',
            'parent_id' => 0,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 21, // 此id只要保证当前的数组中是唯一的即可
            'title' => '公告管理',
            'icon' => 'fa-circle-o',
            'uri' => 'hn_notice',
            'parent_id' => 2,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 22, // 此id只要保证当前的数组中是唯一的即可
            'title' => '菜单管理',
            'icon' => 'fa-circle-o',
            'uri' => 'hn_menu',
            'parent_id' => 2,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],
        [
            'id' => 23, // 此id只要保证当前的数组中是唯一的即可
            'title' => '网址管理',
            'icon' => 'fa-circle-o',
            'uri' => 'hn_item',
            'parent_id' => 2,
            'permission_id' => 'test', // 与权限绑定
            'roles' => 'test-roles', // 与角色绑定
        ],

    ]);
});
