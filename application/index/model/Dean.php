<?php
 	namespace app\index\model;

/**
 * 
 */
use think\Controller;
use think\Db;
class Dean{
	public static function findByAccount($account,$password)
	{
		return Db::table('dean')->where('deanId',$account)->where('password',$password)->select();
	}
	public static function findById($deanId)
	{
		return Db::table('dean')->where('deanId',$deanId)->select();
	}	

	public static function findAll()
	{
		return Db::table('dean')->select();
	}

	public static function deleteById($deanId){
		return Db::table('dean')->where('deanId',$deanId)->delete();
	}

	public static function addDean($dean)
	{
		$temp = Dean::findById($dean['deanId']);
		if(empty($temp)){
			return Db::table('dean')->insert($dean);
		}		
		return "";
		
	}
	public static function updateDean($dean)
	{
		$setField=[];
		if(!empty($dean['deanName'])){
			$setField['deanName'] = $dean['deanName'];	
		}
		if(!empty($dean['deanAge'])){
			$setField['deanAge'] = $dean['deanAge'];	
		}
		if(!empty($dean['password'])){
			$setField['password'] = $dean['password'];	
		}
		return Db::table('dean')->where('deanId',$dean['deanId'])->setField($setField);
	}
}