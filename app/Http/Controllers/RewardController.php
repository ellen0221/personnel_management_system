<?php

namespace App\Http\Controllers;

use App\Reward;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RewardController extends Controller
{
    // 信息显示页
    public function index(Request $request)
    {
        $info = Reward::paginate(10);
//dd($info);
        // 搜索功能
        if ($request->isMethod('POST'))
        {
            $staff = $request->input('reward');
            if (is_numeric($staff['id']))
            {
                $result = Reward::where('staff_id', 'like', '%'.$staff['id'].'%')->get();
                return view('info.reward.findindex', [
                    'info' => $result,
                ]);
            } else {
                $res = Reward::where('type', 'like', '%'.$staff['id'].'%')->get();
                return view('info.reward.findindex', [
                    'info' => $res,
                ]);
            }

        }

        return view('info.reward.index', [
            'info' => $info,
        ]);
    }

    // 增
    public function create(Request $request)
    {
        $info = new Reward();

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.staff_id' => 'required|integer',
                'Info.type1' => 'required|integer',
                'Info.project' => 'required',
                'Info.sum1' => 'required|integer',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'integer' => ':attribute 必须为整数',
            ], [    //自定义参数名
                'Info.staff_id' => '职工号',
                'Info.type1' => '奖惩标志',
                'Info.project' => '项目名称',
                'Info.sum1' => '奖惩金额',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }


            //验证通过后继续执行以下代码
            $data = $request->input('Info');
//            dd($data);
            $has_staff = Staff::find($data['staff_id']);
//            dd($has_staff);
            if (!$has_staff) {
                return redirect('api/info/rewardindex')->with('error','职工号有误');
            } else {
                if (Reward::create($data)) {
                    return redirect('api/info/rewardindex')->with('success', '添加成功');
                } else {
                    return redirect()->back()->with('error', '添加失败');
                }
            }
        }
        return view('info.reward.create', [
            'info' => $info
        ]);

//        $result = Reward::create([
//           'type' => 10,
//           'project' => '全勤奖',
//           'sum' => '500',
//        ]);
//
//        dd($result);
    }

    // 改
    public function update(Request $request, $id)
    {
        $info = Reward::find($id);
        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.id' => 'required|integer',
                'Info.type' => 'required|integer',
                'Info.project' => 'required',
                'Info.sum' => 'required|integer',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'integer' => ':attribute 必须为整数',
            ], [    //自定义参数名
                'Info.id' => '职工号',
                'Info.type' => '奖惩标志',
                'Info.project' => '项目名称',
                'Info.sum' => '奖惩金额',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }

            //验证通过后继续执行以下代码
            $data = $request->input('Info');
            $info->staff_id = $data['id'];
            $info->type1 = $data['type'];
            $info->project = $data['project'];
            $info->sum = $data['sum'];

            if ($info->save()) {
                return redirect('api/info/rewardindex')->with('success', '修改成功-' . $id);
            } else {
                return redirect()->back()->with('error', '修改失败-' . $id);
            }
        }
        return view('info.reward.update', [
            'info' => $info
        ]);
    }

    // 删
    public function delete($id)
    {
        $result = Reward::find($id);

        if ($result->delete()) {
            return redirect('api/info/rewardindex')->with('success', '删除成功' . $id);
        } else {
            return redirect()->back()->with('error', '删除失败' . $id);
        }
    }


    // 所有奖励记录
    public function allreward()
    {
        $all = DB::select('SELECT staff_id,COUNT(*) rewardtimes,SUM(sum1) rewardsum from reward_info 
                           where type1=? group by staff_id',[10]);
        return view('info.reward.allreward', [
            'info' => $all,
        ]);
    }

    // 所有惩罚记录
    public function allpunish()
    {
        $all = DB::select('SELECT staff_id,COUNT(*) punishtimes,SUM(sum1) punishsum from reward_info where type1=? group by staff_id',[20]);
        return view('info.reward.allpunish', [
            'info' => $all,
        ]);
    }
}
