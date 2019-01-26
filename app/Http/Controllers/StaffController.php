<?php

namespace App\Http\Controllers;

use App\Department;
use App\Post;
use App\Reward;
use App\Salary;
use App\Staff;
use App\StaffCourse;
use App\User;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    // staff表
//        'department_id',
//        'salary_id',
//        'post_id',
//        'name',
//        'sex',
//        'age',
//        'education_background',
    // 管理员登录认证
    public function authenticate(Request $request)
    {
        $login = $request->input('staff');
//        dd($login);
        if (Auth::attempt(['staff_id' => $login['id'], 'password' => $login['password']])) {
            // 认证通过...
            return redirect('api/info/index');
        } else {
            return redirect('login');
        }
    }

    // 信息显示页
    public function index(Request $request)
    {
        $check = Auth::check();

        if ($check) {
//            $re = DB::select('SELECT staff_info.id,staff_info.name,staff_info.age,staff_info.sex,staff_info.education_background,staff_info.created_at,department_info.name department_name,post_info.name post_name
//                          from staff_info,department_info,post_info
//                          WHERE staff_info.department_id=department_info.id and staff_info.post_id=post_info.id');
            $re = Staff::all();
            // 搜索功能
            if ($request->isMethod('POST'))
            {
                $staff = $request->input('staff');
                if (is_numeric($staff['id']))
                {
                    $result = Staff::where('id', 'like', '%'.$staff['id'].'%')->get();
                    return view('info.staff.findindex', [
                        'info' => $result,
                    ]);
                } else {
                    $res = Staff::where('name', 'like', '%'.$staff['id'].'%')->get();
                    return view('info.staff.findindex', [
                        'info' => $res,
                    ]);
                }

            }

            return view('info.staff.index', [
                'info' => $re,
            ]);
        } else {
            return redirect('/');
        }
//        Users::create([
//            'staff_id' => 1,
//            'password' => bcrypt('123'),
//        ]);
    }

    // 增
    public function create(Request $request)
    {
        if (Auth::check())
        {
            $info = new Staff();

            if ($request->isMethod('POST'))
            {
                /*$validator = Validator::make($request->input(), [
                    'Info.name' => 'required|min:2|max:20',
                    'Info.age' => 'required|integer',
                    'Info.sex' => 'required|integer',
                    'Info.education_background' => 'required',
                    'Info.department_id' => 'required',
                    'Info.post_id' => 'required',

                ], [    //自定义错误信息
                    'required' => ':attribute 为必填项',     //:attribute为占位符
                    'min' => ':attribute 长度过短',
                    'max' => ':attribute 长度过长',
                    'integer' => ':attribute 必须为整数',
                ], [    //自定义参数名
                    'Info.name' => '姓名',
                    'Info.age' => '年龄',
                    'Info.sex' => '性别',
                    'Info.education_background' => '学历',
                    'Info.department_id' => '部门',
                    'Info.post_id' => '岗位',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
                }*/

                $this->validate($request,[
                    'Info.name' => 'required|min:2|max:20',
                    'Info.age' => 'required|integer',
                    'Info.sex' => 'required',
                    'Info.education_background' => 'required',
                    'Info.department_id' => 'required',
                    'Info.post_id' => 'required',

                ], [    //自定义错误信息
                    'required' => ':attribute 为必填项',     //:attribute为占位符
                    'min' => ':attribute 长度过短',
                    'max' => ':attribute 长度过长',
                    'integer' => ':attribute 必须为整数',
                ], [    //自定义参数名
                    'Info.name' => '姓名',
                    'Info.age' => '年龄',
                    'Info.sex' => '性别',
                    'Info.education_background' => '学历',
                    'Info.department_id' => '部门',
                    'Info.post_id' => '岗位',
                ]);

                //验证通过后继续执行以下代码
                $data = $request->input('Info');
//                dd($data);
                $data['created_at'] = date('Y-m-d H:i:s',time());
//            dd($data);
                $login = $this->createstaff(Staff::insertGetId($data));

                if ($login) {
                    return redirect('api/info/index')->with('success', '添加成功');
                } else {
                    return redirect()->back()->with('error', '添加失败');
                }
            }
            return view('info.staff.create', [
                'info' => $info
            ]);
        } else {
            return redirect('/')->with('error','请先登录');
        }
//        $input = $request->input('Info');

//        Staff::create([
//            'name' => 'xj',
//            'age' => 19,
//            'sex' => '女',
//            'education_background' => '本科',
//        ]);
//        dd(Staff::all());
//        User::create([
//            'staff_id' => 1,
//            'password' => bcrypt('123'),
//        ]);
    }

    // 删
    public function delete($id)
    {
        if (Auth::check())
        {
            $user = Staff::find($id);
            $login = Users::where('staff_id',$id)->delete();
            $admin = User::where('staff_id',$id)->delete();
            $course = StaffCourse::where('staff_id',$id)->delete();
            $reward = Reward::where('staff_id',$id)->delete();
            $salary = Salary::where('staff_id',$id)->delete();

            if ($course | $reward | $salary) {
            }

            if ($user->delete() && $login && $admin) {
                return redirect('api/info/index')->with('success', '删除成功' . $id);
            } else {
                return redirect()->back()->with('error', '删除失败' . $id);
            }
        } else {
            return redirect('/')->with('error','请先登录');
        }

    }

    // 详情
    public function detail($id)
    {
        if (Auth::check())
        {
            $result = Staff::find($id);
            return view('info.staff.detail', [
                'info' => $result,
            ]);
        } else {
            return redirect('/')->with('error','请先登录');
        }
    }

    // 改
    public function update(Request $request, $id)
    {
        if (Auth::check())
        {
            $info = Staff::find($id);    //获取该用户数据

            if ($request->isMethod('POST'))
            {
                $validator = validator()->make($request->input(), [
                    'Info.name' => 'required|min:2|max:20',
                    'Info.age' => 'required|integer',
                    'Info.sex' => 'required|integer',
                    'Info.education_background' => 'required',
                    'Info.department_id' => 'required',
                    'Info.post_id' => 'required',

                ], [    //自定义错误信息
                    'required' => ':attribute 为必填项',     //:attribute为占位符
                    'min' => ':attribute 长度过短',
                    'max' => ':attribute 长度过长',
                    'integer' => ':attribute 必须为整数',
                ], [    //自定义参数名
                    'Info.name' => '姓名',
                    'Info.age' => '年龄',
                    'Info.sex' => '性别',
                    'Info.education_background' => '学历',
                    'Info.department_id' => '部门',
                    'Info.post_id' => '岗位',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
                }


                //验证通过后继续执行以下代码
                $data = $request->input('Info');
                $info->name = $data['name'];
                $info->age = $data['age'];
                $info->sex = $data['sex'];
                $info->department_id = $data['department_id'];
                $info->post_id = $data['post_id'];
                $info->education_background = $data['education_background'];

//            dd($info);
                if ($info->save()) {
                    return redirect('api/info/index')->with('success', '修改成功-' . $id);
                } else {
                    return redirect()->back()->with('error', '修改失败-' . $id);
                }
            }

            return view('info.staff.update', [
                'info' => $info,    //传参到视图
            ]);
        } else {
            return redirect('/')->with('error','请先登录');
        }
    }

    // 修改密码
    public function reset(Request $request)
    {
        if (Auth::check())
        {
            $id = Auth::user()->staff_id;
            if ($request->isMethod('POST')) {
                $info = $request->input('Info');
                if (Auth::attempt(['staff_id' => $id, 'password' => $info['password']]))
                {
                    $result = User::where('staff_id','=',$id)
                        ->update(['password' => bcrypt($info['newpassword'])]);
                    if ($result)
                    {
                        return redirect('/');
                    }
                } else {
                    return redirect('staffreset')->with('error', '修改失败--旧密码不正确');
                }
            }
            return view('info.staff.reset');
        } else {
            return redirect('/')->with('error','请先登录');
        }
    }

    // 创建职工登录信息 默认密码为职工号
    public function createstaff($id)
    {
        $result = Users::create([
            'staff_id' => $id,
            'password' => bcrypt($id),
            'created_at' => date('Y-m-d H:i:s',time()),
        ]);

        if ($result)
        {
            return true;
        } else {
            return false;
        }
    }

    // 管理员列表显示
    public function admin()
    {
        if (Auth::check())
        {
            $admin = DB::select('SELECT staff_info.id,staff_info.name,admin.created_at from admin,staff_info
                             WHERE staff_info.id=admin.staff_id');

            return view('info.admin.index', [
                'info' => $admin,
            ]);
        } else {
            return redirect('/')->with('error','请先登录');
        }
    }

    // 取消管理员
    public function canceladmin($id)
    {
        if (Auth::check())
        {
            $isset = Staff::where('id','=',$id)->value('is_admin');
//            dd($isset);
            if($isset)
            {
                Staff::where('id',$id)->update(['is_admin' => 0]);
                User::where('staff_id',$id)->delete();
                return redirect('api/info/admin')->with('success','取消成功');
            } else {
                return redirect()->back()->with('error','取消失败');
            }
        }
    }

    // 设置管理员
    public function setadmin($id)
    {
        if (Auth::check())
        {
            $info = User::where('staff_id','=',$id)->value('id');
            if ($info)
            {
                return redirect()->back()->with('error','该职工已经是管理员！');
            } else {
                Staff::where('id',$id)->update(['is_admin' => 1]);
                User::create([
                    'staff_id' => $id,
                    'password' => bcrypt($id),
                ]);
                return redirect('api/info/index')->with('success','设置成功');
            }
        } else {
            return redirect('/')->with('error','请先登录');
        }
    }

    // 退出登录
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }

//    public function alter()
//    {
//        DB::statement("ALTER TABLE staff_info AUTO_INCREMENT = 1000;");
//    }


    // 管理员注册
    public function register_admin(Request $request)
    {

        $admin = User::create([
            'staff_id' => $request['id'],
            'password' => bcrypt($request['passwrod']),
        ]);
        if ($admin)
        {
            return redirect('/login');
        }

        return view('auth.register');
    }

}
