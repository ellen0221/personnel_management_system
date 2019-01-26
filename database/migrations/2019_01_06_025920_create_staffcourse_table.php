<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffcourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 职工选课-中间表
//        Schema::create('staff_course', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('staff_id');
//            $table->string('course_id');
//            $table->integer('grade')->deafult(0)->comment('成绩');
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
//        Schema::dropIfExists('staff_course');
    }
}
