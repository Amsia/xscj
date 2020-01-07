<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp64\www\xscj\public/../application/index\view\Dean\findClass.html";i:1578409544;}*/ ?>
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
    <form class="layui-form" action="<?php echo url('/findClass'); ?>" method="post"style="width: 650px;margin: 20px auto;">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">专业名</label>
                <div class="layui-inline">
                    <input type="text" name="majorName" placeholder="请输入专业名" autocomplete="off"
                           class="layui-input">
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
            <div class="layui-inline">
                <label class="layui-form-label">班级名</label>
                <div class="layui-inline">
                    <input type="text" name="className" placeholder="请输入班级名" autocomplete="off"
                           class="layui-input">
                </div>
                <label class="layui-inline">班级</label>
                <div class="layui-inline">
                    <select name="classId">
                        <option value="">空</option>
                        <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['classId']; ?>"><?php echo $a['className']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>

            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">查询班级</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    <br>
    <hr>
    <table class="layui-table" style="width:1000px;margin: 10px auto;">
        <colgroup>
            <col width="300">
            <col width="300">
            <col width="300">
            <col width="120">
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
    <a href="<?php echo url('/dean'); ?>" style="float: right;margin-right: 20%;">
        <button type="button" class="layui-btn layui-btn-primary">后退</button>
    </a>
    <a href="<?php echo url('/insertClass'); ?>" class="layui-btn" style="float: right;margin-right: 20px;">添加新的班级</a>
</div>
</body>
</html>