<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentpostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 部门设置岗位-中间表
//        Schema::create('department_post', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('department_id');
//            $table->string('post_id');
//            $table->integer('num')->commnet('人数');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
//        Schema::dropIfExists('department_post');
    }
}
