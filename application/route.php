<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;


Route::rule('/','index/Index/index');
Route::rule('student','index/Student/index');
Route::rule('teacher','index/Teacher/index');
Route::rule('dean','index/Dean/index');
Route::rule('login','index/Admin/login');
Route::rule('logout','index/Admin/logout');
Route::rule('changePWD','Admin/changePWD');
Route::rule('doChangePWD','Admin/doChangePWD');
Route::rule('setOnCourse','index/Teacher/setOnCourse');
Route::rule('doSetOnCourse','index/Teacher/doSetOnCourse');
Route::rule('entry','index/Teacher/entry');
Route::rule('doEntry','index/Teacher/doEntry');
Route::rule('updateAchievementDetail','index/Teacher/updateAchievementDetail');

Route::rule('findStudent','index/Dean/findStudent');
Route::rule('findTeacher','index/Dean/findTeacher');
Route::rule('findOnCourse','index/Dean/findOnCourse');
Route::rule('findCourse','index/Dean/findCourse');
Route::rule('findClassDetail','index/Dean/findClassDetail');
Route::rule('findClass','index/Dean/findClass');

Route::rule('insertStudent','index/Dean/insertStudent');
Route::rule('insertTeacher','index/Dean/insertTeacher');
Route::rule('insertStudentOnCourse','index/Dean/insertStudentOnCourse');
Route::rule('insertOnCourse','index/Dean/insertOnCourse');
Route::rule('insertCourse','index/Dean/insertCourse');
Route::rule('insertClass','index/Dean/insertClass');

Route::rule('doInsertStudent','index/Dean/doInsertStudent');
Route::rule('doInsertTeacher','index/Dean/doInsertTeacher');
Route::rule('doInsertStudentOnCourse','index/Dean/doInsertStudentOnCourse');
Route::rule('doInsertCourse','index/Dean/doInsertCourse');
Route::rule('doInsertOnCourse','index/Dean/doInsertOnCourse');
Route::rule('doInsertClass','index/Dean/doInsertClass');

Route::rule('updateStudent','index/Dean/updateStudent');
Route::rule('updateTeacher','index/Dean/updateTeacher');
Route::rule('updateOnCourse','index/Dean/updateOnCourse');
Route::rule('updateCourse','index/Dean/updateCourse');
Route::rule('updateClass','index/Dean/updateClass');

Route::rule('doUpdateStudent','index/Dean/doUpdateStudent');
Route::rule('doUpdateTeacher','index/Dean/doUpdateTeacher');
Route::rule('doUpdateOnCourse','index/Dean/doUpdateOnCourse');
Route::rule('doUpdateCourse','index/Dean/doUpdateCourse');
Route::rule('doUpdateClass','index/Dean/doUpdateClass');

Route::rule('deleteStudent','index/Dean/deleteStudent');
Route::rule('deleteTeacher','index/Dean/deleteTeacher');
Route::rule('deleteOnCourse','index/Dean/deleteOnCourse');
Route::rule('deleteStudentOnCourse','index/Dean/deleteStudentOnCourse');
Route::rule('deleteCourse','index/Dean/deleteCourse');
Route::rule('deleteClass','index/Dean/deleteClass');
