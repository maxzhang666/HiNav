<?php

use Dcat\Admin\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->resource('hn_menu', 'HnMenuController');
    $router->resource('hn_notice', 'HnNoticeController');


    $router->get('/', 'HomeController@index');
    $router->get('setting', 'SettingController@index');
    $router->get('setting/footer_setting', 'SettingController@footer_setting');
    $router->get('setting/color_setting', 'SettingController@color_setting');
    $router->get('setting/icon_setting', 'SettingController@icon_setting');
    $router->get('setting/content_setting', 'SettingController@content_setting');
    $router->get('setting/basic_setting', 'SettingController@basic_setting');
    $router->get('setting/other_setting', 'SettingController@other_setting');
});
