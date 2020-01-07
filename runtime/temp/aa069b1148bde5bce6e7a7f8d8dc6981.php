<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp64\www\xscj\public/../application/index\view\Dean\insertTeacher.html";i:1578406527;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增学生界面</title>
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
            ,form = layui.form,$ = layui.$;
        // layer.msg('学生成绩管理系统-叶广宇，沈尧');

    });
</script>
<body>
<br>
    <form class="layui-form" action="<?php echo url('/doInsertTeacher'); ?>" method="post" style="width: 400px;margin: 0 auto;">
    <div class="layui-form-item">
        <label class="layui-form-label">教师编号</label>
        <div class="layui-input-inline">
            <input type="text" name="teacherId" required  lay-verify="required" placeholder="请输入教师编号号" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-inline">
            <input type="text" name="teacherName" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-inline">
            <input type="text" name="teacherAge" required  lay-verify="required" placeholder="请输入年龄" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">性别</label>
                <div class="layui-inline">
                    <select name="studentSex" lay-verify="required">
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </div>
            </div>
        </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">插入</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            <a href="<?php echo url('/findTeacher'); ?>">
                <button type="button" class="layui-btn layui-btn-primary">后退</button>
            </a>
        </div>
    </div>
</form>
</body>
</html>