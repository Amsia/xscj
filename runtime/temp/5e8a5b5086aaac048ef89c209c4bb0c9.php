<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp64\www\xscj\public/../application/index\view\dean\updateTeacher.html";i:1578122256;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改学生信息</title>
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
<body>
<form class="layui-form" action="<?php echo url('Dean/doUpdateTeacher'); ?>" method="post" style="width: 320px;margin: 0 auto;">
    <div class="layui-form-item">
        <label class="layui-form-label">教师编号</label>
        <div class="layui-input-inline">
            <input type="text" name="teacherId" value="<?php echo $teacher['teacherId']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">教师名</label>
        <div class="layui-input-inline">
            <input type="text" name="teacherName" value="<?php echo $teacher['teacherName']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-inline">
            <input type="text" name="teacherAge" value="<?php echo $teacher['teacherAge']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-inline">
            <input type="text" name="teacherSex" value="<?php echo $teacher['teacherSex']; ?>" class="layui-input">
        </div>
    </div>


    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">提交修改</button>
        </div>
    </div>
</form>

</body>
</html>