<?php


namespace app\index\validate;

use think\Validate;
class Student extends Validate
{
    //规则
    protected $rule=[
        'studentId' => 'require',
        'majorId' => 'require|number',
        'classId' => 'require|number',
        'collegeId' => 'require|number',
        'studentName' => 'require',
        'studentAge' => 'require|number|between:1,100',
        'studentSex' => 'require',
        'password' => 'require|confirm:studentId'
    ];
    //提示信息
    protected $message=[
        'studentId.require' => '学生编号缺少',
        'majorId.require' => '专业编号缺少',
        'classId.require' => '班级编号缺少',
        'collegeId.require' => '学院编号缺少',
        'studentName.require' => '学生姓名缺少',
        'studentAge.require' => '学生年龄缺少',
        'studentAge.number' => '学生年龄必须为数字',
        'majorId.number' => '专业编号必须准确',
        'classId.number' => '班级编号必须准确',
        'collegeId.number' => '学院编号必须准确',
        'studentAge.between' => '学生年龄不正确',
        'studentSex.require' => '学生性别缺少',
        'password.require' => '密码缺少',
        'password.confirm' => '初始密码需要和学号一致'
    ];
}