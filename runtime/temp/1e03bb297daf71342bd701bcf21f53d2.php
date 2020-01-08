<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp64\www\xscj\public/../application/index\view\Dean\insertCourse.html";i:1578450237;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加科目</title>
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
<br>
<form class="layui-form" action="<?php echo url('/doInsertCourse'); ?>" method="post" style="width: 320px;margin:20px auto;">
<!--    <div class="layui-form-item">-->
<!--        <label class="layui-form-label">课程编号</label>-->
<!--        <div class="layui-input-inline">-->
<!--            <input type="text" name="courseId" required  lay-verify="required" placeholder="请输入课程编号" autocomplete="off"-->
<!--                   class="layui-input">-->
<!--        </div>-->
<!--    </div>-->
    <div class="layui-form-item">
        <label class="layui-form-label">课程名</label>
        <div class="layui-input-inline">
            <input type="text" name="courseName" required  lay-verify="required" placeholder="请输入课程名" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">学时</label>
        <div class="layui-input-inline">
            <input type="text" name="classHour" required  lay-verify="required" placeholder="请输入学时" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">学分</label>
        <div class="layui-input-inline">
            <input type="text" name="credit" required  lay-verify="required" placeholder="请输入学分" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="">
            <button class="layui-btn" lay-submit lay-filter="formDemo">插入新的课程</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            <a href="<?php echo url('/findCourse'); ?>">
                <button type="button" class="layui-btn layui-btn-primary">后退</button>
            </a>
        </div>
    </div>
</form>
</body>
</html>