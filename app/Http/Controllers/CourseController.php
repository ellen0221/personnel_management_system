<?php

namespace App\Http\Controllers;

use App\Course;
use App\Staff;
use App\StaffCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // 信息显示页
    public function index(Request $request)
    {
        $info = Course::paginate(10);
//        $info = DB::select('SELECT course_info.*,COUNT(staff_course.staff_id) select_num from course_info,staff_course
//                            WHERE staff_course.course_id=course_info.id GROUP BY course_info.id');
//        $info1 = DB::select('SELECT * from course_info where id not in (select distinct course_id from staff_course)');
//        dd($info1);
//        dd($info);

        // 搜索功能
        if ($request->isMethod('POST'))
        {
            $staff = $request->input('course');
            if (is_numeric($staff['id']))
            {
                $result = Course::where('id', 'like', '%'.$staff['id'].'%')->get();
                return view('info.course.findindex', [
                    'info' => $result,
                ]);
            } else {
                $res = Course::where('name', 'like', '%'.$staff['id'].'%')->get();
                return view('info.course.findindex', [
                    'info' => $res,
                ]);
            }

        }

        return view('info.course.index', [
            'info' => $info,
//            'info1' =>
        ]);
    }

    // 详情
    public function detail($id)
    {
        $name = Course::find($id)->value('name');

        $info = DB::select('SELECT staff_info.id,name,grade from staff_course,staff_info 
                            WHERE staff_course.course_id=? and staff_course.staff_id=staff_info.id',[$id]);
        return view('info.course.detail', [
            'info' => $info,
            'name' => $name,
        ]);
    }

    // 增
    public function create(Request $request)
    {
        $info = new Course();

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.name' => 'required|max:40',
                'Info.book' => 'required',
                'Info.time' => 'required|integer',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'max' => ':attribute 长度过长',
                'integer' => ':attribute 必须为整数',
            ], [    //自定义参数名
                'Info.name' => '课程名',
                'Info.book' => '教材',
                'Info.time' => '学时',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }


            //验证通过后继续执行以下代码
            $data = $request->input('Info');

            if (Course::create($data)) {
                return redirect('api/info/courseindex')->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('info.course.create', [
            'info' => $info
        ]);
    }

    // 改
    public function update(Request $request, $id)
    {
        $info = Course::find($id);

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.name' => 'required|max:40',
                'Info.book' => 'required',
                'Info.time' => 'required|integer',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'max' => ':attribute 长度过长',
                'integer' => ':attribute 必须为整数',
            ], [    //自定义参数名
                'Info.name' => '课程名',
                'Info.book' => '教材',
                'Info.time' => '学时',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }


            //验证通过后继续执行以下代码
            $data = $request->input('Info');
            $info->name = $data['name'];
            $info->book = $data['book'];
            $info->time = $data['time'];

            if ($info->save()) {
                return redirect('api/info/courseindex')->with('success', '修改成功-' . $id);
            } else {
                return redirect()->back()->with('error', '修改失败-' . $id);
            }
        }
        return view('info.course.update', [
            'info' => $info
        ]);
    }

    // 录入培训课程成绩
    public function grade(Request $request, $id)
    {
        $info = new StaffCourse();
        $name = Course::find($id)->value('name');
        $info['name'] = $name;

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.id' => 'required|integer',
                'Info.grade' => 'required|integer',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'integer' => ':attribute 必须为整数',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }


            //验证通过后继续执行以下代码
            $data = $request->input('Info');

            $result = DB::table('staff_course')->where('course_id',$id)->where('staff_id',$data['id'])->update(['grade' => $data['grade']]);
            if ($result) {
                return redirect('api/info/courseindex')->with('success', '录入成功');
            } else {
                return redirect()->back()->with('error', '录入失败（职工号有误）');
            }
        }
        return view('info.course.grade', [
            'info' => $info
        ]);
    }

    // 删
    public function delete($id)
    {
        $result = Course::find($id);
        $staff = StaffCourse::where('course_id','=',$id)->delete();

        if ($result->delete() && $staff) {
            return redirect('api/info/courseindex')->with('success', '删除成功' . $id);
        } else {
            return redirect()->back()->with('error', '删除失败' . $id);
        }
    }
}
