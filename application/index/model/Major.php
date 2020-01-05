<?php
 	namespace app\index\model;

/**
 * 
 */
use think\Controller;
use think\Db;
class Major{
	public static function findById($majorId)
	{
		return Db::table('major')->where('majorId',$majorId)->select();
	}	

	public static function findAll()
	{
		return Db::table('major')->select();
	}

	public static function deleteById($majorId){
		return Db::table('major')->where('majorId',$majorId)->delete();
	}

	public static function addMajor($major)
	{
		$temp = Major::findById($major['majorId']);
		if(empty($temp)){
			return Db::table('major')->insert($major);
		}		
		return "";
		
	}
	public static function updateMajor($major)
	{
		$setField=[];
		if(!empty($major['majorName'])){
			$setField['majorName'] = $major['majorName'];	
		}		
		return Db::table('major')->where('majorId',$major['majorId'])->setField($setField);
	}
}