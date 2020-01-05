<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp64\www\xscj\public/../application/index\view\dean\updateStudent.html";i:1578228607;}*/ ?>
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
<form class="layui-form" action="<?php echo url('Dean/doUpdateStudent'); ?>" method="post" style="width: 350px;margin:20px auto;">
    <div class="layui-form-item">
        <label class="layui-form-label">学号</label>
        <div class="layui-inline">
            <input type="text" name="studentId" value="<?php echo $student['studentId']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">专业号</label>
<!--        <div class="layui-inline">-->
<!--            <input type="text" name="majorId" value="<?php echo $student['majorId']; ?>" class="layui-input">-->
<!--        </div>-->
        <div class="layui-inline">
            <select name="majorId" value="<?php echo $student['majorId']; ?>">
                <?php if(is_array($majorList) || $majorList instanceof \think\Collection || $majorList instanceof \think\Paginator): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $a['majorId']; ?>" <?php echo $student['majorId']==$a['majorId']?'selected':''; ?>><?php echo $a['majorName']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">班级号</label>
<!--        <div class="layui-inline">-->
<!--            <input type="text" name="classId" value="<?php echo $student['classId']; ?>" class="layui-input">-->
<!--        </div>-->
        <div class="layui-inline">
            <select name="classId" value="<?php echo $student['majorId']; ?>">
                <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $a['classId']; ?>" <?php echo $student['classId']==$a['classId']?'selected':''; ?>><?php echo $a['className']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">学院号</label>
<!--        <div class="layui-inline">-->
<!--            <input type="text" name="collegeId" value="<?php echo $student['collegeId']; ?>" class="layui-input">-->
<!--        </div>-->
        <div class="layui-inline">
            <select name="collegeId" value="<?php echo $student['collegeId']; ?>">
                <?php if(is_array($collegeList) || $collegeList instanceof \think\Collection || $collegeList instanceof \think\Paginator): $i = 0; $__LIST__ = $collegeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $a['collegeId']; ?>" <?php echo $student['collegeId']==$a['collegeId']?'selected':''; ?>><?php echo $a['collegeName']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">学生名</label>
        <div class="layui-inline">
            <input type="text" name="studentName" value="<?php echo $student['studentName']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-inline">
            <input type="text" name="studentAge" value="<?php echo $student['studentAge']; ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-inline">
            <input type="text" name="studentSex" value="<?php echo $student['studentSex']; ?>" class="layui-input">
        </div>
    </div>


    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">提交修改</button>
            <a href="<?php echo url('Dean/findstudent'); ?>">
                <button type="button" class="layui-btn layui-btn-primary">后退</button>
            </a>
        </div>
    </div>
</form>
</body>
</html>