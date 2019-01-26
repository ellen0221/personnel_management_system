<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 工资信息表
        Schema::create('salary_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id');
            $table->integer('basic')->comment('基本工资');
            $table->integer('level')->comment('级别工资');
            $table->integer('pension')->comment('养老金');
            $table->integer('unemployment')->comment('失业金');
            $table->integer('fund')->comment('公积金');
            $table->integer('tax')->commnet('纳税');
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
        Schema::dropIfExists('salary_info');
    }
}
