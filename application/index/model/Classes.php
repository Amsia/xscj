<?php
 	namespace app\index\model;

use think\Controller;
use think\Db;
class Classes{
	
	public static function findById($classId)
	{
		return Db::table('class')->where('classId',$classId)->select();
	}	

	public static function findAll()
	{
		return Db::table('class')->select();
	}

	public static function deleteById($classId){
		return Db::table('class')->where('classId',$classId)->delete();
	}

	public static function addClass($class)
	{
		
			return Db::table('class')->insert($class);
		
	}
	public static function updateClass($class)
	{
		$setField=[];
		if(!empty($class['className'])){
			$setField['className'] = $class['className'];	
		}
		if(!empty($class['majorId'])){
			$setField['majorId'] = $class['majorId'];	
		}			
		return Db::table('class')->where('classId',$class['classId'])->setField($setField);
	}
	public static function findLike($class)
	{
		$where=[];
		if(!empty($class['classId'])){
			$where['classId'] = ['like','%'.$class['classId']."%"];
		}
		if(!empty($class['className'])){
			$where['className'] = ['like','%'.$class['className']."%"];
		}
		if(!empty($class['majorId'])){
			$where['class.majorId'] = ['like','%'.$class['majorId']."%"];
		}
		if(!empty($class['majorName'])){
			$where['majorName'] = ['like','%'.$class['majorName']."%"];
		}	
		return Db::table('class')->where($where)->join('major','class.majorId=major.majorId')->select();
	}
}