<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 职工信息表
//        Schema::create('staff_info', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('department_id')->comment('部门号');
//            $table->integer('salary_id')->comment('工资号');
//            $table->integer('post_id')->comment('岗位号');
//            $table->string('name');
//            $table->string('sex')->deafult(0);  // 性别：0-女 1-男
//            $table->integer('age')->nullable();
//            $table->string('education_background')->comment('学历');
//            $table->integer('is_admin')->comment('管理员标志');
////            $table->foreign('salary_id')->references('id')->on('salary_info')->onDelete('cascade');
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
//        Schema::dropIfExists('staff_info');
    }
}
