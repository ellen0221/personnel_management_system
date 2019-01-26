<?php

namespace App\Http\Controllers;

use App\DepartmentPost;
use App\Post;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
//    protected $fillable = [
//        'name',
//        'level',
//    ];

    // 信息显示页
    public function index(Request $request)
    {
//        $info = Post::paginate(10);

        $info = DB::select('SELECT post_info.*,department_info.name department,department_post.num from post_info,department_info,department_post
                            WHERE post_info.id=department_post.post_id and department_post.department_id=department_info.id');
//        dd($info);
        // 搜索功能
        if ($request->isMethod('POST'))
        {
            $staff = $request->input('post');
            if (is_numeric($staff['id']))
            {
                $result = Post::where('id', 'like', '%'.$staff['id'].'%')->get();
                return view('info.post.findindex', [
                    'info' => $result,
                ]);
            } else {
                $res = Post::where('name', 'like', '%'.$staff['id'].'%')->get();
                return view('info.post.findindex', [
                    'info' => $res,
                ]);
            }

        }

        return view('info.post.index', [
            'info' => $info,
        ]);
    }

    // 新增
    public function create(Request $request)
    {
        $info = new Post();

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.name' => 'required|max:40',
                'Info.level' => 'required|integer',
                'Info.department' => 'required',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'max' => ':attribute 长度过长',
                'integer' => ':attribute 必须为整数',
            ], [    //自定义参数名
                'Info.name' => '岗位名称',
                'Info.level' => '岗位等级',
                'Info.department' => '所属部门',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }


            //验证通过后继续执行以下代码
            $data = $request->input('Info');

            if (Post::create($data)) {
                return redirect('api/info/postindex')->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('info.post.create', [
            'info' => $info
        ]);


//        $staff = Post::create([
//            'name' =>  'test1', //$request->get('name'),
//            'level' =>  '', //$request->get('book'),
//        ]);
//
//        if (dd($staff)) {
////            return $this->returnMsg();
//            dd($staff);
//        } else {
//            return $this->returnMsg('500','error',dd($staff));
//        }
    }

    // 修改
    public function update(Request $request, $id)
    {
        $info = Post::find($id);
//        dd($info);

        if ($request->isMethod('POST'))
        {
            $validator = validator()->make($request->input(), [
                'Info.name' => 'required|max:40',
                'Info.level' => 'required|integer',
            ], [    //自定义错误信息
                'required' => ':attribute 为必填项',     //:attribute为占位符
                'max' => ':attribute 长度过长',
                'integer' => ':attribute 必须为整数',
            ], [    //自定义参数名
                'Info.name' => '岗位名称',
                'Info.level' => '岗位等级',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();    //需手动注册错误信息:withErrors()
            }


            //验证通过后继续执行以下代码
            $data = $request->input('Info');
            $info->name = $data['name'];
            $info->level = $data['level'];

            if ($info->save()) {
                return redirect('api/info/postindex')->with('success', '修改成功-' . $id);
            } else {
                return redirect()->back()->with('error', '修改失败-' . $id);
            }
        }
        return view('info.post.update', [
            'info' => $info
        ]);
    }

    // 删除
    public function delete($id)
    {
        $result = Post::find($id);
        $dep = DepartmentPost::where('post_id','=',$id)->delete();

        if ($result->delete() && $dep) {
            return redirect('api/info/postindex')->with('success', '删除成功' . $id);
        } else {
            return redirect()->back()->with('error', '删除失败' . $id);
        }
    }
}
