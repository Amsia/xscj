<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp64\www\xscj\public/../application/index\view\dean\findTeacher.html";i:1578122533;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>教师查找结果</title>
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
    <table class="layui-table" style="width: 80%;margin-left: 10%;">
        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>教师编号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($teacherList) || $teacherList instanceof \think\Collection || $teacherList instanceof \think\Paginator): $i = 0; $__LIST__ = $teacherList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $a['teacherId']; ?></td>
            <td><?php echo $a['teacherName']; ?></td>
            <td><?php echo $a['teacherSex']; ?></td>
            <td><?php echo $a['teacherAge']; ?></td>
            <td>
                <a href="<?php echo url('dean/updateTeacher',['teacherId'=>$a['teacherId']]); ?>">修改  </a>
                <a href="<?php echo url('dean/deleteTeacher',['teacherId'=>$a['teacherId']]); ?>">删除 </a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <a href="<?php echo url('Dean/index'); ?>" style="float: right;margin-right: 10%;">
        <button type="button" class="layui-btn layui-btn-primary">后退</button>
    </a>
</div>
</body>
</html>