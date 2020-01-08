<?php


namespace app\index\controller;
use app\index\model\Classes;
use think\Controller;

class Test extends Controller
{
    public function index()
    {
        $class = [];
        $classList = Classes::findLike($class);
        $this->assign('classList',$classList);
        return $this->fetch('/test');
    }
}