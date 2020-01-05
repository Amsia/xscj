<?php
 	namespace app\index\model;

/**
 * 
 */
use think\Controller;
use think\Db;
class ExamForm{
	public static function findById($examFormId)
	{
		return Db::table('examForm')->where('examFormId',$examFormId)->select();
	}	

	public static function findAll()
	{
		return Db::table('examForm')->select();
	}

	public static function deleteById($examFormId){
		return Db::table('examForm')->where('examFormId',$examFormId)->delete();
	}

	public static function addExamForm($examForm)
	{
		$temp = ExamForm::findById($examForm['examFormId']);
		if(empty($temp)){
			return Db::table('examForm')->insert($examForm);
		}		
		return "";
		
	}
	public static function updateExamForm($examForm)
	{
		$setField=[];
		if(!empty($examForm['examFormName'])){
			$setField['examFormName'] = $examForm['examFormName'];	
		}		
		return Db::table('examForm')->where('examFormId',$examForm['examFormId'])->setField($setField);
	}
}