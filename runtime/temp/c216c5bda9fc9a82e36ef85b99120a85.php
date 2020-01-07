<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp64\www\xscj\public/../application/index\view\Dean\dean.html";i:1578408615;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>教务员管理界面</title>
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
        <li class="layui-this">学生管理</li>
        <li>教师管理</li>
        <li>课程管理</li>
        <li>成绩管理</li>
        <li>班级管理</li>
        <div style="margin-right: 20px;float:right">
            <a class="layui-btn layui-btn-xs" href="<?php echo url('/logout'); ?>">注销账号</a>
        </div>
    </ul>
    <div class="layui-tab-content">
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
                    <td><?php echo $dean['deanName']; ?></td>
                    <td><?php echo $dean['deanAge']; ?></td>
                    <td><?php echo $dean['deanSex']; ?></td>
                    <td><a class="layui-btn layui-btn-xs" href="<?php echo url('/changePwd'); ?>">更改密码</a>
                        <a class="layui-btn layui-btn-xs" href="<?php echo url('/logout'); ?>">注销账号</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- 			查询学生信息------------------------------------------------------ -->
        <div class="layui-tab-item layui-show" >
            <form class="layui-form" action="<?php echo url('/findStudent'); ?>" method="post" style="">
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
            <br>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <a href="<?php echo url('/insertStudent'); ?>" class="layui-btn">添加一名学生</a>
                </div>
            </div>
        </div>


        <div class="layui-tab-item">
            <!-- 			查询教师 ------------------------------------------------------->
            <form class="layui-form" action="<?php echo url('/findTeacher'); ?>" method="post">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">教师编号</label>
                        <div class="layui-inline">
                            <input type="text" name="teacherId" placeholder="请输入教师编号" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">姓名</label>
                        <div class="layui-inline">
                            <input type="text" name="teacherName" placeholder="请输入姓名" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">查询教师</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
            <br>
            <hr>
            <br>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <a href="<?php echo url('/insertTeacher'); ?>" class="layui-btn">添加一名教师</a>
                </div>
            </div>

        </div>
        <div class="layui-tab-item">
            <!-- 		    		课程管理-------------------------------------- -->
            <form class="layui-form" action="<?php echo url('/findOnCourse'); ?>" method="post">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">开课编号</label>
                        <div class="layui-inline">
                            <input type="text" name="onCourseId" placeholder="请输入开课编号" autocomplete="off"
                                   class="layui-input">
                        </div>
                        <label class="layui-inline">教师编号</label>
                        <div class="layui-inline">
                            <input type="text" name="teacherId" placeholder="请输入教师编号" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">考试形式</label>
                        <div class="layui-inline">
                            <select name="examFormId">
                                <option value="">空</option>
                                <?php if(is_array($examFormList) || $examFormList instanceof \think\Collection || $examFormList instanceof \think\Paginator): $i = 0; $__LIST__ = $examFormList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                                     <option value="<?php echo $a['examFormId']; ?>"><?php echo $a['examFormName']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <label class="layui-inline">考试性质</label>
                        <div class="layui-inline">
                            <select name="natureId">
                                <option value="">空</option>
                                <?php if(is_array($examNatureList) || $examNatureList instanceof \think\Collection || $examNatureList instanceof \think\Paginator): $i = 0; $__LIST__ = $examNatureList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                                     <option value="<?php echo $a['natureId']; ?>"><?php echo $a['natureName']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <label class="layui-inline">修习类别</label>
                        <div class="layui-inline">
                            <select name="electiveId">
                                <option value="">空</option>
                                <?php if(is_array($electiveList) || $electiveList instanceof \think\Collection || $electiveList instanceof \think\Paginator): $i = 0; $__LIST__ = $electiveList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $a['electiveId']; ?>"><?php echo $a['electiveName']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">成绩制度</label>
                        <div class="layui-input-inline">
                            <select name="showFormId">
                                <option value="">空</option>
                                <?php if(is_array($showFormList) || $showFormList instanceof \think\Collection || $showFormList instanceof \think\Paginator): $i = 0; $__LIST__ = $showFormList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $a['showFormId']; ?>"><?php echo $a['showFormName']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">课程编号</label>
                        <div class="layui-inline">
                            <input type="text" name="courseId" placeholder="课程编号" autocomplete="off"
                                   class="layui-input">
                        </div>
                        <label class="layui-inline">学期</label>
                        <div class="layui-inline">
                            <input type="text" name="term" placeholder="请输入学期" autocomplete="off"
                                   class="layui-input">
                        </div>
                        <label class="layui-inline">上课教室</label>
                        <div class="layui-inline">
                            <input type="text" name="classroom" placeholder="上课教室" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">查询已开课</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
            <br>
            <hr>
            <!-- 				查询所有课程 -->
            <form class="layui-form" action="<?php echo url('/findCourse'); ?>" method="post">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">课程编号</label>
                        <div class="layui-inline">
                            <input type="text" name="courseId" placeholder="请输入课程编号" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                    <label class="layui-inline">课程名</label>
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
            <br>
            <hr>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <a href="<?php echo url('/insertOnCourse'); ?>" class="layui-btn">开启一门课程</a>
                    <a href="<?php echo url('/insertCourse'); ?>" class="layui-btn">添加一门课程</a>
                </div>
            </div>
        </div>
        <!-- 			成绩管理------------------------------------------- -->
        <div class="layui-tab-item">
            <form class="layui-form" action="<?php echo url('/findClassDetail'); ?>" method="post">
                <div class="layui-form-item">
                    <div class="inline">
                        <label class="layui-form-label">班级</label>
                        <div class="layui-inline">
                            <select name="classId">
<!--                                <option value="">空</option>-->
                                <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $a['classId']; ?>"><?php echo $a['className']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">查询班级成绩信息</button>
                    </div>
                </div>
            </form>


        </div>



        <!-- 			班级管理--------------------------------------------------- -->
        <div class="layui-tab-item">
            <form class="layui-form" action="<?php echo url('/findClass'); ?>" method="post">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">专业名</label>
                        <div class="layui-inline">
                            <input type="text" name="majorName" placeholder="请输入专业名" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="inline">
                        <label class="layui-form-label">专业</label>
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
                        <label class="layui-form-label">班级编号</label>
                        <div class="layui-inline">
                            <input type="text" name="classId" placeholder="请输入班级编号" autocomplete="off"
                                   class="layui-input">
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
            <br>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <a href="<?php echo url('/insertClass'); ?>" class="layui-btn">添加新的班级</a>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>