<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class OnCourse extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    public function setOnCourse(Request $request)
    {
        $onCourseId = input('onCourseId');


   }

    public function entry(Request $request)
    {
        $onCourseId = input('onCourseId');

   }

    public function isEntry()
    {
        
   }
}
