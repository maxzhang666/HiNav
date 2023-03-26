<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHnItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hn_item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('名称');
            $table->string('desc')->default('')->comment('简介');
            $table->string('desc_min')->default('')->comment('一句话简介');
            $table->string('type')->default('')->comment('类型，1网址2公众号/小程序');
            $table->string('link')->default('')->comment('地址');
            $table->string('bak_link')->nullable()->comment('备用地址');
            $table->string('qrcode')->nullable()->comment('二维码');
            $table->string('official_link')->nullable()->comment('官方站点');
            $table->string('language')->nullable()->comment('站点语言');
            $table->string('country')->nullable()->comment('站点国家');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hn_item');
    }
}
