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
            'id'=>11, // 此id只要保证当前的数组中是唯一的即可
            'title'=>'基础配置',
            'icon'=>'fa-circle-o',
            'uri'=>'setting',
            'parent_id'=>1,
            'permission_id'=>'test', // 与权限绑定
            'roles'=>'test-roles', // 与角色绑定
        ],
        [
            'id'=>12, // 此id只要保证当前的数组中是唯一的即可
            'title'=>'页脚配置',
            'icon'=>'fa-circle-o',
            'uri'=>'setting/footer_setting',
            'parent_id'=>1,
            'permission_id'=>'test', // 与权限绑定
            'roles'=>'test-roles', // 与角色绑定
        ],

    ]);
});
