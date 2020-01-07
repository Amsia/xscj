<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp64\www\xscj\public/../application/index\view\Teacher\setOnCourse.html";i:1578376016;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>设置课程界面</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <script src="/static/layui/layui.js"></script>
</head>
<script type="text/javascript">
    layui.use('element', function() {
        var element = layui.element;
        element.on('tab(demo)', function(data) {
            console.log(data);
        });
    });
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form,$=layui.$;
        // layer.msg('学生成绩管理系统-叶广宇，沈尧');
        form.verify({
            number : [/^[0-9]*$/, '请输入数字'],
            correct:function (value) {
                var daily = parseInt($("input[name='daily']").val());
                daily = isNaN(daily)?0:daily;
                var finalGrade = parseInt($("input[name='finalGrade']").val());
                finalGrade = isNaN(finalGrade)?0:finalGrade;
                var experiment =parseInt($("input[name='experiment']").val());
                experiment = isNaN(experiment)?0:experiment;
                var oral = parseInt($("input[name='oral']").val());
                oral = isNaN(oral)?0:oral;
                var theory = parseInt($("input[name='theory']").val());
                theory = isNaN(theory)?0:theory;
                if (daily+finalGrade+experiment+oral+theory !== 100){
                    console.log(daily+finalGrade+experiment+oral+theory);
                    return "占比总和非法,请检查";
                }
            }
        });
    });
</script>
<body>
<center><h2>教师成绩录入设置</h2></center>
<div style="width:80%;padding-left:10%">
    <table class="layui-table">

        <tr><td><b>开课班级编号: </b><?php echo $onCourse['onCourseId']; ?></td>
            <td colspan="2"><b>上课班级: </b>
                <?php if(is_array($onCourse['className']) || $onCourse['className'] instanceof \think\Collection || $onCourse['className'] instanceof \think\Paginator): $i = 0; $__LIST__ = $onCourse['className'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?>
                    <?php echo $b['className']; endforeach; endif; else: echo "" ;endif; ?>
            </td></tr>
        <tr><td colspan="2"><b>学年学期: </b> <?php echo $onCourse['term']; ?></td><td><b>任课老师: </b> <?php echo $onCourse['teacherName']; ?></td></tr>
        <tr><td colspan="2"><b>课程编号: </b><?php echo $onCourse['courseId']; ?></td><td><b>课程名称: </b><?php echo $onCourse['courseName']; ?></td></tr>
        <tr><td><b>学时: </b><?php echo $onCourse['classHour']; ?></td><td><b>学分: </b><?php echo $onCourse['credit']; ?></td><td><b>修习类别: </b><?php echo $onCourse['electiveName']; ?></td></tr>
        <tr><td><b>考试方式: </b><?php echo $onCourse['examFormName']; ?></td><td><b>成绩方式: </b><?php echo $onCourse['showFormName']; ?></td><td><b>成绩: </b><?php echo $onCourse['isEntryName']; ?></td></tr>

    </table>
    <form class="layui-form" action="<?php echo url('/doSetOnCourse'); ?>" method="post">
        <input type="hidden" name="onCourseId" value="<?php echo $onCourse['onCourseId']; ?>" >
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">平时成绩</label>
                <div class="layui-inline">
                    <input type="text" name="daily" lay-verify="number|correct" autocomplete="off" value="<?php echo $onCourse['daily']; ?>" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                    class="layui-input">
                </div>%
                <label class="layui-inline"> 期考成绩</label>
                <div class="layui-inline">
                    <input type="text" name="finalGrade" lay-verify="number" autocomplete="off" value="<?php echo $onCourse['finalGrade']; ?>" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                    class="layui-input">
                </div>%
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">实验成绩</label>
                <div class="layui-inline">
                    <input type="text" name="experiment" lay-verify="number" autocomplete="off" value="<?php echo $onCourse['experiment']; ?>" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                    class="layui-input">
                </div>%
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">口试成绩</label>
                <div class="layui-inline">
                    <input type="text" name="oral" lay-verify="number" autocomplete="off" value="<?php echo $onCourse['oral']; ?>" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                    class="layui-input">
                </div>%
                <label class="layui-inline"> 理论成绩</label>
                <div class="layui-inline">
                    <input type="text" name="theory" lay-verify="number" autocomplete="off" value="<?php echo $onCourse['theory']; ?>" min="0" max="100" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                    class="layui-input">
                </div>%
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>>提交</button>
                <button type="button" onclick="history.go(-1)" class="layui-btn layui-btn-primary">后退</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>