<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wamp64\www\xscj\public/../application/index\view\dean\findCourse.html";i:1578208366;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程查找结果</title>
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
            <col width="100">
            <col width="200">
            <col width="100">
            <col width="100">
            <col width="100">
        </colgroup>
        <thead>
        <tr>
            <th>课程编号</th>
            <th>课程名</th>
            <th>课时</th>
            <th>学分</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $a['courseId']; ?></td>
                <td><?php echo $a['courseName']; ?></td>
                <td><?php echo $a['classHour']; ?></td>
                <td><?php echo $a['credit']; ?></td>
                <td><a href="<?php echo url('dean/updateCourse',['courseId'=>$a['courseId']]); ?>" class="layui-btn layui-btn-xs">修改  </a>
                    <a href="<?php echo url('dean/deleteCourse',['courseId'=>$a['courseId']]); ?>" class="layui-btn layui-btn-xs">删除 </a></td>
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