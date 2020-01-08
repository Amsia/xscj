<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wamp64\www\xscj\public/../application/index\view\Dean\findCourse.html";i:1578450080;}*/ ?>
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
    <form class="layui-form" action="<?php echo url('/findCourse'); ?>" method="post" style="width: 600px;margin: 20px auto;">
        <div class="layui-form-item">
            <div class="layui-inline">
<!--                <label class="layui-form-label">课程编号</label>-->
<!--                <div class="layui-inline">-->
<!--                    <input type="text" name="courseId" placeholder="请输入课程编号" autocomplete="off"-->
<!--                           class="layui-input">-->
<!--                </div>-->
            </div>
            <label class="layui-form-label">课程名</label>
            <div class="layui-inline">
                <input type="text" name="courseName" placeholder="请输入课程名" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">查询课程</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    <br><hr>
    <table class="layui-table" style="width: 80%;margin-left: 10%;">
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
                <td><a href="<?php echo url('/updateCourse',['courseId'=>$a['courseId']]); ?>" class="layui-btn layui-btn-xs">修改  </a>
                    <a href="<?php echo url('/deleteCourse',['courseId'=>$a['courseId']]); ?>" class="layui-btn layui-btn-xs">删除 </a></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

    <a href="<?php echo url('/dean'); ?>" style="float: right;margin-right: 10%;">
        <button type="button" class="layui-btn layui-btn-primary">后退</button>
    </a>
    <a href="<?php echo url('/insertCourse'); ?>" class="layui-btn" style="float: right;margin-right:20px;">添加一门课程</a>
</div>
</body>
</html>