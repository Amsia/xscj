<?php
 	namespace app\index\model;

use think\Controller;
use think\Db;
class Achievement{
	
	public static function findByStudentId($studentId)
	{
		return Db::table('achievement')->where('studentId',$studentId)->select();
	}
	public static function findByOnCourseId($onCourseId)
	{
		return Db::table('achievement')->where('onCourseId',$onCourseId)->join('student',' achievement.studentId=student.studentId ')->join('class',' student.classId=class.classId ')->where('onCourseId',$onCourseId)->select();
	}		
	public static function deleteById($achievement){
		return Db::table('achievement')->where('studentId',$achievement['studentId'])->where('onCourseId',$achievement['onCourseId'])->delete();
	}

	public static function addAchievement($achievement)
	{
		
			return Db::table('achievement')->insert($achievement);
		
		
	}
	public static function updateAchievement($achievement)
	{
		$setField=[];
		if(!empty($achievement['achievement'])){
			$setField['achievement'] = $achievement['achievement'];	
		}			
		return Db::table('achievement')->where('studentId',$achievement['studentId'])->where('onCourseId',$achievement['onCourseId'])->setField($setField);
	}
	
}