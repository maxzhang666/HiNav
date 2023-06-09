<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHnMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hn_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->integer('pid')->nullable();
            $table->string('link')->default('')->nullable();
            $table->integer('type')->nullable();
            $table->string('icon')->default('')->nullable();
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('hn_menu');
    }
}
