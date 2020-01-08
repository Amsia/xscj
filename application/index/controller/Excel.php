<?php


namespace app\index\controller;

use app\index\model\Achievement;
use think\Controller;
use think\Exception;

class Excel extends Controller
{
    public function test()
    {
        return $this->fetch('Admin/excel');
    }
    public function insertStudentByExcel(){
        //引入文件
        \think\Loader::import('PHPExcel.PHPExcel',EXTEND_PATH);
        $objPHPExcel = new \PHPExcel();
        //获取表单上传文件
        $file = request()->file('file');
        $info = $file->validate(['ext' => 'xlsx,xls'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        //数据为空返回错误
        if(empty($info)){
            $output['status'] = false;
            $output['info'] = '导入数据失败~';
            $this->ajaxReturn($output);
        }
        //获取文件名
        $exclePath = $info->getSaveName();
        //上传文件的地址
        $filename = ROOT_PATH . 'public' . DS . 'uploads'.DS . $exclePath;
        $extension = strtolower( pathinfo($filename, PATHINFO_EXTENSION) );
        \think\Loader::import('PHPExcel.IOFactory.PHPExcel_IOFactory',EXTEND_PATH);
        if ($extension =='xlsx') {
            $objReader = new \PHPExcel_Reader_Excel2007();
            $objExcel = $objReader ->load($filename);
        } else if ($extension =='xls') {
            $objReader = new \PHPExcel_Reader_Excel5();
            $objExcel = $objReader->load($filename);
        }
        //转换为数组格式
        $arr=$objExcel->getsheet(0)->toArray();
        $length = count($arr);
        $studentV = new \app\index\validate\Student;
        $flag = true;//判断错误
        $errIndex=0;
        $data = [];
        for($i = 1;$i<$length;$i++){
            $data[$i-1] = [
                'studentId' => $arr[$i][0],
                'majorId' => $arr[$i][1],
                'classId' => $arr[$i][2],
                'collegeId' => $arr[$i][3],
                'studentName' => $arr[$i][4],
                'studentAge' => $arr[$i][5],
                'studentSex' => $arr[$i][6],
                'password' => $arr[$i][0]
            ];
            if (!$ret = $studentV->check($data[$i-1])) {
                $flag = false;
                $errIndex = $i;
                break;
            }
        }
        if ($flag){
            $msg=[
                'code'=>1,
                'msg'=>'已获取信息',
            ];
        }else{
            $msg=[
                'code'=>0,
                'msg'=>$studentV->getError()."。错误出现在第".$errIndex."行的数据",
            ];
        }
        //添加数据给数据库
        try{
            \app\index\model\Student::insertAll($data);
        }catch (Exception $exception){
            $msg=[
                'code'=>0,
                'msg'=>$exception->getMessage(),
            ];

        }

        $msg['data']['src']=$filename;
        $msg['data']['data']=$data;
        $msg['data']['rule']="excel需要首行为头部,顺序为学号|专业编号|班级编号|学院编号|学生姓名|年龄|性别";
        //删除文件
        if (file_exists($filename)){
            unset($info);
            unlink($filename);
        }
        //返回给前端
        return json_encode($msg);
    }

    public function insertTeacherByExcel()
    {
        //引入文件
        \think\Loader::import('PHPExcel.PHPExcel',EXTEND_PATH);
        $objPHPExcel = new \PHPExcel();
        //获取表单上传文件
        $file = request()->file('file');
        $info = $file->validate(['ext' => 'xlsx,xls'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        //数据为空返回错误
        if(empty($info)){
            $output['status'] = false;
            $output['info'] = '导入数据失败~';
            $this->ajaxReturn($output);
        }
        //获取文件名
        $exclePath = $info->getSaveName();
        //上传文件的地址
        $filename = ROOT_PATH . 'public' . DS . 'uploads'.DS . $exclePath;
        $extension = strtolower( pathinfo($filename, PATHINFO_EXTENSION) );
        \think\Loader::import('PHPExcel.IOFactory.PHPExcel_IOFactory',EXTEND_PATH);
        if ($extension =='xlsx') {
            $objReader = new \PHPExcel_Reader_Excel2007();
            $objExcel = $objReader ->load($filename);
        } else if ($extension =='xls') {
            $objReader = new \PHPExcel_Reader_Excel5();
            $objExcel = $objReader->load($filename);
        }
        //转换为数组格式
        $arr=$objExcel->getsheet(0)->toArray();
        $length = count($arr);
        $teacherV = new \app\index\validate\Teacher;
        $flag = true;//判断错误
        $errIndex=0;
        $data = [];
        for($i = 1;$i<$length;$i++){
            $data[$i-1] = [
                'teacherId' => $arr[$i][0],
                'teacherName' => $arr[$i][1],
                'teacherAge' => $arr[$i][2],
                'teacherSex' => $arr[$i][3],
                'password' => $arr[$i][0],
            ];
            if (!$ret = $teacherV->check($data[$i-1])) {
                $flag = false;
                $errIndex = $i;
                break;
            }
        }
        if ($flag){
            $msg=[
                'code'=>1,
                'msg'=>'已获取信息',
            ];
        }else{
            $msg=[
                'code'=>0,
                'msg'=>$teacherV->getError()."。错误出现在第".$errIndex."行的数据",
            ];
        }
        //添加数据给数据库
        try{
            \app\index\model\Teacher::insertAll($data);
        }catch (Exception $exception){
            $msg=[
                'code'=>0,
                'msg'=>$exception->getMessage(),
            ];

        }

        $msg['data']['src']=$filename;
        $msg['data']['data']=$data;
        $msg['data']['rule']="excel需要首行为头部,顺序为|教师编号|教师姓名|教师年龄|教师性别";
        //删除文件
        if (file_exists($filename)){
            unset($info);
            unlink($filename);
        }
        //返回给前端
        return json_encode($msg);
    }

    public function downLoadAchievement()
    {

        $data = $_POST["onCourseId"];
        $onCourseId = input('onCourseId');
        $achievementList = Achievement::findByOnCourseId($onCourseId);
        \think\Loader::import('PHPExcel.PHPExcel',EXTEND_PATH);
        $objExcel = new \PHPExcel();
        \think\Loader::import('PHPExcel.IOFactory.PHPExcel_IOFactory',EXTEND_PATH);
        $objWriter = new \PHPExcel_Writer_Excel5($objExcel);
        $objActSheet = $objExcel->getActiveSheet(0);
        $objActSheet->setTitle('成绩列表');//设置excel的标题
        $objActSheet->setCellValue('A1','学号');
        $objActSheet->setCellValue('B1','姓名');
        $objActSheet->setCellValue('C1','班级');
        $objActSheet->setCellValue('D1','成绩');
        $baseRow = 1; //数据从N-1行开始往下输出 这里是避免头信息被覆盖
        for($i = 0,$r = 2;$i<count($achievementList);$i++,$r++){
            $objExcel->getActiveSheet()->setCellValue('A'.$r,$achievementList[$i]['studentId']);
            $objExcel->getActiveSheet()->setCellValue('B'.$r,$achievementList[$i]['studentName']);
            $objExcel->getActiveSheet()->setCellValue('C'.$r,$achievementList[$i]['className']);
            $objExcel->getActiveSheet()->setCellValue('D'.$r,$achievementList[$i]['achievement']);
        }
        $objExcel->setActiveSheetIndex(0);
        $time=date('Y-m-d');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=成绩列表'.$time.'.xls');
        header('Cache-Control: max-age=0');

        $objWriter->save('php://output');
        exit();
//        $msg['data']['data']=$achievementList;
//        return json_encode($msg);
    }
    public function browser_export($type,$filename){
        if($type=="Excel5"){
            header('Content-Type: application/vnd.ms-excel');//告诉浏览器将要输出excel03文件
        }else{
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器数据excel07文件
        }
        header('Content-Disposition: attachment;filename="'.$filename.'"');//告诉浏览器将输出文件的名称
        header('Cache-Control: max-age=0');//禁止缓存
    }
    public function downloadTemplate(){
        //生成excel到文件
        $fileId=md5(time() + rand() * 100000);
        $filePath = getFilePath($fileId);
        $fileId = iconv('utf-8','gbk',$fileName);
        $filePath = '/home/examine/';
        if (!is_dir($filePath)) {
            @mkdir($filePath, 0777, true);
        }
        $fileName = $fileId.'.xls';
        $excelLocalPath = $filePath . $fileName;
        $objWriter->save($excelLocalPath);
        echo $excelLocalPath;
    }

}