<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wamp64\www\xscj\public/../application/index\view\Student\student.html";i:1578214871;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>学生成绩界面</title>
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
        <li class="layui-this">我的课程成绩</li>
        <div style="margin-right: 20px;float:right">
            <a class="layui-btn layui-btn-xs" href="<?php echo url('Admin/logout'); ?>">注销账号</a>
        </div>
    </ul>

    <div class="layui-tab-content" style="width: 80%; padding-left: 10%;">
        <div class="layui-tab-item  ">
            <table class="layui-table">
                <colgroup>
                    <col width="200">
                    <col width="150">
                    <col width="100">
                    <col width="100">
                    <col width="150">
                    <col width="150">
                    <col width="200">
                </colgroup>
                <thead>
                <tr>
                    <th>学号</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>专业</th>
                    <th>班级</th>
                    <th>学院</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $student["studentId"]; ?></td>
                    <td><?php echo $student['studentName']; ?></td>
                    <td><?php echo $student['studentSex']; ?></td>
                    <td><?php echo $student['studentAge']; ?></td>
                    <td><?php echo $student['majorName']; ?></td>
                    <td ><?php echo $student['className']; ?></td>
                    <td><?php echo $student['collegeName']; ?></td>

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

                    </colgroup>
                    <thead>
                    <tr>
                        <td>学期</td>
                        <td>课程号</td>
                        <td>课程名称</td>
                        <td>学时</td>
                        <td>学分</td>
                        <td>修习类别</td>
                        <td>考试性质</td>
                        <td>考试状态</td>
                        <td>成绩</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $a['term']; ?></td>
                        <td><?php echo $a['courseId']; ?></td>
                        <td><?php echo $a['courseName']; ?></td>
                        <td><?php echo $a['classHour']; ?></td>
                        <td><?php echo $a['credit']; ?></td>
                        <td><?php echo $a['electiveName']; ?></td>
                        <td><?php echo $a['examFormName']; ?></td>
                        <td><?php echo $a['natureName']; ?></td>
                        <td><?php echo $a['achievement']; ?></td>

                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <p><?php echo $list->render(); ?></p>
            </center>
        </div>
    </div>
</div>
</div>
</body>
</html>