<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wamp64\www\xscj\public/../application/index\view\Teacher\entry.html";i:1578059279;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>录入界面</title>
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
            ,form = layui.form;
        // layer.msg('学生成绩管理系统-叶广宇，沈尧');
    });
</script>
<script type="text/javascript">
    function sum(x) {
        console.log(x);
        var a = document.getElementById("daily"+x);
        var b = document.getElementById("finalGrade"+x);
        var c = document.getElementById("experiment"+x);
        var d = document.getElementById("theory"+x);
        var e = document.getElementById("oral"+x);
        var s = document.getElementById("sum"+x);

        a = a==null?0:a.value;b = b==null?0:b.value;c = c==null?0:c.value;d = d==null?0:d.value;e = e==null?0:e.value;
        // console.log(a);console.log(b);console.log(c);console.log(d);console.log(e);
        s.value = 0;
        s.value =parseInt(s.value)+ parseInt(a)*0.01*parseInt("<?php echo $onCourse['daily']; ?>");
        s.value =parseInt(s.value)+ parseInt(b)*0.01*parseInt("<?php echo $onCourse['finalGrade']; ?>");
        s.value =parseInt(s.value)+ parseInt(c)*0.01*parseInt("<?php echo $onCourse['experiment']; ?>");
        s.value =parseInt(s.value)+ parseInt(d)*0.01*parseInt("<?php echo $onCourse['theory']; ?>");
        s.value =parseInt(s.value)+ parseInt(e)*0.01*parseInt("<?php echo $onCourse['oral']; ?>");

    }
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
    <form class="layui-form" action="<?php echo url('Teacher/updateAchievementDetail'); ?>" method="post">
        <input type="hidden" name="onCourseId" value="<?php echo $onCourse['onCourseId']; ?>">
        <table class="layui-table">
            <tr>
                <th><b>班级</b></th><th><b>学号</b></th><th><b>姓名</b></th>
                <?php if($onCourse['daily']!=0): ?><th><b>平时成绩<?php echo $onCourse['daily']; ?>%</b></th><?php endif; if($onCourse['finalGrade']!=0): ?><th><b>期考成绩<?php echo $onCourse['finalGrade']; ?>%</b></th><?php endif; if($onCourse['experiment']!=0): ?><th><b>实验成绩<?php echo $onCourse['experiment']; ?>%</b></th><?php endif; if($onCourse['theory']!=0): ?><th><b>理论<?php echo $onCourse['theory']; ?>%</b></th><?php endif; if($onCourse['oral']!=0): ?><th><b>口语<?php echo $onCourse['oral']; ?>%</b></th><?php endif; ?>
                <th><b>总成绩</b></th>
            </tr>

            <?php if(is_array($achievementDetailList) || $achievementDetailList instanceof \think\Collection || $achievementDetailList instanceof \think\Paginator): $i = 0; $__LIST__ = $achievementDetailList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                <input type="hidden" name="studentId[]" value="<?php echo $a['studentId']; ?>">
                <tr>
                    <td><?php echo $a['className']; ?></td><td><?php echo $a['studentId']; ?></td><td><?php echo $a['studentName']; ?></td>
                    <?php if($onCourse['daily']!=0): ?>
                        <td>
                            <input type="text" name="daily[]" id="daily<?php echo $a['studentId']; ?>" onkeyup="sum('<?php echo $a['studentId']; ?>');"  value="<?php echo $a['daily']; ?>" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                            class="layui-input">
                        </td>
                    <?php endif; if($onCourse['finalGrade']!=0): ?>
                        <td>
                            <input type="text" name="finalGrade[]" id="finalGrade<?php echo $a['studentId']; ?>"   onkeyup="sum('<?php echo $a['studentId']; ?>');"  value="<?php echo $a['finalGrade']; ?>" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                            class="layui-input">
                        </td>
                        <?php endif; if($onCourse['experiment']!=0): ?>
                        <td>
                            <input type="text" name="experiment[]" id="experiment<?php echo $a['studentId']; ?>" onkeyup="sum('<?php echo $a['studentId']; ?>');" autocomplete="off" value="<?php echo $a['experiment']; ?>" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                            class="layui-input">
                        </td>
                        <?php endif; if($onCourse['theory']!=0): ?>
                        <td>
                            <input type="text" name="theory[]" id="theory<?php echo $a['studentId']; ?>" onkeyup="sum('<?php echo $a['studentId']; ?>');"  value="<?php echo $a['theory']; ?>" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                            class="layui-input">
                        </td>
                        <?php endif; if($onCourse['oral']!=0): ?>
            <td>
                <input type="text" name="oral[]" id="oral<?php echo $a['studentId']; ?>" onkeyup="sum('<?php echo $a['studentId']; ?>');" autocomplete="off" value="<?php echo $a['oral']; ?>" <?php echo !empty($onCourse['isEntry'])?"disabled='disabled'":""; ?>
                class="layui-input">
            </td>
            <?php endif; ?>
            <td><input type="text" name="s[]" id="sum<?php echo $a['studentId']; ?>" autocomplete="off" readonly="readonly" class="layui-input"></td>
            </tr>
            <script>
                sum('<?php echo $a['studentId']; ?>');
            </script>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
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