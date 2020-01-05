<?php
 	namespace app\index\model;

use think\Controller;
use think\Db;
class College{
	
	public static function findById($collegeId)
	{
		return Db::table('college')->where('collegeId',$collegeId)->select();
	}	

	public static function findAll()
	{
		return Db::table('college')->select();
	}

	public static function deleteById($collegeId){
		return Db::table('college')->where('collegeId',$collegeId)->delete();
	}

	public static function addCollege($college)
	{
		$temp = College::findById($college['collegeId']);
		if(empty($temp)){
			return Db::table('college')->insert($college);
		}		
		return "";
		
	}
	public static function updateCollege($college)
	{
		$setField=[];
		if(!empty($college['collegeName'])){
			$setField['collegeName'] = $college['collegeName'];	
		}			
		return Db::table('college')->where('collegeId',$college['collegeId'])->setField($setField);
	}
	public static function findLike($college)
	{
		$where=[];
		if(!empty($college['collegeId'])){
			$where['collegeId'] = ['like','%'.$college['collegeId']."%"];
		}
		if(!empty($college['collegeName'])){
			$where['collegeName'] = ['like','%'.$college['collegeName']."%"];
		}		
		return Db::table('college')->where($where)->select();
	}
}