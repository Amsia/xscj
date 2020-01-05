<?php

namespace app\index\controller;

use app\index\model\AchievementDetail;
use think\Controller;
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
            $this->error("请重新登录账号",'index/index');
        }
    }
    //----------------------Find---------------------------
    public function findStudent()
    {
        $student = input('post.');
        $list = Student::findLike($student);
        $this->assign('list',$list);
        return $this->fetch('dean/findStudent');
    }
    public function findTeacher()
    {
        $teacher = input('post.');
        $teacherList = Teacher::findLike($teacher);
        $this->assign('teacherList',$teacherList);
        return $this->fetch('dean/findTeacher');
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
        return $this->fetch('dean/findCourse');
    }

    public function findClassDetail()
    {
        $classId = input('classId');
        $totalSumsList = Student::findAllAvgGradeByClassId($classId);
        $this->assign('totalSumsList',$totalSumsList);
        return $this->fetch('dean/findClassDetail');
    }

    public function findClass()
    {
        $class = input('post.');
        $classList = Classes::findLike($class);
        $this->assign('classList',$classList);
        return $this->fetch('dean/findClass');
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
        return $this->fetch('dean/updateStudent');
    }
    public function updateTeacher(Request $request)
    {
        $teacher = Teacher::findById(input('teacherId'))[0];
        $this->assign('teacher',$teacher);
        return $this->fetch('dean/updateTeacher');
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
        $courseList = Course::findAll();
        $this->assign('onCourse',$onCourse);
        $this->assign('classList',$classList);
        $this->assign('majorList',$majorList);
        $this->assign('collegeList',$collegeList);
        $this->assign('examNatureList',$examNatureList);
        $this->assign('showFormList',$showFormList);
        $this->assign('electiveList',$electiveList);
        $this->assign('examFormList',$examFormList);
        $this->assign('courseList',$courseList);
        return $this->fetch('dean/updateOnCourse');
    }

    public function updateCourse()
    {
        $courseId = input('courseId');
        $course = Course::findById($courseId)[0];
        $this->assign('course',$course);
        return $this->fetch('dean/updateCourse');
    }

    public function updateClass()
    {
        $classId = input('classId');
        $class = Classes::findById($classId)[0];
        $majorList = Major::findAll();
        $this->assign('class',$class);
        $this->assign('majorList',$majorList);

       return $this->fetch('dean/updateClass');
    }
    //----------------------doUpdate---------------------------
    public function doUpdateStudent()
    {
        $student = input('post.');
        Student::updateStudent($student);
//        dump($student);
        $this->success('修改成功','dean/findStudent','',1);
    }

    public function doUpdateTeacher()
    {
        $teacher = input('post.');
        Teacher::updateTeacher($teacher);
        $this->success('修改成功','dean/findTeacher','',1);
    }

    public function doUpdateOnCourse()
    {
        $onCourse = input('post.');
        OnCourse::updateOnCourse($onCourse);
        $this->success('修改成功','dean/findOnCourse','','1');
    }

    public function doUpdateCourse()
    {
        $course = input('post.');
        Course::updateCourse($course);
        $this->success('修改成功','dean/findCourse','',1);
    }

    public function doUpdateClass()
    {
        $class = input('post.');
        Classes::updateClass($class);
        $this->success("修改成功",'dean/findClass','',1);
    }

    //----------------------delete---------------------------
    public function deleteStudent(Request $request)
    {
        $studentId = input('studentId');
        if(Student::deleteById($studentId)>0)
        {
            $this->success("删除成功",'dean/findStudent','','1');
        }else{
            $this->error("删除出现未知错误,请重新加载页面",'dean/index');
        }
    }

    public function deleteTeacher(Request $request)
    {
        $teacherId = input('teacherId');
        if (Teacher::deleteById($teacherId)>0){
            $this->success("删除成功",'dean/findTeacher','','1');
        }else{
            $this->error("删除出现未知错误,请重新加载页面",'dean/index');
        }
    }

    public function deleteOnCourse(Request $request)
    {
        $onCourseId = input('onCourseId');
        if (OnCourse::deleteById($onCourseId)>0){
            $this->success("删除成功",'dean/findOnCourse','','1');
        }else{
            $this->error("删除出现未知错误,请重新加载页面",'dean/index');
        }
    }

    public function deleteStudentOnCourse()
    {
        $data = input('post.');
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
            $this->error("插入错误,请检查数据是否正确",'dean/findOnCourse','',1);
        }
        $this->success('删除成功','dean/findOnCourse','',1);
    }

    public function deleteCourse(Request $request)
    {
        $courseId = input('courseId');
        if (Course::deleteById($courseId)>0){
            $this->success('删除成功','dean/findCourse','',1);
        }else{
            $this->error('删除出错','dean/findCourse','',1);
        }
    }

    public function deleteClass()
    {
        $classId = input('classId');
        if (Classes::deleteById($classId)>=1){
            $this->success('删除成功','dean/findClass','',1);
        }else{
            $this->error('删除失败','dean/findClass','',1);
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

    public function insertStudentOnCourse(Request $request)
    {
        $onCourseId = input('onCourseId');
        $classList = Classes::findAll();
        $achievementDetail = AchievementDetail::findById($onCourseId);
        $this->assign('onCourseId',$onCourseId);
        $this->assign('classList',$classList);
        $this->assign('AchievementDetail',$achievementDetail);
        return $this->fetch('dean/insertStudentOnCourse');
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
        $courseList = Course::findAll();
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
        if (Classes::addClass($class)>=1){
            $this->success('添加成功','dean/index','',1);
        }else{
            $this->error('添加失败','dean/index','',1);
        }
    }
    //----------------------doInsert---------------------------
    public function doInsertStudent()
    {
        $student = input('post.');
//        dump($student);
        $student['password']=$student['studentId'];
        if (Student::addStudent($student)==1){
            $this->success('插入成功');
        }else{
            $this->error("插入学生发生错误,请检查");
        }
    }
    public function doInsertTeacher()
    {
        $teacher = input('post.');
        $teacher['password']=$teacher['teacherId'];
        if (Teacher::addTeacher($teacher)==1){
            $this->success("插入成功",'dean/insertTeacher','',1);
        }else{
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
                AchievementDetail::addAchievementDetail($achievementDetail);
            }
        }elseif ($data['role']=='student'){
                $achievementDetail['onCourseId'] = $data['onCourseId'];
                $achievementDetail['studentId'] = $data['id'];
                AchievementDetail::addAchievementDetail($achievementDetail);
        }else{
            $this->error("添加错误，请假查",'dean/findOnCourse','',1);
        }
        $this->success('添加成功','dean/findOnCourse','',1);
    }

    public function doInsertCourse()
    {
        $course = input('post.');
        if (Course::addCourse($course)>=1){
            $this->success('添加成功','dean/insertCourse','',1);
        }else{
            $this->error('添加错误，请检查','dean/insertCourse','',1);
        }
    }

    public function doInsertOnCourse()
    {
        $onCourse = input('post.');
        if (OnCourse::addOnCourse($onCourse)>= 1){
            $this->success('添加成功','dean/insertOnCourse','',1);
        }else{
            $this->error('添加错误，请检查','dean/insertOnCourse','',1);
        }

    }

    public function doInsertClass()
    {
        
    }
}
