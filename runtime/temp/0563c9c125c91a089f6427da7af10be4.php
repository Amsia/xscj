<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wamp64\www\xscj\public/../application/index\view\Admin\changePWD.html";i:1578215020;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <script type="javascript" src="/static/layui/lay/modules/jquery.js"></script>
    <script src="/static/layui/layui.js"></script>
</head>
<script type="text/javascript">
    layui.use('element', function() {
        var element = layui.element;
        element.on('tab(demo)', function(data) {
            console.log(data);
        });
    });
    layui.use(['layer', 'form','jquery'], function(){
        var layer = layui.layer
            ,form = layui.form,$ = layui.$;
        form.verify({
            confirmPass:function (value) {

                var reVal = $("#newPassword").val();
                if (value !== reVal){
                    return '输入的两次密码不一致!';
                }
            }
        });
        // layer.msg('学生成绩管理系统-叶广宇，沈尧');
    });

</script>
<body>
<br>
<form class="layui-form" action="<?php echo url('Admin/doChangePWD'); ?>" method="post">
    <center>
        <input type="hidden" name="role" value="<?php echo session('user.role'); ?>" />
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">账号</label>
                <div class="layui-inline">
                    <input type="text" name="id" required  lay-verify="required" value="<?php echo session('user.account'); ?>" readonly="readonly" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">旧密码</label>
                <div class="layui-inline">
                    <input type="password" name="oldPassword" required  lay-verify="required"  autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">新密码</label>
                <div class="layui-inline">
                    <input type="password" name="newPassword" id="newPassword" required  lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">重复新密码</label>
                <div class="layui-inline">
                    <input type="password"  required  lay-verify="confirmPass" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">更改密码</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                <button type="button" onclick="history.go(-1)" class="layui-btn layui-btn-primary">后退</button>
            </div>
        </div>
    </center>
</form>

</body>
</html>