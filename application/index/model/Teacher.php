<?php
 	namespace app\index\model;

/**
 * 
 */
use think\Controller;
use think\Db;
class Teacher{
	public static function findByAccount($account,$password)
	{
		return Db::table('teacher')->where('teacherId',$account)->where('password',$password)->select();
	}
	public static function findById($teacherId)
	{
		return Db::table('teacher')->where('teacherId',$teacherId)->select();
	}	
	public static function findAll()
	{
		return Db::table('teacher')->paginate(20);
	}
	public static function deleteById($teacherId){
		return Db::table('teacher')->where('teacherId',$teacherId)->delete();
	}
	public static function addTeacher($teacher)
	{
		$temp = Teacher::findById($teacher['teacherId']);
		if(empty($temp)){
			return Db::table('teacher')->insert($teacher);
		}		
		return "";
		
	}
	public static function updateTeacher($teacher)
	{
		$setField=[];
		if(!empty($teacher['teacherName'])){
			$setField['teacherName'] = $teacher['teacherName'];
		
		}
		if(!empty($teacher['teacherAge'])){
			$setField['teacherAge'] = $teacher['teacherAge'];
		}
		if(!empty($teacher['password'])){
			$setField['password'] = $teacher['password'];
		}
		return Db::table('teacher')->where('teacherId',$teacher['teacherId'])->setField($setField);
	}
	public static function findLike($teacher){
		$where=[];
		if(!empty($teacher['teacherName'])){
			$where['teacherName'] = ['like','%'.$teacher['teacherName']."%"];
		}
		if(!empty($teacher['teacherId'])){
			$where['teacherId'] = ['like','%'.$teacher['teacherId']."%"];
		}
		return Db::table('teacher')->where($where)->paginate(20);
	}
}