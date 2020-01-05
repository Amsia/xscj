<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Student;
use think\Session;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch('Admin/login');
    }


}
