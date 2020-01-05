<?php
 	namespace app\index\model;

/**
 * 
 */
use think\Controller;
use think\Db;
class Course{
	
	public static function findById($courseId)
	{
		return Db::table('course')->where('courseId',$courseId)->select();
	}	

	public static function findAll()
	{
		return Db::table('course')->paginate(20);
	}

	public static function deleteById($courseId){
		return Db::table('course')->where('courseId',$courseId)->delete();
	}

	public static function addCourse($course)
	{
		$temp = Course::findById($course['courseId']);
		if(empty($temp)){
			return Db::table('course')->insert($course);
		}		
		return "";
		
	}
	public static function updateCourse($course)
	{
		$setField=[];
		if(!empty($course['courseName'])){
			$setField['courseName'] = $course['courseName'];	
		}
		if(!empty($course['classHour'])){
			$setField['classHour'] = $course['classHour'];	
		}
		if(!empty($course['credit'])){
			$setField['credit'] = $course['credit'];	
		}
		return Db::table('course')->where('courseId',$course['courseId'])->setField($setField);
	}
	public static function findLike($course)
	{
		$where=[];
		if(!empty($course['courseId'])){
			$where['courseId'] = ['like','%'.$course['courseId']."%"];
		}
		if(!empty($course['courseName'])){
			$where['courseName'] = ['like','%'.$course['courseName']."%"];
		}		
		return Db::table('course')->where($where)->paginate(20);
	}
}