<?php
use App\Models\Student;
$students = new Student();
?>
@extends('layout/student')

@section('content')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
         <div class="panel-heading">学生详情</div>

         <table class="table table-bordered table-striped table-hover ">
             <tbody>
             <tr>
                 <td width="50%">ID</td>
                 <td>{{ $student->id }}</td>
             </tr>
             <tr>
                 <td>姓名</td>
                 <td>{{ $student->name }}</td>
             </tr>
             <tr>
                 <td>年龄</td>
                 <td>{{ $student->age }}</td>
             </tr>
             <tr>
                 <td>性别</td>
                 <td>{{ $students->sex($student->sex) }}</td>
             </tr>
             <tr>
                 <td>添加日期</td>
                 <td>{{ date('Y-m-d', $student->created_time) }}</td>
             </tr>
             <tr>
                 <td>最后修改</td>
                 <td>{{ date('Y-m-d', $student->updated_time) }}</td>
             </tr>
             </tbody>
         </table>
     </div>
@endsection
