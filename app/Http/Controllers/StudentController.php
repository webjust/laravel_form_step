<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\models\Student;

class StudentController extends Controller
{
    /**
     * 用户列表页
     *
     * @param
     * @return    void
     * @author    webjust [604854119@qq.com]
     */
    public function index()
    {
        // 对 Eloquent 模型进行分页
        $students = Student::orderby('id', 'desc')->paginate(5);

        // 渲染 student/index 视图，并传递查询出来的全部数据
        return view('student/index', ['students' => $students]);
    }

    /**
     * 新增表单页面，表单提交到当前页
     *
     * @param
     * @return    void
     * @author    webjust [604854119@qq.com]
     */
    public function create(Request $request)
    {
        // 判断是POST请求，也就是提交表单时走这个区间
        if($request->isMethod('POST'))
        {
            // 校验
            $this->validate($request, [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ],[
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不能小于2个字符',
                'max' => ':attribute 长度不能大于20个字符',
                'integer' => ':attribute 必须为数字',
            ],[
                'Student.name' => '用户名',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);

            $data = $request->input('Student');
            // var_dump($data);
            $data['created_time'] = time();
            $data['updated_time'] = time();

            // 模型的添加方法
            $ret = Student::insert($data);
            if($ret)
            {
                return redirect('/')->with('success', '添加成功！')->withInput();
            } else{
                return redirect('student/create')->with('error', '添加失败！')->withInput();
            }
        }

        return view('student/create');
    }

    /**
     * 用于修改学生信息
     *
     * @param
     * @return    bool
     * @author    webjust [604854119@qq.com]
     */
    public function update(Request $request, $id)
    {
        $student_info = Student::find($id);

        // 修改操作
        if($request->isMethod('POST'))
        {
            // 校验
            $this->validate($request, [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ],[
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不能小于2个字符',
                'max' => ':attribute 长度不能大于20个字符',
                'integer' => ':attribute 必须为数字',
            ],[
                'Student.name' => '用户名',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);

            $data = $request->input('Student');

            $student_info->name = $data['name'];
            $student_info->age = $data['age'];
            $student_info->sex = $data['sex'];
            $student_info->updated_time = time();

            // 模型的修改方法
            $ret = $student_info->save();
            if($ret)
            {
                return redirect('/')->with('success', '修改成功！')->withInput();
            } else{
                return redirect('student/create')->with('error', '修改失败！')->withInput();
            }
        }

        return view('student/update', ['student_info' => $student_info]);
    }

    /**
     * 根据id查看用户信息
     *
     * @param
     * @return    void
     * @author    webjust [604854119@qq.com]
     */
    public function detail($id)
    {
        $student = Student::find($id);

        return view('student/detail', ['student' => $student]);
    }

    /**
     * 删除操作
     *
     * @param
     * @return    void
     * @author    webjust [604854119@qq.com]
     */
    public function delete($id)
    {
        $student = Student::find($id);

        if($student->delete())
        {
            return redirect('/')->with('success', '删除成功-'.$id);
        } else {
            return redirect()->back()->with('error', '删除失败-'.$id);
        }
    }
}
