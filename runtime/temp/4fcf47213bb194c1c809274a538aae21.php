<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp64\www\xscj\public/../application/index\view\Dean\insertClass.html";i:1578408916;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增班级界面</title>
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
<form class="layui-form" action="<?php echo url('/doInsertClass'); ?>" method="post" style="width: 400px;margin: 20px auto;">
    <div class="layui-form-item">
        <div class="inline">
            <label class="layui-form-label">专业</label>
            <div class="layui-inline">
                <select required lay-verify="required" name="majorId">
                    <?php if(is_array($majorList) || $majorList instanceof \think\Collection || $majorList instanceof \think\Paginator): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $a['majorId']; ?>"><?php echo $a['majorName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">班级编号</label>
            <div class="layui-inline">
                <input type="text" name="classId" required lay-verify="required" placeholder="请输入班级编号" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">班级名</label>
            <div class="layui-inline">
                <input type="text" name="className" required lay-verify="required" placeholder="请输入班级名" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">添加班级</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            <a href="<?php echo url('/findClass'); ?>">
                <button type="button" class="layui-btn layui-btn-primary">后退</button>
            </a>
        </div>
    </div>
</form>
</body>
</html>