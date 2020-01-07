<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp64\www\xscj\public/../application/index\view\Dean\findStudent.html";i:1578405499;}*/ ?>
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
<div id="test">
    <form class="layui-form" action="<?php echo url('/findStudent'); ?>" method="post" style="width: 700px;margin: 20px auto;">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">学号</label>
                <div class="layui-inline">
                    <input type="text" name="studentId" placeholder="请输入学号" autocomplete="off"
                           class="layui-input">
                </div>
                <label class="layui-inline">姓名</label>
                <div class="layui-inline">
                    <input type="text" name="studentName" placeholder="请输入姓名" autocomplete="off"
                           class="layui-input">
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="inline">
                <label class="layui-form-label">班级</label>
                <div class="layui-inline">
                    <select name="classId">
                        <option value="">空</option>
                        <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['classId']; ?>"><?php echo $a['className']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <label class="layui-inline">专业</label>
                <div class="layui-inline">
                    <select name="majorId">
                        <option value="">空</option>
                        <?php if(is_array($majorList) || $majorList instanceof \think\Collection || $majorList instanceof \think\Paginator): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['majorId']; ?>"><?php echo $a['majorName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="layui-form-item">

        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">查询学生</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    <br>
    <hr>
    <table class="layui-table" style="width: 80%;margin-left: 10%;">
        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>专业</th>
            <th>班级</th>
            <th>学院</th>
            <th>年龄</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $a['studentId']; ?></td>
                <td><?php echo $a['studentName']; ?></td>
                <td><?php echo $a['studentSex']; ?></td>
                <td><?php echo $a['majorName']; ?></td>
                <td><?php echo $a['className']; ?></td>
                <td><?php echo $a['collegeName']; ?></td>
                <td><?php echo $a['studentAge']; ?></td>
                <td>
                    <a class="layui-btn-xs layui-btn" href="<?php echo url('/updateStudent',['studentId'=>$a['studentId']]); ?>">修改  </a>
                    <a class="layui-btn-xs layui-btn" href="<?php echo url('/deleteStudent',['studentId'=>$a['studentId']]); ?>">删除 </a>
                </td>
            </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <a href="<?php echo url('/dean'); ?>" style="float: right;margin-right: 10%;">
        <button type="button" class="layui-btn layui-btn-primary" style="float: right;margin-right: 10%;">后退</button>
        <a class="layui-btn" href="<?php echo url('/insertStudent'); ?>" class="layui-btn" style="float: right;margin-right: 10px;">添加一名学生</a>
    </a>
</div>
</body>
</html>