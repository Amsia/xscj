<?php
 	namespace app\index\model;

/**
 * 
 */
use think\Controller;
use think\Db;
class ExamNature{
	public static function findById($natureId)
	{
		return Db::table('examNature')->where('natureId',$natureId)->select();
	}	

	public static function findAll()
	{
		return Db::table('examNature')->select();
	}

	public static function deleteById($natureId){
		return Db::table('examNature')->where('natureId',$natureId)->delete();
	}

	public static function addExamNature($examNature)
	{
		
			return Db::table('examNature')->insert($examNature);
		
		
	}
	public static function updateExamNature($examNature)
	{
		$setField=[];
		if(!empty($examNature['natureName'])){
			$setField['natureName'] = $examNature['natureName'];	
		}		
		return Db::table('examNature')->where('natureId',$examNature['natureId'])->setField($setField);
	}
}