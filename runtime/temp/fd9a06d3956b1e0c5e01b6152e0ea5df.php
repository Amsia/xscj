<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp64\www\xscj\public/../application/index\view\dean\findClassDetail.html";i:1578211959;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查询班级成绩</title>
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
    <table class="layui-table" style="width: 80%;margin-left: 10%;margin-top: 20px;">
        <colgroup>

        </colgroup>
        <thead>
        <tr>
            <th>开课编号</th>
            <th>课程名</th>
            <th>平均分</th>
            <th>总人数</th>
            <th>不合格人数</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($totalSumsList) || $totalSumsList instanceof \think\Collection || $totalSumsList instanceof \think\Paginator): $i = 0; $__LIST__ = $totalSumsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $a['onCourseId']; ?></td>
                <td><?php echo $a['courseName']; ?></td>
                <td><?php echo $a['avgGrade']; ?></td>
                <td><?php echo $a['sum']; ?></td>
                <td><?php echo $a['failSum']; ?></td>
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