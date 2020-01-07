<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp64\www\xscj\public/../application/index\view\Dean\insertOnCourse.html";i:1578407374;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>开启课程</title>
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
        form.verify({
            termVerify: [
                /\d{5}/,'请输入正确的格式如：20192'
            ]
        })
    });
</script>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        var date2 = layui.laydate;
        //执行一个laydate实例
        laydate.render({
            elem: '#date1',
            trigger : 'click',
        });
        date2.render({
            elem: '#date2',
            trigger : 'click',
        });
    });
</script>

<body>
<br>
<form class="layui-form" action="<?php echo url('/doInsertOnCourse'); ?>" method="post">
    <div class="layui-form-item">
        <div class="layui-inline">
            <div class="layui-inline">
                <label class="layui-form-label">开课编号</label>
                <div class="layui-inline">
                    <input type="text" name="onCourseId" required lay-verify="required" placeholder="请输入开课编号" autocomplete="off"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">教师编号</label>
                <div class="layui-inline">
                    <select name="teacherId" required lay-verify="required">
                        <?php if(is_array($teacherList) || $teacherList instanceof \think\Collection || $teacherList instanceof \think\Paginator): $i = 0; $__LIST__ = $teacherList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['teacherId']; ?>"><?php echo $a['teacherId']; ?>:<?php echo $a['teacherName']; ?></option>
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
                <select name="examFormId" required lay-verify="required">
                        <?php if(is_array($examFormList) || $examFormList instanceof \think\Collection || $examFormList instanceof \think\Paginator): $i = 0; $__LIST__ = $examFormList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['examFormId']; ?>"><?php echo $a['examFormName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <label class="layui-inline">考试性质</label>
            <div class="layui-inline">
                <select name="natureId" required lay-verify="required">
                        <?php if(is_array($examNatureList) || $examNatureList instanceof \think\Collection || $examNatureList instanceof \think\Paginator): $i = 0; $__LIST__ = $examNatureList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['natureId']; ?>"><?php echo $a['natureName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <label class="layui-inline">修习类别</label>
            <div class="layui-inline">
                <select name="electiveId" required lay-verify="required">
                        <?php if(is_array($electiveList) || $electiveList instanceof \think\Collection || $electiveList instanceof \think\Paginator): $i = 0; $__LIST__ = $electiveList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $a['electiveId']; ?>"><?php echo $a['electiveName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">成绩制度</label>
        <div class="layui-input-inline">
            <select name="showFormId" required lay-verify="required">
                    <?php if(is_array($showFormList) || $showFormList instanceof \think\Collection || $showFormList instanceof \think\Paginator): $i = 0; $__LIST__ = $showFormList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $a['showFormId']; ?>"><?php echo $a['showFormName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">课程</label>
            <div class="layui-inline">
                <select name="courseId" required lay-verify="required">
                    <?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $a['courseId']; ?>"><?php echo $a['courseName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <label class="layui-inline">学期</label>
            <div class="layui-inline">
                <input type="text" name="term" placeholder="请输入学期" autocomplete="off" required lay-verify="required|termVerify|number"
                       class="layui-input">
            </div>
            <div class="layui-inline layui-word-aux">2019第二学期格式为:20192</div>
            <label class="layui-inline">上课教室</label>
            <div class="layui-inline">
                <input type="text" name="classroom" placeholder="上课教室" autocomplete="off" required lay-verify="required"
                       class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">考试日期</label>
            <div class="layui-inline">
                <input type="text" id="date1" name="examTime" placeholder="请输入考试时间" autocomplete="off" required lay-verify="required"
                       class="layui-input" >
            </div>
            <label class="layui-inline">截至日期</label>
            <div class="layui-inline">
                <input type="text" id="date2" name="deadline" placeholder="请输入截至录入时间" autocomplete="off" required lay-verify="required"
                       class="layui-input" >
            </div>
        </div>
        <div class="layui-inline layui-word-aux">格式为: 2020-01-01</div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">开课</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            <a href="<?php echo url('/findOnCourse'); ?>">
                <button type="button" class="layui-btn layui-btn-primary">后退</button>
            </a>
        </div>
    </div>
</form>
</body>
</html>