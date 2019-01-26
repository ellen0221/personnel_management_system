<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 奖惩信息表
        Schema::create('reward_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('project')->comment('项目');
            $table->bigInteger('sum')->comment('金额');
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
        Schema::dropIfExists('reward_info');
    }
}
