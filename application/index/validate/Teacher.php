<?php


namespace app\index\validate;

use think\Validate;
class Teacher extends Validate
{
    //规则
    protected $rule=[
        'teacherId' => 'require',
        'teacherName' => 'require',
        'teacherAge' => 'require|number|between:1,100',
        'teacherSex' => 'require',
        'password' => 'require|confirm:teacherId'
    ];
    //提示信息
    protected $message=[
        'teacherId.require' => '教师编号缺少',
        'teacherName.require' => '教师姓名缺少',
        'teacherAge.require' => '教师年龄缺少',
        'teacherAge.number' => '教师年龄必须为数字',
        'teacherAge.between' => '教师年龄不正确',
        'teacherSex.require' => '教师性别缺少',
        'password.require'=>'初始密码缺少',
        'password.confirm'=>'初始密码需要和教师编号一致'
    ];
}