<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp64\www\xscj\public/../application/index\view\Dean\updateOnCourse.html";i:1578449614;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改已开课程</title>
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
        form.verify({
            termVerify: [
                /\d{5}/,'请输入正确的格式如：20192'
            ]
        })
        // layer.msg('学生成绩管理系统-叶广宇，沈尧');
    });
</script>
<body>
<form class="layui-form" action="<?php echo url('/doUpdateOnCourse'); ?>" method="post" style="width:1200px ;margin: 20px auto;">
    <div class="layui-form-item">
        <div class="layui-inline">
                <input type="hidden" name="onCourseId" placeholder="请输入开课编号" autocomplete="off"
                       class="layui-input" value="<?php echo $onCourse['onCourseId']; ?>">
            <div class="layui-inline">
                <label class="layui-form-label">教师编号</label>
                <div class="layui-inline">
                    <select name="teacherId" required lay-verify="required">
                        <?php if(is_array($teacherList) || $teacherList instanceof \think\Collection || $teacherList instanceof \think\Paginator): $i = 0; $__LIST__ = $teacherList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['teacherId']; ?>" <?php echo $onCourse['teacherId']==$a['teacherId']?'selected':''; ?>><?php echo $a['teacherId']; ?>:<?php echo $a['teacherName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">考试形式</label>
            <div class="layui-inline">
                <select name="examFormId" value="<?php echo $onCourse['examFormId']; ?>">
                    <?php if(is_array($examFormList) || $examFormList instanceof \think\Collection || $examFormList instanceof \think\Paginator): $i = 0; $__LIST__ = $examFormList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $a['examFormId']; ?>" <?php echo $onCourse['examFormId']==$a['examFormId']?'selected':''; ?>><?php echo $a['examFormName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <label class="layui-inline">考试性质</label>
            <div class="layui-inline">
                <select name="natureId" value="<?php echo $onCourse['natureId']; ?>">
                    <option value="">空</option>
                        <?php if(is_array($examNatureList) || $examNatureList instanceof \think\Collection || $examNatureList instanceof \think\Paginator): $i = 0; $__LIST__ = $examNatureList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['natureId']; ?>" <?php echo $onCourse['natureId']==$a['natureId']?'selected':''; ?>><?php echo $a['natureName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <label class="layui-inline">修习类别</label>
            <div class="layui-inline">
                <select name="electiveId" value="<?php echo $onCourse['electiveId']; ?>">
                    <option value="">空</option>
                        <?php if(is_array($electiveList) || $electiveList instanceof \think\Collection || $electiveList instanceof \think\Paginator): $i = 0; $__LIST__ = $electiveList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['electiveId']; ?>"  <?php echo $onCourse['electiveId']==$a['electiveId']?'selected':''; ?>><?php echo $a['electiveName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">学期</label>
            <div class="layui-inline">
                <input type="text" name="courseId" placeholder="课程编号" autocomplete="off"
                       class="layui-input" value="<?php echo $onCourse['courseId']; ?>">
            </div>
            <label class="layui-inline">学期</label>
            <div class="layui-inline">
                <input type="text" name="term" placeholder="请输入学期" autocomplete="off" required lay-verify="required|termVerify|number"
                       class="layui-input" value="<?php echo $onCourse['term']; ?>">
            </div>
            <label class="layui-inline">上课教室</label>
            <div class="layui-inline">
                <input type="text" name="classroom" placeholder="上课教室" autocomplete="off"
                       class="layui-input" value="<?php echo $onCourse['classroom']; ?>">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">提交修改</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            <a href="<?php echo url('/findOnCourse'); ?>">
                <button type="button" class="layui-btn layui-btn-primary">后退</button>
            </a>
        </div>
    </div>
</form>

</body>
</html>