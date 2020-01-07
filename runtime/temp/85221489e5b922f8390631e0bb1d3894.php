<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp64\www\xscj\public/../application/index\view\Dean\findClass.html";i:1578378758;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>班级查询结果</title>
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
<div id="test">
    <table class="layui-table">
        <colgroup>
        </colgroup>
        <thead>
        <tr>
            <th>专业名</th>
            <th>班级编号</th>
            <th>班级名</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $a['majorName']; ?></td>
                <td><?php echo $a['classId']; ?></td>
                <td><?php echo $a['className']; ?></td>
                <td><a href="<?php echo url('/updateClass',['classId'=>$a['classId']]); ?>" class="layui-btn-xs layui-btn">修改 </a>
                    <a href="<?php echo url('/deleteClass',['classId'=>$a['classId']]); ?>" class="layui-btn-xs layui-btn">删除 </a></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <a href="<?php echo url('/dean'); ?>" style="float: right;margin-right: 10%;">
        <button type="button" class="layui-btn layui-btn-primary">后退</button>
    </a>
</div>
</body>
</html>