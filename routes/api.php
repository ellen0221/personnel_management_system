<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('test/create', 'StaffController@create');
Route::any('test/findsalary/{id}', 'StaffController@salary');
Route::any('test/reward/{id}', 'StaffController@reward');

Route::group(['meddleware' => ['web']], function () {

    // 职工
    Route::any('info/index', 'StaffController@index');
    Route::any('info/create', 'StaffController@create');
    Route::any('info/update/{id}', 'StaffController@update');
    Route::any('info/detail/{id}', 'StaffController@detail');
    Route::any('info/delete/{id}', 'StaffController@delete');
    Route::any('info/setadmin/{id}', 'StaffController@setadmin');
    Route::any('info/admin', 'StaffController@admin');
    Route::any('info/canceladmin/{id}', 'StaffController@canceladmin');

    //
    Route::any('info/allreward', 'RewardController@allreward');
    Route::any('info/allpunish', 'RewardController@allpunish');

    // 工资
    Route::any('info/salaryindex', 'SalaryController@index');
    Route::any('info/createsalary', 'SalaryController@salary');

    // 部门
    Route::any('info/departmentindex', 'DepartmentController@index');
    Route::any('info/createdepartment', 'DepartmentController@create');
    Route::any('info/createpost/{id}', 'DepartmentController@createpost');
    Route::any('info/updatedepartment/{id}', 'DepartmentController@update');
    Route::any('info/departmentdetail/{id}', 'DepartmentController@detail');
    Route::any('info/deletedepartment/{id}', 'DepartmentController@delete');

    // 岗位
    Route::any('info/postindex', 'PostController@index');
    Route::any('info/createpost', 'PostController@create');
    Route::any('info/updatepost/{id}', 'PostController@update');
    Route::any('info/deletepost/{id}', 'PostController@delete');

    // 培训课程
    Route::any('info/courseindex', 'CourseController@index');
    Route::any('info/createcourse', 'CourseController@create');
    Route::any('info/coursedetail/{id}', 'CourseController@detail');
    Route::any('info/coursegrade/{id}', 'CourseController@grade');
    Route::any('info/updatecourse/{id}', 'CourseController@update');
    Route::any('info/deletecourse/{id}', 'CourseController@delete');

    // 奖惩
    Route::any('info/rewardindex', 'RewardController@index');
    Route::any('info/createreward', 'RewardController@create');
    Route::any('info/updatereward/{id}', 'RewardController@update');
    Route::any('info/deletereward/{id}', 'RewardController@delete');

    // 普通职工
    Route::any('staff/index', 'UserController@index');
    Route::any('staff/reset', 'UserController@reset');
    Route::any('staff/salary', 'UserController@salary');
    Route::any('staff/reward', 'UserController@reward');
    Route::any('staff/showcourse', 'UserController@showcourse');
    Route::any('staff/selected/{id}', 'UserController@selected');
    Route::any('staff/record', 'UserController@record');

    Route::any('test','StaffController@testsession');

    Route::any('alter', 'StaffController@alter');

});




