<?php

namespace app\index\controller;

use app\index\model\Achievement;
use app\index\model\AchievementDetail;
use app\index\model\OnCourse;
use think\Controller;
use think\Exception;
use think\Request;


class Teacher extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        if (session('user.role')=="teacher"){
            $teacher = \app\index\model\Teacher::findById(session('user.account'));
            $onCourse = OnCourse::findByteacherId(session('user.account'));
            foreach ($onCourse as &$value){
                if ($value['isEntry']==1){
                    $value['isEntryName']='已录入';
                }else{
                    $value['isEntryName']='未录入';
                }
            }
            unset($value);
            $this->assign('teacher',$teacher[0]);
            $this->assign('onCourseList',$onCourse);
            return $this->fetch('Teacher/teacher');
        }else{
            $this->error("请重新登录账号",'/');
        }
    }

    public function setOnCourse(Request $request)
    {
        $onCourseId = input('onCourseId');
        $onCourse = OnCourse::findByIdWithDeatil($onCourseId)[0];
        if ($onCourse['isEntry']==1){
            $onCourse['isEntryName']='已录入';
        }else{
            $onCourse['isEntryName']='未录入';
        }
        $this->assign('onCourse',$onCourse);
        return $this->fetch('Teacher/setOnCourse');
    }

    public function doSetOnCourse()
    {
        $onCourse = input('post.');
        try{OnCourse::updateOnCourseGrade($onCourse);}catch (Exception $exception){
            $this->error("更新出错,请检查填写内容",'/teacher');
        }
        $this->success("更新成功！",'/teacher','','1');
    }

    public function entry(Request $request)
    {
        $onCourseId = input('onCourseId');
        $onCourse = OnCourse::findByIdWithDeatil($onCourseId)[0];
        if ($onCourse['isEntry']==1){
            $onCourse['isEntryName']='已录入';
        }else{
            $onCourse['isEntryName']='未录入';
        }
        $achievementDetailList = AchievementDetail::findById($onCourseId);
        $this->assign('onCourse',$onCourse);
        $this->assign('achievementDetailList',$achievementDetailList);
        return $this->fetch('Teacher/entry');
    }

    public function doEntry(Request $request)
    {
        $onCourseId = input('onCourseId');
        $onCourse = OnCourse::findByIdWithDeatil($onCourseId)[0];
        if ($onCourse['isEntry']==1){
            $this->error("此科成绩已经录入,无法再次提交",'/teacher');
        }
        $achievementDetailList = AchievementDetail::findById($onCourseId);
        foreach ($achievementDetailList as $value){
            $achievement['studentId'] = $value['studentId'];
            $achievement['onCourseId'] = $value['onCourseId'];
            $achievement['achievement'] = 0.01*($value['daily']*$onCourse['daily']+$value['experiment']*$onCourse['experiment']+$value['finalGrade']*$onCourse['finalGrade']+$value['oral']*$onCourse['oral']+$value['theory']*$onCourse['theory']);
            Achievement::addAchievement($achievement);
        }
        OnCourse::updateIsEntry($onCourseId);
        $this->success('提交成功','/teacher');
    }

    public function updateAchievementDetail()
    {
        $data = input('post.');
        for ($i=0;$i<count($data['studentId']);$i++)
        {
            $achievementDetail['onCourseId'] = $data['onCourseId'];
            if (array_key_exists('studentId',$data)){
                $achievementDetail['studentId'] = $data['studentId'][$i];
            }else{
                $this->error("数据错误",'index\index');
            }
            if (array_key_exists('daily',$data)){
                $achievementDetail['daily'] = $data['daily'][$i];
            }else{
                $achievementDetail['daily']=0;
            }
            if (array_key_exists('finalGrade',$data)){
                $achievementDetail['finalGrade'] = $data['finalGrade'][$i];
            }else{
                $achievementDetail['finalGrade'] = 0;
            }
            if (array_key_exists('experiment',$data)){
                $achievementDetail['experiment'] = $data['experiment'][$i];
            }else {
                $achievementDetail['experiment'] = 0;
            }
            if (array_key_exists('theory',$data)){
                $achievementDetail['theory'] = $data['theory'][$i];
            }else{
                $achievementDetail['theory'] = 0;
            }
            if (array_key_exists('oral',$data)){
                $achievementDetail['oral'] = $data['oral'][$i];
            }else{
                $achievementDetail['oral'] = 0;
            }
            try{AchievementDetail::updateAchievementDetail($achievementDetail);}
            catch (Exception $exception){
                $this->error("更新出错,请检查返回数据");
            }

        }
        $this->success('提交成功','/teacher','','1');
    }




}
