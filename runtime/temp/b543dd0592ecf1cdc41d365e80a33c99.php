<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp64\www\xscj\public/../application/index\view\Dean\insertStudent.html";i:1578376820;}*/ ?>
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
<form class="layui-form" action="<?php echo url('Dean/doInsertStudent'); ?>" method="post" style="width: 400px; margin: 0 auto;">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">学号</label>
            <div class="layui-inline">
                <input type="text" name="studentId" required  lay-verify="required" placeholder="请输入学号" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">姓名</label>
            <div class="layui-inline">
                <input type="text" name="studentName" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">年龄</label>
            <div class="layui-inline">
                <input type="text" name="studentAge" required  lay-verify="required" placeholder="请输入年龄" autocomplete="off"
                       class="layui-input">
            </div>
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
        <div class="layui-inline">
            <label class="layui-form-label">班级</label>
            <div class="layui-inline">
                <select name="classId" lay-verify="required">
                    <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['classId']; ?>"><?php echo $a['className']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">专业</label>
            <div class="layui-inline">
                <select name="majorId" lay-verify="required">
                    <?php if(is_array($majorList) || $majorList instanceof \think\Collection || $majorList instanceof \think\Paginator): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['majorId']; ?>"><?php echo $a['majorName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">学院</label>
            <div class="layui-inline">
                <select name="collegeId" lay-verify="required">
                    <?php if(is_array($collegeList) || $collegeList instanceof \think\Collection || $collegeList instanceof \think\Paginator): $i = 0; $__LIST__ = $collegeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['collegeId']; ?>"><?php echo $a['collegeName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">插入学生</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
<!--            <button type="button" onclick="history.go(-1)" class="layui-btn layui-btn-primary">后退</button>-->
            <a href="<?php echo url('/dean'); ?>">
                <button type="button" class="layui-btn layui-btn-primary">后退</button>
            </a>
        </div>
    </div>
</form>
</body>
</html>