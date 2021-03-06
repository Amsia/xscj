<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\wamp64\www\xscj\public/../application/index\view\test.html";i:1578458945;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui.form小例子</title>
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
    });
</script>
<body>
<form  class="layui-form" method="post" action="">



    <div class="layui-form-item" >
        <label class="layui-form-label">上传excel</label>
        <div class="layui-input-inline">
            <div class="layui-upload">
                <button type="button" name="myfile" class="layui-btn" id="myfile"><i class="layui-icon"></i>上传文件</button>
            </div>
        </div>
    </div>

    <div class="layui-form-item" style="padding-left: 35%;">
        <div class="layui-input-inline"  >
            <button class="layui-btn" lay-submit lay-filter="formsub">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>

</form>


<script type="text/javascript">
    layui.use(['form','upload'],function(){

        var form=layui.form;
        var upload=layui.upload;

        upload.render({ //允许上传的文件后缀
            elem: '#myfile'
            ,url: "<?php echo url('sale/do_upload'); ?>"
            ,accept: 'file' //普通文件
            ,exts: 'xls|excel|xlsx' //只允许上传压缩文件
            ,done: function(res){
                if(res.code==1){
                    layer.msg('上传成功,已解析数据',{icon:6});
                }else{
                    layer.msg('解析失败',{icon:5});
                }
            }
        });

        form.on('submit(formsub)',function(data){
            layer.msg('导入数据具体详情未协商确认,待确认后处理');
            return false;
        })


    })

</script>
</body>
</html>