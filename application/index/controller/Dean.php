<?php

namespace app\index\controller;

use app\index\model\AchievementDetail;
use think\Controller;
use think\Exception;
use think\Request;
use app\index\model\Classes;
use app\index\model\Major;
use app\index\model\College;
use app\index\model\ExamNature;
use app\index\model\ShowForm;
use app\index\model\OnCourse;
use app\index\model\ExamForm;
use app\index\model\Course;
use app\index\model\Student;
use app\index\model\Teacher;

class Dean extends Controller
{

    public function index()
    {
        //
        if (session('user.role')=="dean"){
            $dean = \app\index\model\Dean::findById(session('user.account'));
            $classList = Classes::findAll();
            $majorList = Major::findAll();
            $collegeList = College::findAll();
            $examNatureList=ExamNature::findAll();
            $showFormList=ShowForm::findAll();
            $electiveList=OnCourse::findAllElective();
            $examFormList=ExamForm::findAll();
            $courseList=Course::findAll();
            $this->assign("dean",$dean[0]);
            $this->assign("classList",$classList);
            $this->assign("majorList",$majorList);
            $this->assign("collegeList",$collegeList);
            $this->assign("examNatureList",$examNatureList);
            $this->assign("showFormList",$showFormList);
            $this->assign("electiveList",$electiveList);
            $this->assign("examFormList",$examFormList);
            $this->assign("courseList",$courseList);

            return $this->fetch('Dean/dean');
        }else{
            $this->error("请重新登录账号",'/');
        }
    }
    //----------------------Find---------------------------
    public function findStudent()
    {
        $student = input('post.');
        $list = Student::findLike($student);
        $this->assign('list',$list);
        return $this->fetch('Dean/findStudent');
    }
    public function findTeacher()
    {
        $teacher = input('post.');
        $teacherList = Teacher::findLike($teacher);
        $this->assign('teacherList',$teacherList);
        return $this->fetch('Dean/findTeacher');
    }

    public function findOnCourse()
    {
        $onCourse = input('post.');
        $onCourseList = OnCourse::findLike($onCourse);
        $this->assign('onCourseList',$onCourseList);
        return $this->fetch('Dean/findOnCourse');
    }

    public function findCourse()
    {
        $data = input('post.');
        $courseList = Course::findLike($data);
        $this->assign('courseList',$courseList);
        return $this->fetch('Dean/findCourse');
    }

    public function findClassDetail()
    {
        $classId = input('classId');
        $totalSumsList = Student::findAllAvgGradeByClassId($classId);
        $this->assign('totalSumsList',$totalSumsList);
        return $this->fetch('Dean/findClassDetail');
    }

    public function findClass()
    {
        $class = input('post.');
        $classList = Classes::findLike($class);
        $this->assign('classList',$classList);
        return $this->fetch('Dean/findClass');
    }
    //----------------------updates---------------------------
    public function updateStudent(Request $request)
    {
        $student = Student::findById(input('studentId'))[0];
        $this->assign('student',$student);
        $majorList = Major::findAll();
        $classList = Classes::findAll();
        $collegeList = College::findAll();
        $this->assign('classList',$classList);
        $this->assign('majorList',$majorList);
        $this->assign('collegeList',$collegeList);
        return $this->fetch('Dean/updateStudent');
    }
    public function updateTeacher(Request $request)
    {
        $teacher = Teacher::findById(input('teacherId'))[0];
        $this->assign('teacher',$teacher);
        return $this->fetch('Dean/updateTeacher');
    }

    public function updateOnCourse(Request $request)
    {
        $onCourse = OnCourse::findById(input('onCourseId'))[0];
        $classList = Classes::findAll();
        $majorList = Major::findAll();
        $collegeList = College::findAll();
        $examNatureList = ExamNature::findAll();
        $showFormList = ShowForm::findAll();
        $electiveList = OnCourse::findAllElective();
        $examFormList = ExamForm::findAll();
        $teacherList = Teacher::findAll();
        $courseList = Course::findAll();
        $this->assign('teacherList',$teacherList);
        $this->assign('onCourse',$onCourse);
        $this->assign('classList',$classList);
        $this->assign('majorList',$majorList);
        $this->assign('collegeList',$collegeList);
        $this->assign('examNatureList',$examNatureList);
        $this->assign('showFormList',$showFormList);
        $this->assign('electiveList',$electiveList);
        $this->assign('examFormList',$examFormList);
        $this->assign('courseList',$courseList);
        return $this->fetch('Dean/updateOnCourse');
    }

    public function updateCourse()
    {
        $courseId = input('courseId');
        $course = Course::findById($courseId)[0];
        $this->assign('course',$course);
        return $this->fetch('Dean/updateCourse');
    }

    public function updateClass()
    {
        $classId = input('classId');
        $class = Classes::findById($classId)[0];
        $majorList = Major::findAll();
        $this->assign('class',$class);
        $this->assign('majorList',$majorList);

       return $this->fetch('Dean/updateClass');
    }
    //----------------------doUpdate---------------------------
    public function doUpdateStudent()
    {
        $student = input('post.');
        try{
            Student::updateStudent($student);
        }catch (Exception $exception){
            $this->error("更新出错,请假查错误");
        }
        $this->success('修改成功','/findStudent','',1);
    }

    public function doUpdateTeacher()
    {
        $teacher = input('post.');
        try{
            Teacher::updateTeacher($teacher);
        }catch (Exception $exception){
            $this->error("更新出错,请假查错误");
        }
        $this->success('修改成功','/findTeacher','',1);
    }

    public function doUpdateOnCourse()
    {
        $onCourse = input('post.');
        try{
            OnCourse::updateOnCourse($onCourse);
        }catch (Exception $exception){
            $this->error("更新出错,请假查错误");
        }
        $this->success('修改成功','/findOnCourse','','1');
    }

    public function doUpdateCourse()
    {
        $course = input('post.');
        try{
            Course::updateCourse($course);
        }catch (Exception $exception){
            $this->error("更新出错,请假查错误");
        }
        $this->success('修改成功','/findCourse','',1);
    }

    public function doUpdateClass()
    {
        $class = input('post.');
        try{
            Classes::updateClass($class);
        }catch (Exception $exception){
            $this->error("更新出错,请假查错误");
        }
        $this->success("修改成功",'/findClass','',1);
    }

    //----------------------delete---------------------------
    public function deleteStudent(Request $request)
    {
        $studentId = input('studentId');
        try{
            if(Student::deleteById($studentId)>0)
            {
                $this->success("删除成功",'/findStudent','','1');
            }else{
                $this->error("删除出现未知错误,请重新加载页面",'/findStudent');
            }
        }catch (Exception $exception){
            $this->error("删除出现未知错误,请重新加载页面",'/findStudent');
        }
    }

    public function deleteTeacher(Request $request)
    {
        $teacherId = input('teacherId');
        try{
            if (Teacher::deleteById($teacherId)>0){
                $this->success("删除成功",'/findTeacher','','1');
            }else{
                $this->error("删除出现未知错误,请重新加载页面",'/findTeacher');
            }
        }catch (Exception $exception){
            $this->error("删除出现未知错误,请重新加载页面",'/findTeacher');
        }
    }

    public function deleteOnCourse(Request $request)
    {
        $onCourseId = input('onCourseId');
        try{
            if (OnCourse::deleteById($onCourseId)>0){
                $this->success("删除成功",'/findOnCourse','','1');
            }else{
                $this->error("删除出现未知错误,请重新加载页面",'/findOnCourse');
            }
        }catch (Exception $exception){
            $this->error("删除出现未知错误,请重新加载页面",'/findOnCourse');
        }
    }

    public function deleteStudentOnCourse()
    {
        $data = input('post.');
        try{
            if ($data['role']=='class1'){
                $studentList = Student::findAllByClassId($data['id']);
                foreach ($studentList as $item) {
                    $achievementDetail['onCourseId'] = $data['onCourseId'];
                    $achievementDetail['studentId']=$item['studentId'];
                    AchievementDetail::deleteById($achievementDetail);
                }
            }elseif ($data['role']=='student'){
                $achievementDetail['onCourseId'] = $data['onCourseId'];
                $achievementDetail['studentId']=$data['id'];
                AchievementDetail::deleteById($achievementDetail);
            }else{
                $this->error("插入错误,请检查数据是否正确",'/findOnCourse','',1);
            }
            $url = "/insertStudentOnCourse/onCourseId/".$data['onCourseId'];
            $this->success('删除成功',$url,'',1);
        }catch (Exception $exception){
            $this->error("删除出现未知错误,请重新加载页面",'/findOnCourse');
        }
    }

    public function deleteCourse(Request $request)
    {
        $courseId = input('courseId');
        try{
            if (Course::deleteById($courseId)>0){
                $this->success('删除成功','/findCourse','',1);
            }else{
                $this->error('删除出错','/findCourse','',1);
            }
        }catch (Exception $exception){
            $this->error("删除出现未知错误,请重新加载页面",'/findCourse');
        }
    }

    public function deleteClass()
    {
        $classId = input('classId');
        try{

            if (Classes::deleteById($classId)>=1){
                $this->success('删除成功','/findClass','',1);
            }else{
                $this->error('删除失败','/findClass','',1);
            }
        }catch (Exception $exception){
            $this->error("删除出现未知错误,请重新加载页面",'/findClass');
        }
    }
    //----------------------insert---------------------------
    public function insertStudent()
    {
        $classList = Classes::findAll();
        $collegeList = College::findAll();
        $majorList = Major::findAll();

        $this->assign('classList',$classList);
        $this->assign('collegeList',$collegeList);
        $this->assign('majorList',$majorList);
        return $this->fetch('Dean/insertStudent');
    }

    public function insertTeacher()
    {
       return $this->fetch('Dean/insertTeacher');
    }

    public function insertStudentOnCourse($onCourseId)
    {
//        echo "test";
//        dump($onCourseId);
//        $onCourseId = input('onCourseId');
        $classList = Classes::findAll();
        $achievementDetail = AchievementDetail::findById($onCourseId);
        $this->assign('onCourseId',$onCourseId);
        $this->assign('classList',$classList);
        $this->assign('AchievementDetail',$achievementDetail);
        return $this->fetch('Dean/insertStudentOnCourse');
    }

    public function insertOnCourse()
    {
        $classList = Classes::findAll();
        $majorList = Major::findAll();
        $collegeList = College::findAll();
        $examNatureList = ExamNature::findAll();
        $showFormList = ShowForm::findAll();
        $electiveList = OnCourse::findAllElective();
        $examFormList = ExamForm::findAll();
        $teacherList = Teacher::findAll();
        $courseList = Course::findAll();
        $this->assign('teacherList',$teacherList);
        $this->assign('courList',$courseList);
        $this->assign('classList',$classList);
        $this->assign('majorList',$majorList);
        $this->assign('collegeList',$collegeList);
        $this->assign('examNatureList',$examNatureList);
        $this->assign('showFormList',$showFormList);
        $this->assign('electiveList',$electiveList);
        $this->assign('examFormList',$examFormList);
        $this->assign('courseList',$courseList);


        return $this->fetch('Dean/insertOnCourse');
    }

    public function insertCourse()
    {
        return $this->fetch('Dean/insertCourse');
    }

    public function insertClass()
    {
        $class = input('post.');

        try{
            if (Classes::addClass($class)>=1){
                $this->success('添加成功','/dean','',1);
            }else{
                $this->error('添加失败','/dean','',1);
            }
        }catch (Exception $exception){
            $this->error("添加失败，请检查是否有重复键",'/dean','',1);
        }
    }
    //----------------------doInsert---------------------------
    public function doInsertStudent()
    {
        $student = input('post.');
//        dump($student);
        $student['password']=$student['studentId'];
        try{
            if (Student::addStudent($student)==1){
                $this->success('插入成功');
            }else{
                $this->error("插入学生发生错误,请检查");
            }
        }catch (Exception $exception){
            $this->error("插入学生发生错误,请检查");
        }
    }
    public function doInsertTeacher()
    {
        $teacher = input('post.');
        $teacher['password']=$teacher['teacherId'];
        try{
            if (Teacher::addTeacher($teacher)==1){
                $this->success("插入成功",'/insertTeacher','',1);
            }else{
                $this->error("插入发生错误,请检查");
            }
        }catch (Exception $exception){
            $this->error("插入发生错误,请检查");
        }

    }

    public function doInsertStudentOnCourse()
    {
        $data = input('post.');
        if ($data['role']=='class1'){
            $studentList = Student::findAllByClassId($data['id']);
            foreach ($studentList as $item) {
                $achievementDetail['onCourseId'] = $data['onCourseId'];
                $achievementDetail['studentId'] = $item['studentId'];
                try{AchievementDetail::addAchievementDetail($achievementDetail);}
                catch (Exception $exception)
                {
                    $this->error("添加错误,学生已存在或不能为空",'/findOnCourse','',1);
                }
            }
        }elseif ($data['role']=='student'){
                $achievementDetail['onCourseId'] = $data['onCourseId'];
                $achievementDetail['studentId'] = $data['id'];
                try{AchievementDetail::addAchievementDetail($achievementDetail);}
                catch (Exception $exception)
                {
                    $this->error("添加错误,学生已存在或不能为空",'/findOnCourse','',1);
                }

        }else{
            $this->error("添加错误，请假查",'/findOnCourse','',1);
        }
//        $this->success('添加成功','/findOnCourse','',1);
        dump($data);
        $url = "/insertStudentOnCourse/onCourseId/".$data['onCourseId'];
        $this->success('添加成功',$url,'',1);
    }

    public function doInsertCourse()
    {
        $course = input('post.');
        try{
            if (Course::addCourse($course)>=1){
                $this->success('添加成功','/insertCourse','',1);
            }else{
                $this->error('添加错误，请检查','/insertCourse','',1);
            }
        }catch (Exception $exception){
            $this->error("插入发生错误,请检查");
        }
    }

    public function doInsertOnCourse()
    {
        $onCourse = input('post.');
        try{
            if (OnCourse::addOnCourse($onCourse)>= 1){
                $this->success('添加成功','/insertOnCourse','',1);
            }else{
                $this->error('添加错误，请检查','/insertOnCourse','',1);
            }
        }catch (Exception $exception){
            $this->error("插入发生错误,请检查");
        }
    }

}
