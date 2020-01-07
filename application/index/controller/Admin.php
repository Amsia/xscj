<?php

namespace app\index\controller;


use think\Controller;
use think\Request;
use think\Session;
use app\index\model\Student;
use app\index\model\Teacher;
use app\index\model\Dean;

class Admin extends Controller
{

    public function index()
    {
        //
    }

    public function login()
    {
        $data = input('post.');
        //学生
        if ($data['role']=='student'){
            $student = Student::findByAccount($data['account'],$data['password']);
            if (count($student)!=1){
                $this->error('账号或密码错误');
            }else{
//                Session::set('student',$student);
                Session::set('user',$data);
                $this->success("学生账号登陆成功",'/student','',1);
            }

        }elseif ($data['role']=='teacher'){
            $teacher = Teacher::findByAccount($data['account'],$data['password']);
            if (count($teacher)!=1){
                $this->error('账号或密码错误');
            }else{
                Session::set('user',$data);
                $this->success("教师账号登录成功",'/teacher','',1);
            }
        }elseif ($data['role']=='dean'){
            $dean = Dean::findByAccount($data['account'],$data['password']);
            if (count($dean)!=1){
                $this->error('账号或密码错误');
            }else{
                Session::set('user',$data);
                $this->success("教务员账号登录成功",'/dean','',1);
            }
        }else{
            Session::clear();
            $this->error('登录出现未知错误','/');
        }
    }

    public function changePWD()
    {
        $user = \session('user');
        if ($user==null){
            \session(null);
            $this->error("请重新登陆",'/');
        }
        return $this->fetch('Admin/changePWD');
    }

    public function doChangePWD()
    {
        $user = input('post.');
//        dump($user);
        if ($user['role']=="student"){
            $student = Student::findByAccount($user['id'],$user['oldPassword']);
            if (count($student)==1){
                $student = $student[0];
                $student['password'] = $user['newPassword'];
                Student::updateStudent($student);
                $this->success("修改成功,请重新登陆",'/');
            }else{
                $this->error("账号或密码错误,请重新登录",'/');
            }
        }elseif ($user['role']=="teacher"){
            $teacher = Teacher::findByAccount($user['id'],$user['oldPassword']);
            if (count($teacher)==1){
                $teacher = $teacher[0];
                $teacher['password'] = $user['newPassword'];
                Teacher::updateTeacher($teacher);
                $this->success("修改成功,请重新登陆",'/');
            }else{
                $this->error("账号或密码错误,请重新登录",'/');
            }
        }elseif ($user['role']=="dean"){
            $dean = Dean::findByAccount($user['id'],$user['oldPassword']);
            if (count($dean)==1){
                $dean = $dean[0];
                $dean['password'] = $user['newPassword'];
                Dean::updateDean($dean);
                $this->success("修改成功,请重新登陆",'/');
            }else{
                $this->error("账号或密码错误,请重新登录",'/');
            }
        }else{
            $this->error("发生了不可预知的错误，请重新登陆",'/');
        }
    }

    public function logout()
    {
        Session::clear();
        $this->success("注销成功,将返回登录界面",'/','','1');
    }


}
