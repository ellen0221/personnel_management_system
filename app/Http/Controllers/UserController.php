<?php

namespace App\Http\Controllers;

use App\Course;
use App\Reward;
use App\Salary;
use App\Staff;
use App\StaffCourse;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // 职工登录验证
    public function staffauthenticate(Request $request)
    {
        $login = $request->input('staff');

        if (Auth::guard('staff')->attempt(['staff_id' => $login['id'], 'password' => $login['password']]))
        {
            return redirect('/api/staff/index');
        } else {
            return redirect('stafflogin');
        }
    }

    // 职工界面
    public function index()
    {
        $check = Auth::guard('staff')->check();
        if ($check)
        {
            $staff_id = Auth::guard('staff')->user()->staff_id;
            $info = Staff::find($staff_id);
            return view('staff.index', [
                'information' => $info,
            ]);
        } else {
            return redirect('/');
        }
    }

    // 查工资
    public function salary()
    {
        if (Auth::guard('staff')->check())
        {
            $id = Auth::guard('staff')->user()->staff_id;
            $result = Salary::where('staff_id',"=",$id)->value('id');
            $info = Salary::find($result);
            return view('staff.salary', [
                'information' => $info,
            ]);
        } else {
            return redirect('/');
        }

    }

    // 奖惩记录
    public function reward()
    {
        if (Auth::guard('staff')->check())
        {
//            dd(Auth::guard('staff')->user()->staff_id);
            $reward = new Reward();
            $result = DB::select('SELECT * from reward_info WHERE staff_id=?',[Auth::guard('staff')->user()->staff_id]);
//            dd($result);
//            $id = Reward::where('staff_id','=',Auth::guard('staff')->user()->staff_id)->value('id');
//            $result = Reward::find($id);
//            dd($result);
                return view('staff.reward', [
                    'info' => $result,
                    'reward' => $reward,
                ]);
        } else {
            return redirect('/');
        }
    }

    // 创建职工登录信息 默认密码为职工号
    public function createstaff($id)
    {
        $result = Users::create([
            'staff_id' => $id,
            'password' => bcrypt($id),
        ]);

        if ($result)
        {
            return true;
        } else {
            return false;
        }
    }

    // 可选课程
    public function showcourse()
    {
        if (Auth::guard('staff')->check())
        {
            $course = Course::paginate(10);

            return view('staff.select', [
                'info' => $course,
            ]);
        } else {
            return redirect('/');
        }

    }

    // 选课
    public function selected($id)
    {
        if (Auth::guard('staff')->check())
        {
            $staff_id = Auth::guard('staff')->user()->staff_id;
//            dd($staff_id);
            $check = DB::select('SELECT s1.staff_id from staff_course s1,staff_course s2
                             WHERE s1.staff_id=? and s2.course_id=? and s1.staff_id=s2.staff_id',[$staff_id,$id]);
            if ($check)
            {
                return redirect('/api/staff/showcourse')->with('error','您已经选了这门课！');
            } else {
                $result = StaffCourse::create([
                    'staff_id' => $staff_id,
                    'course_id' => $id,
                    'grade' => null,
                ]);
                if ($result) {
                    return redirect('/api/staff/record')->with('success','选课成功！');
                }
            }
        } else {
            return redirect('/');
        }
    }

    // 选课记录
    public function record()
    {
        if (Auth::guard('staff')->check())
        {
            $id = Auth::guard('staff')->user()->staff_id;
            $course = DB::select('SELECT course_info.id,course_info.name,course_info.time,staff_course.created_at,staff_course.grade from staff_course,course_info
                              WHERE staff_course.course_id=course_info.id and staff_course.staff_id=?',[$id]);
            return view('staff.course', [
                'info' => $course,
            ]);
        } else {
            return redirect('/');
        }
    }

    // 修改密码
    public function reset(Request $request)
    {
        if (Auth::guard('staff')->check())
        {
            if ($request->isMethod('POST')) {
                $info = $request->input('Info');
                $id = Auth::guard('staff')->user()->staff_id;
                if (Auth::guard('staff')->attempt(['staff_id' => $id, 'password' => $info['password']]))
                {
                    $result = Users::where('staff_id','=',$id)
                        ->update(['password' => bcrypt($info['newpassword'])]);
                    if ($result)
                    {
                        return redirect('/');
                    }
                } else {
                    return redirect('staff/reset')->with('error', '修改失败--旧密码不正确');
                }
            }
            return view('staff.reset');
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('staff')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
