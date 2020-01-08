<?php
 	namespace app\index\model;

/**
 * 
 */
use think\Controller;
use think\Db;
/**
 * 
 */
class OnCourse
{
	public static function findById($onCourseId)
	{
		return Db::table('onCourse')->where('onCourseId',$onCourseId)->select();
	}	
	public static function findByteacherId($teacherId)
	{
		$temp = Db::table('onCourse')	
		->join('elective','onCourse.electiveId=elective.electiveId')
		->join('examNature','onCourse.natureId=examNature.natureId')
		->join('teacher','onCourse.teacherId=teacher.teacherId')
		->join('course','onCourse.courseId=course.courseId')
		->join('showForm','onCourse.showFormId=showForm.showFormId')		
		->join('examForm','onCourse.examFormId=examForm.examFormId')		
		->where('onCourse.teacherId',$teacherId)->select();
		
		for ($i=0; $i <count($temp) ; $i++) { 
			
			$temp[$i]['className']=Db::table('onCourseClass')->join('class','onCourseClass.classId=class.classId')->where('onCourseId',$temp[$i]['onCourseId'])->select();
		}

		return $temp;

	}	
	public static function findAll()
	{
		return Db::table('onCourse')->select();
	}

	public static function addOnCourse($onCourse)
	{
		
			return Db::table('onCourse')->insert($onCourse);
			
	}

	public static function updateOnCourse($onCourse)
	{
		$setField=[];
		if(!empty($onCourse['examFormId'])){
			$setField['examFormId'] = $onCourse['examFormId'];	
		}
		if(!empty($onCourse['natureId'])){
			$setField['natureId'] = $onCourse['natureId'];	
		}
		if(!empty($onCourse['teacherId'])){
			$setField['teacherId'] = $onCourse['teacherId'];	
		}
		if(!empty($onCourse['courseId'])){
			$setFieldonCourse['courseId'] = $onCourse['courseId'];	
		}
		if(!empty($onCourse['showFormId'])){
			$setField['showFormId'] = $onCourse['showFormId'];	
		}		
		if(!empty($onCourse['deadline'])){
			$setField['deadline'] = $onCourse['deadline'];	
		}
		if(!empty($onCourse['examTime'])){
			$setField['examTime'] = $onCourse['examTime'];	
		}
		if(!empty($onCourse['electiveId'])){
			$setField['electiveId'] = $onCourse['electiveId'];	
		}
		if(!empty($onCourse['term'])){
			$setField['term'] = $onCourse['term'];	
		}
		if(!empty($onCourse['classroom'])){
			$setField['classroom'] = $onCourse['classroom'];	
		}
		if(!empty($onCourse['oral'])){
			$setField['oral'] = $onCourse['oral'];	
		}
		if(!empty($onCourse['theory'])){
			$setField['theory'] = $onCourse['theory'];	
		}
		if(!empty($onCourse['daily'])){
			$setField['daily'] = $onCourse['daily'];	
		}
		if(!empty($onCourse['experiment'])){
			$setField['experiment'] = $onCourse['experiment'];	
		}
		if(!empty($onCourse['finalGrade'])){
			$setField['finalGrade'] = $onCourse['finalGrade'];	
		}		
		return Db::table('onCourse')->where('onCourseId',$onCourse['onCourseId'])->setField($setField);
	}

	public static function findAllElective()
	{
		return Db::table('elective')->select();
	}

	public static function findAllWithDeatil()
	{
		Db:table('onCourse')->join('examForm','onCourse.examFormId=examForm.examFormId')
		->join('elective','onCourse.electiveId=elective.electiveId')
		->join('examNature','onCourse.natureId=examNature.natureId')
		->join('teacher','onCourse.teacherId=teacher.teacherId')
		->join('course','onCourse.courseId=course.courseId')
		->join('showForm','onCourse.showFormId=showForm.showFormId')
		->join('examForm','onCourse.examFormId=examForm.examFormId')->paginate(20);
	}

	public static function findLike($onCourse)
	{
		$where=[];
		if(!empty($onCourse['onCourseId'])){
			$where['onCourseId'] = ['like','%'.$onCourse['onCourseId']."%"];
		}
		if(!empty($onCourse['examFormId'])){
			$where['examForm.examFormId'] = ['like','%'.$onCourse['examFormId']."%"];
		}
		if(!empty($onCourse['natureId'])){
			$where['examNature.natureId'] = ['like','%'.$onCourse['natureId']."%"];
		}
		if(!empty($onCourse['teacherId'])){
			$where['teacher.teacherId'] = ['like','%'.$onCourse['teacherId']."%"];
		}
		if(!empty($onCourse['teacherName'])){
			$where['teacherName'] = ['like','%'.$onCourse['teacherName']."%"];
		}
		if(!empty($onCourse['courseName'])){
			$where['courseName'] = ['like','%'.$onCourse['courseName']."%"];
		}
		if(!empty($onCourse['courseId'])){
			$where['course.courseId'] = ['like','%'.$onCourse['courseId']."%"];
		}
		if(!empty($onCourse['showFormId'])){
			$where['showForm.showFormId'] = ['like','%'.$onCourse['showFormId']."%"];
		}
		if(!empty($onCourse['electiveId'])){
			$where['elective.electiveId'] = ['like','%'.$onCourse['electiveId']."%"];
		}
		if(!empty($onCourse['term'])){
			$where['term'] = ['like','%'.$onCourse['term']."%"];
		}
		if(!empty($onCourse['classroom'])){
			$where['classroom'] = ['like','%'.$onCourse['classroom']."%"];
		}

		return Db::table('onCourse')
		->join('examForm','onCourse.examFormId=examForm.examFormId')
		->join('elective','onCourse.electiveId=elective.electiveId')
		->join('examNature','onCourse.natureId=examNature.natureId')
		->join('course','onCourse.courseId=course.courseId')
		->join('teacher',' onCourse.teacherId=teacher.teacherId')
		->join('showForm',' onCourse.showFormId=showForm.showFormId')->where($where)->paginate(5)->each(function ($item,$key){
		    if ($item['isEntry']==0){
		        $item['isEntryName']='未录入';
            }else{
                $item['isEntryName']='已录入';
            }
		    return $item;
            });


	}

	public static function deleteById($onCourseId)
	{
		return Db::table('onCourse')->where('onCourseId',$onCourseId)->delete();
	}
	
	public static function updateIsEntry($onCourseId)
	{
		return Db::table('onCourse')->where('onCourseId',$onCourseId)->setField('isEntry',true);
	}
	public static function findByIdWithDeatil($onCourseId)
	{
		$temp=Db::table('onCourse')			
		->join('elective','onCourse.electiveId=elective.electiveId')
		->join('examNature','onCourse.natureId=examNature.natureId')
		->join('teacher','onCourse.teacherId=teacher.teacherId')
		->join('course','onCourse.courseId=course.courseId')
		->join('showForm','onCourse.showFormId=showForm.showFormId')		
		->join('examForm','onCourse.examFormId=examForm.examFormId')		
		->where('onCourse.onCourseId',$onCourseId)->select();
		for ($i=0; $i <count($temp) ; $i++) { 
			
			$temp[$i]['className']=Db::table('onCourseClass')->join('class','onCourseClass.classId=class.classId')->where('onCourseId',$temp[$i]['onCourseId'])->select();
		}

		return $temp;
	}
    public static function updateOnCourseGrade($onCourse){
        $setField=[];
        $setField['oral'] = $onCourse['oral'];
        $setField['theory'] = $onCourse['theory'];
        $setField['daily'] = $onCourse['daily'];
        $setField['experiment'] = $onCourse['experiment'];
        $setField['finalGrade'] = $onCourse['finalGrade'];
        return Db::table('onCourse')->where('onCourseId',$onCourse['onCourseId'])->setField($setField);
    }
}