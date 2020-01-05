<?php
 	namespace app\index\model;

use think\Controller;
use think\Db;
class AchievementDetail{
	
	public static function findById($onCourseId)
	{
		return Db::table('achievementDetail')->join('student',' achievementDetail.studentId=student.studentId ')->join('class',' student.classId=class.classId ')->where('onCourseId',$onCourseId)->select();
	}	
	public static function deleteById($achievementDetail){
		
		return Db::table('achievementDetail')->where('studentId',$achievementDetail['studentId'])->where('onCourseId',$achievementDetail['onCourseId'])->delete();
	}

	public static function addAchievementDetail($achievementDetail)
	{
		
		return Db::table('achievementDetail')->insert($achievementDetail);
			
	}
	public static function updateAchievementDetail($achievementDetail)
	{
		$setField=[];
			$setField['oral'] = $achievementDetail['oral'];	
			$setField['theory'] = $achievementDetail['theory'];	
			$setField['daily'] = $achievementDetail['daily'];	
			$setField['experiment'] = $achievementDetail['experiment'];	
			$setField['finalGrade'] = $achievementDetail['finalGrade'];			
		return Db::table('achievementDetail')->where('studentId',$achievementDetail['studentId'])->where('onCourseId',$achievementDetail['onCourseId'])->setField($setField);
	}
	public static function addOnCourseClass($onCourseClass)
	{
		return Db::table('onCourseClass')->insert($onCourseClass);
	}
	public static function deleteOnCourseClass($onCourseClass)
	{
		return Db::table('onCourseClass')->where('onCourseId',$onCourseClass['onCourseId'])->where('classId',$onCourseClass['classId'])->delete();
	}
}