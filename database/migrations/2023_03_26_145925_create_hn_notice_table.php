<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHnNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hn_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('content');
            $table->date('publish_date');
            $table->bigInteger('views')->default(0);
            $table->bigInteger('likes')->default(0);
            $table->string('link', 500)->nullable();
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
        Schema::dropIfExists('hn_notice');
    }
}
