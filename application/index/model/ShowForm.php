<?php
 	namespace app\index\model;

/**
 * 
 */
use think\Controller;
use think\Db;
class ShowForm{

	public static function findById($showFormId)
	{
		return Db::table('showForm')->where('showFormId',$showFormId)->select();
	}	

	public static function findAll()
	{
		return Db::table('showForm')->select();
	}

	public static function deleteById($showFormId){
		return Db::table('showForm')->where('showFormId',$showFormId)->delete();
	}

	public static function addShowForm($showForm)
	{
		
			return Db::table('showForm')->insert($showForm);
		
		
	}
	public static function updateShowForm($showForm)
	{
		$setField=[];
		if(!empty($showForm['showFormName'])){
			$setField['showFormName'] = $showForm['showFormName'];	
		}		
		return Db::table('showForm')->where('showFormId',$showForm['showFormId'])->setField($setField);
	}
	
}