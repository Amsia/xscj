<?php
 	namespace app\index\model;

/**
 * 
 */
use think\Controller;
use think\Db;
class Student
{
	
	public static function findByAccount($account,$password)
	{
		return Db::table('student')->join('class',' student.classId=class.classId ')->join('major','student.majorId=major.majorId')->join('college','student.collegeId=college.collegeId')->where('studentId',$account)->where('password',$password)->select();
	}
	public static function findById($studentId)
	{
		return Db::table('student')->join('class',' student.classId=class.classId ')->join('major','student.majorId=major.majorId')->join('college','student.collegeId=college.collegeId')->where('studentId',$studentId)->select();
	}	
	public static function findAll()
	{
		return Db::table('student')->select();
	}
	 public static function findAllByClassId($classId)
	 {
	 	return Db::table('student')->where('classId',$classId)->select();
	 }
	 public static function findFailByOnCourseId($onCourseId)
	 {
	 			 		
	 	 return Db::table('student')->where('studentId','in',function($query)USE($onCourseId){
							$query->table('achievement')->field('studentId')->where('onCourseId',$onCourseId)->where('achievement','<','60');
									})->select();	 	
	 }
	public static function findLike($student)
	{
		$where=[];
		if(!empty($student['studentName'])){
			$where['studentName'] = ['like','%'.$student['studentName']."%"];
		}
		if(!empty($student['majorId'])){
			$where['student.majorId'] = $student['majorId'];
		}
		if(!empty($student['classId'])){
			$where['student.classId'] = $student['classId'];
		}
		if(!empty($student['collegeId'])){
			$where['student.collegeId'] = $student['collegeId'];
		}
		if(!empty($student['studentId'])){
			$where['studentId'] = ['like','%'.$student['studentId']."%"];
		}
		
		return Db::table('student')->join('class','student.classId=class.classId ')->join('major','student.majorId=major.majorId')->join('college','student.collegeId=college.collegeId')->where($where)->select();
	}
	public static function studentFindGrade($studentId)
	{
		return Db::table('achievement')->join('onCourse','achievement.onCourseId=onCourse.onCourseId')->join('course','onCourse.courseId=course.courseId')->join('examNature','onCourse.natureId=examNature.natureId')->join('examForm','onCourse.examFormId=examForm.examFormId')->join('elective','onCourse.electiveId=elective.electiveId')->where('studentId',$studentId)->paginate(20);
	}
	public static function findAllAvgGradeByClassId($classId)
	{
		return Db::table('achievement')->join('onCourse','achievement.oncourseId =onCourse.oncourseId')->join('course','course.courseId=Oncourse.courseId')->where('studentId','in',function($query)USE($classId){
							$query->table('student')->field('studentId')->where('classId',$classId);
									})->group("achievement.oncourseId")->field("achievement.onCourseId,
		course.courseName,AVG(achievement.achievement) as avgGrade,COUNT(achievement.studentId) as sum,Count(achievement.achievement < 60 or null) as failSum")->select();
	}
	public static function addStudent($student)
	{
		$temp = Student::findById($student['studentId']);
		if(empty($temp)){
			return Db::table('student')->insert($student);
		}		
		return "";
		
	}
	public static function insertAll($student)
	{
       return Db::table('student')->insertAll($student);
	}
	public static function updateStudent($student)
	{
		$setField=[];
		if(!empty($student['studentName'])){
			$setField['studentName'] = $student['studentName'];
		
		}
		if(!empty($student['majorId'])){
			$setField['majorId'] = $student['majorId'];
		}
		if(!empty($student['classId'])){
			$setField['classId'] = $student['classId'];
		}
		if(!empty($student['collegeId'])){
			$setField['collegeId'] = $student['collegeId'];
		}
		if(!empty($student['studentAge'])){
			$setField['studentAge'] = $student['studentAge'];
		}
		if(!empty($student['password'])){
			$setField['password'] = $student['password'];
		}
		if(!empty($student['studentSex'])){
			$where['studentSex'] = $student['studentSex'];
		}
		return Db::table('student')->where('studentId',$student['studentId'])->setField($setField);
	}
	public static function deleteById($studentId){
		return Db::table('student')->where('studentId',$studentId)->delete();
	}
}
