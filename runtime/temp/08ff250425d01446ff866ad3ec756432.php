<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp64\www\xscj\public/../application/index\view\dean\updateCourse.html";i:1578208393;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改课程</title>
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
<form class="layui-form" action="<?php echo url('dean/doUpdateCourse'); ?>" method="post" style="margin: 20px auto;width: 320px;">
    <div class="layui-form-item">
        <label class="layui-form-label">课程编号</label>
        <div class="layui-input-inline">
            <input type="text" name="courseId" value="<?php echo $course['courseId']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">课程名</label>
        <div class="layui-input-inline">
            <input type="text" name="courseName" value="<?php echo $course['courseName']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">课时</label>
        <div class="layui-input-inline">
            <input type="text" name="classHour" value="<?php echo $course['classHour']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">学分</label>
        <div class="layui-input-inline">
            <input type="text" name="credit" value="<?php echo $course['credit']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-inline">
            <button class="layui-btn" lay-submit lay-filter="formDemo">提交修改</button>
            <a href="<?php echo url('Dean/findCourse'); ?>">
                <button type="button" class="layui-btn layui-btn-primary">后退</button>
            </a>
        </div>
    </div>
</form>

</body>
</html>