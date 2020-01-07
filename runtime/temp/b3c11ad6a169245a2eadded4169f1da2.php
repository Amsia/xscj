<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp64\www\xscj\public/../application/index\view\Dean\findOnCourse.html";i:1578378790;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生查找结果</title>
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
    <table class="layui-table" style="width: 1520px;margin-left: 8px;">
        <colgroup>
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="150">
            <col width="150">
            <col width="150">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="200">
        </colgroup>
        <thead>
        <tr>
            <th>开课编号</th>
            <th>考试形式</th>
            <th>考试性质</th>
            <th>任课教师</th>
            <th>课程编号</th>
            <th>成绩制度</th>
            <th>成绩是否录入</th>
            <th>录入截止时间</th>
            <th>考试时间</th>
            <th>修习类别</th>
            <th>学期</th>
            <th>教室</th>
            <th> 操 作 </th>
        </tr>
        </thead>
        <tbody>
            <?php if(is_array($onCourseList) || $onCourseList instanceof \think\Collection || $onCourseList instanceof \think\Paginator): $i = 0; $__LIST__ = $onCourseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $a['onCourseId']; ?></td>
                <td><?php echo $a['examFormName']; ?></td>
                <td><?php echo $a['natureName']; ?></td>
                <td><?php echo $a['teacherName']; ?></td>
                <td><?php echo $a['courseName']; ?></td>
                <td><?php echo $a['showFormName']; ?></td>
                <td><?php echo $a['isEntryName']; ?></td>
                <td><?php echo $a['deadline']; ?></td>
                <td><?php echo $a['examTime']; ?></td>
                <td><?php echo $a['electiveName']; ?></td>
                <td><?php echo $a['term']; ?></td>
                <td><?php echo $a['classroom']; ?></td>
                <td>
                    <a href="<?php echo url('/updateOnCourse',['onCourseId'=>$a['onCourseId']]); ?>" class="layui-btn-xs layui-btn">修改 </a>
                    <a href="<?php echo url('/insertStudentOnCourse',['onCourseId'=>$a['onCourseId']]); ?>" class="layui-btn-xs layui-btn">添加学生</a>
                    <a href="<?php echo url('/deleteOnCourse',['onCourseId'=>$a['onCourseId']]); ?>" class="layui-btn-xs layui-btn">删除</a>
                </td>

            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>

    </table>
    <a href="<?php echo url('/dean'); ?>" style="float: right;margin-right: 10%;">
        <button type="button" class="layui-btn layui-btn-primary">后退</button>
    </a>
</body>
</html>