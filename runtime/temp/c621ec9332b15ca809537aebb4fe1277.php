<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\wamp64\www\xscj\public/../application/index\view\dean\insertStudentOnCourse.html";i:1578206624;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>已开课程添加学生</title>
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
<Script Language="JavaScript">
    function insert()
    {
        document.form1.action="<?php echo url('doInsertStudentOnCourse'); ?>";
        document.form1.submit();
    }
    function delete()
    {
        document.form1.action="<?php echo url('deleteStudentOnCourse'); ?>";
        document.form1.submit();
    }
</Script>
<body>
<br>
<form name="form1" class="layui-form" action="" method="post" style="width: 300px;margin: 20px auto;">
    <input type="hidden" name="role" value="class1">
    <input type="hidden" name="onCourseId" value="<?php echo $onCourseId; ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">班级</label>
        <div class="layui-inline">
            <select name="id" lay-verify="required">
                    <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $a['classId']; ?>" ><?php echo $a['className']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <div class="layui-inline">
                <input type="button" name="insert" value="导入班级" class="layui-btn" onClick="form1.action='<?php echo url("doInsertStudentOnCourse"); ?>';form1.submit();">
                <input type="button" name="delete" value="删除班级" class="layui-btn" onClick="form1.action='<?php echo url("deleteStudentOnCourse"); ?>';form1.submit();">
            </div>
        </div>
    </div>
</form>
<br><hr>
<form class="layui-form" name="form2" action="" method="post" style="width: 300px;margin: 20px auto;">
    <input type="hidden" name="role" value="student">
    <input type="hidden" name="onCourseId" value="<?php echo $onCourseId; ?>">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">学生编号</label>
            <div class="layui-inline">
                <input type="text" name="id" placeholder="请输入学生编号" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <div class="layui-inline">
                <input type="button" name="insert" value="导入学生" class="layui-btn" onClick="form2.action='<?php echo url("doInsertStudentOnCourse"); ?>';form2.submit();">
                <input type="button" name="delete" value="删除学生" class="layui-btn" onClick="form2.action='<?php echo url("deleteStudentOnCourse"); ?>';form2.submit();">
                <a href="<?php echo url('Dean/findoncourse'); ?>">
                    <button type="button" class="layui-btn layui-btn-primary" >后退</button>
                </a>
            </div>
        </div>
    </div>
</form>
<br>
<hr>
<table class="layui-table">
    <colgroup>

    </colgroup>
    <thead>
    <tr>
        <th>开课编号</th>
        <th>学号</th>
        <th>专业</th>
        <th>班级</th>
        <th>学院</th>
        <th>姓名</th>
        <th>年龄</th>
        <th>性别</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($AchievementDetail) || $AchievementDetail instanceof \think\Collection || $AchievementDetail instanceof \think\Paginator): $i = 0; $__LIST__ = $AchievementDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $a['onCourseId']; ?></td>
            <td><?php echo $a['studentId']; ?></td>
            <td><?php echo $a['majorId']; ?></td>
            <td><?php echo $a['className']; ?></td>
            <td><?php echo $a['collegeId']; ?></td>
            <td><?php echo $a['studentName']; ?></td>
            <td><?php echo $a['studentAge']; ?></td>
            <td><?php echo $a['studentSex']; ?></td>
        </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</body>
</html>