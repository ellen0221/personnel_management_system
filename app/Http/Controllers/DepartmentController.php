<?php

namespace App\Http\Controllers;

use App\Department;
use App\DepartmentPost;
use App\Post;
use App\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    // 信息显示页
    public function index(Request $request)
    {
        $info = Department::paginate(10);

        // 搜索功能
        if ($request->isMethod('POST'))
        {
            $staff = $request->input('department');
            if (is_numeric($staff['id']))
            {
                $result = Department::where('id', 'like', '%'.$staff['id'].'%')->get();
//                dd($result);
                return view('info.department.findindex', [
                    'info' => $result,
                ]);
            } else {
                $res = Department::where('name', 'like', '%'.$staff['id'].'%')->get();
                return view('info.department.findindex', [
                    'info' => $res,
                ]);
            }

        }

        return view('info.department.index', [
            'info' => $info,
        ]);
    }

    // 增加部门
    public function create(Request $request)
    {
        $info = new Department();

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.name' => 'required|max:40',
                'Info.function' => 'required',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'max' => ':attribute 长度过长',
            ], [    //自定义参数名
                'Info.name' => '部门名称',
                'Info.function' => '职能',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }


            //验证通过后继续执行以下代码
            $data = $request->input('Info');

            if (Department::create($data)) {
                return redirect('api/info/departmentindex')->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('info.department.create', [
            'info' => $info
        ]);


//        $staff = Department::create([
//            'name' =>  'department1', //$request->get('name'),
//            'function' =>  '', //$request->get('book'),
//        ]);
//
//        if (dd($staff)) {
////            return $this->returnMsg();
//            dd($staff);
//        } else {
//            return $this->returnMsg('500','error',dd($staff));
//        }
    }

    // 增加岗位
    public function createpost(Request $request, $id)
    {
        $info = new Post();
        $info['num'] = null;

        if ($request->isMethod('POST'))
        {
            $input = $request->input('Info');
//            dd($input);
            $postname = $input['name'];
            $postid = Post::where('name','=',$postname)->value('id');
            if ($postid) {
                $data['department_id'] = $id;
                $data['post_id'] = $postid;
                $data['num'] = $input['num'];
                $result = DepartmentPost::create($data);
                if ($result) {
                    return redirect('api/info/departmentindex')->with('success', '添加成功');
                } else {
                    return redirect()->back()->with('error', '添加失败');
                }
            } else {
                $pid = Post::insertGetId([
                    'name' => $postname,
                    'level' => $input['level'],
                    'created_at' => date('Y-m-d H:i:s', time()),
                ]);
                $result = DepartmentPost::create([
                    'department_id' => $id,
                    'post_id' => $pid,
                    'num' => $input['num'],
                ]);
                if ($result) {
                    return redirect('api/info/departmentindex')->with('success', '添加成功');
                } else {
                    return redirect()->back()->with('error', '添加失败');
                }
            }
        }

        return view('info.department.postform', [
            'info' => $info,
        ]);

    }

    // 详情
    public function detail($id)
    {
        $result = Department::find($id);
        $post = DB::select('SELECT name from department_post,post_info 
                            WHERE department_id=? and department_post.post_id = post_info.id',[$id]);
        return view('info.department.detail', [
            'info' => $result,
            'post' => $post,
        ]);
    }

    // 修改
    public function update(Request $request, $id)
    {
        $info = Department::find($id);

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.name' => 'required|max:40',
                'Info.function' => 'required',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'max' => ':attribute 长度过长',
            ], [    //自定义参数名
                'Info.name' => '部门名称',
                'Info.function' => '职能',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }


            //验证通过后继续执行以下代码
            $data = $request->input('Info');
            $info->name = $data['name'];
            $info->function = $data['function'];

            if ($info->save()) {
                return redirect('api/info/departmentindex')->with('success', '修改成功-' . $id);
            } else {
                return redirect()->back()->with('error', '修改失败-' . $id);
            }
        }
        return view('info.department.update', [
            'info' => $info
        ]);
    }

    // 删
    public function delete($id)
    {
        $result = Department::find($id);
        $post = DepartmentPost::where('department_id','=',$id)->delete();

        if ($result->delete() && $post) {
            return redirect('api/info/departmentindex')->with('success', '删除成功' . $id);
        } else {
            return redirect()->back()->with('error', '删除失败' . $id);
        }
    }

}
