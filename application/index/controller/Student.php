<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
class Student extends Controller
{

    public function index()
    {
        //
        if (\session('user.role')=="student"){
            $list = \app\index\model\Student::studentFindGrade(session('user.account'));
            $student = \app\index\model\Student::findByAccount(session('user.account'),session('user.password'));
            $this->assign('student',$student[0]);
            $this->assign('list',$list);
            return $this->fetch('Student/student');
        }else{
            $this->error('请登录账号','index/index');
        }
    }

}
