<?php

namespace App\Http\Controllers;

use App\Reward;
use App\Salary;
use App\Staff;
use App\StaffCourse;
use Illuminate\Http\Request;

class SalaryController extends Controller
{

//    protected $fillable = [
//        'basic',
//        'level',
//        'pension',
//        'unemployment',
//        'fund',
//        'tax',
//    ];


    //
    public function index(Request $request)
    {
        $info = Salary::paginate(10);

        if ($request->isMethod('POST'))
        {
            $salary = $request->input('salary');
            $result = Salary::where('staff_id',$salary['staff_id'])->get();
            return view('info.salary.findindex', [
                'info' => $result,
            ]);
        }

        return view('info.salary.index', [
            'info' => $info,
        ]);
    }

    // 工资录入
    public function salary(Request $request)
    {
        $info = new Salary();

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.id' => 'required|integer',
                'Info.basic' => 'required|integer',
                'Info.level' => 'required|integer',
                'Info.pension' => 'required|integer',
                'Info.unemployment' => 'required|integer',
                'Info.fund' => 'required|integer',
                'Info.tax' => 'required|integer',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'integer' => ':attribute 必须为整数',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }

            //验证通过后继续执行以下代码
            $data = $request->input('Info');

            $input['staff_id'] = $data['id'];
            $input['basic'] = $data['basic'];
            $input['level'] = $data['level'];
            $input['pension'] = $data['pension'];
            $input['unemployment'] = $data['unemployment'];
            $input['fund'] = $data['fund'];
            $input['tax'] = $data['tax'];
            $input['created_at'] = date('Y-m-d H:i:s',time());

            $staff_id = $data['id'];
            $is_staff = Staff::find($staff_id)->get();
//            dd($is_staff);
            if ($is_staff) {
                $id = Salary::insertGetId($input);
                $result = Staff::where('id','=',$staff_id)->update(['salary_id' => $id]);
                if ($result) {
                    return redirect('api/info/salaryindex')->with('success', '录入成功');
                } else {
                    return redirect()->back()->with('error', '录入失败');
                }
            } else {
                return redirect('api/info/createsalary')->with('error','职工号有误');
            }

        }
        return view('info.salary.create', [
            'info' => $info
        ]);
    }

//    //
//    public function create(Request $request)
//    {
//        $result = Salary::create([
//            'staff_id' => 1,
//            'basic' => 5000,
//            'level' => 1000,
//            'pension' => 0,
//            'unemployment' => 0,
//            'fund' => 0,
//            'tax' => 180,
//        ]);
//        dd($result);
//    }

    // 改
    public function update(Request $request, $id)
    {
        $info = new Salary();

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.id' => 'required|integer',
                'Info.basic' => 'required|integer',
                'Info.level' => 'required|integer',
                'Info.pension' => 'required|integer',
                'Info.unemployment' => 'required|integer',
                'Info.fund' => 'required|integer',
                'Info.tax' => 'required|integer',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'integer' => ':attribute 必须为整数',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }

            //验证通过后继续执行以下代码
            $data = $request->input('Info');

            $input['staff_id'] = $data['id'];
            $input['basic'] = $data['basic'];
            $input['level'] = $data['level'];
            $input['pension'] = $data['pension'];
            $input['unemployment'] = $data['unemployment'];
            $input['fund'] = $data['fund'];
            $input['tax'] = $data['tax'];
            $input['created_at'] = date('Y-m-d H:i:s',time());

            $has_salary = Salary::where('staff_id',$input['staff_id'])->get();
            if ($has_salary)
            {
                return redirect()->back()->with('error','该职工已存在工资记录');
            } else {
                if ($input->save()) {
                    return redirect('api/info/salary')->with('success', '录入成功');
                } else {
                    return redirect()->back()->with('error', '录入失败');
                }
            }
        }
        return view('info.salary.create', [
            'info' => $info
        ]);
    }

    //
    public function delete($id)
    {
        $result = Salary::where('staff_id', $id);

        if ($result)
        {
            return redirect('/api/info/salaryindex')->with('success', '删除成功' . $id);
        } else {
            return redirect()->back()->with('error', '删除失败' . $id);
        }
    }
}
