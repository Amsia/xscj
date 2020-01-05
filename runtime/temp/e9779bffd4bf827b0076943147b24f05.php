<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wamp64\www\xscj\public/../application/index\view\Teacher\teacher.html";i:1578064995;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>教师界面</title>
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
<div class="layui-tab" lay-filter="demo">
    <ul class="layui-tab-title">
        <li >个人信息</li>
        <li class="layui-this">教师成绩管理</li>
        <div style="margin-right: 20px;float:right">
            <a class="layui-btn layui-btn-xs" href="<?php echo url('Admin/logout'); ?>">注销账号</a>
        </div>
    </ul>

    <div class="layui-tab-content" style="width: 80%; padding-left: 10%;">
        <div class="layui-tab-item  ">
            <table class="layui-table">
                <colgroup>
                    <col width="100">
                    <col width="100">
                    <col width="100">
                    <col width="100">
                </colgroup>
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>年龄</th>
                    <th>性别</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $teacher['teacherName']; ?></td>
                    <td><?php echo $teacher['teacherAge']; ?></td>
                    <td><?php echo $teacher['teacherSex']; ?></td>
                    <td><a class="layui-btn layui-btn-xs" href="<?php echo url('Admin/changePwd'); ?>">更改密码</a>
                        <a class="layui-btn layui-btn-xs" href="<?php echo url('Admin/logout'); ?>">注销账号</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- 			查询学生信息------------------------------------------------------ -->
        <div class="layui-tab-item layui-show" >
            <center>
                <table class="layui-table">
                    <colgroup>
                        <col width="100">
                        <col width="100">
                        <col width="100">
                        <col width="150">
                        <col width="100">
                        <col width="200">
                        <col width="100">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>开课编号</th>
                        <th>考试性质</th>
                        <th>课程号</th>
                        <th>课程名</th>
                        <th>修习类别</th>
                        <th>上课班级</th>
                        <th>成绩</th>
                        <th>管理</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(is_array($onCourseList) || $onCourseList instanceof \think\Collection || $onCourseList instanceof \think\Paginator): $i = 0; $__LIST__ = $onCourseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $a['onCourseId']; ?></td>
                        <td><?php echo $a['natureName']; ?></td>
                        <td><?php echo $a['courseId']; ?></td>
                        <td><?php echo $a['courseName']; ?></td>
                        <td><?php echo $a['electiveName']; ?></td>
                        <td>
                            <?php if(is_array($a['className']) || $a['className'] instanceof \think\Collection || $a['className'] instanceof \think\Paginator): $i = 0; $__LIST__ = $a['className'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?>
                                 <?php echo $b['className']; endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                        <td><?php echo $a['isEntryName']; ?></td>

                        <td>
                            <!-- 								对OnCourse表的更新 -->
                            <a href="<?php echo url('teacher/setOnCourse',['onCourseId'=>$a['onCourseId']]); ?>"  class="layui-btn layui-btn-xs">设置占比</a>
                            <!-- 								    对achievementDetail更新检验 合值 -->
                            <a href="<?php echo url('teacher/entry',['onCourseId'=>$a['onCourseId']]); ?>" class="layui-btn layui-btn-xs">录入成绩</a>
                            <!-- 									修改isEntry并插入achiment; -->
                            <a href="<?php echo url('teacher/doEntry',['onCourseId'=>$a['onCourseId']]); ?>" class="layui-btn layui-btn-xs">提交结果</a></td>

                        </td>

                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </center>
        </div>
    </div>
</div>
</div>
</body>
</html>