<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['role'=>'Api\RoleController']);
Route::apiResources(['user'=>'Api\UserController']);
Route::get('getRole','Api\UserController@getRole');
Route::apiResources(['grade'=>'Api\GradeController']);
Route::apiResources(['section'=>'Api\SectionController']);
Route::get('getGrade','Api\SectionController@getGrade');
Route::apiResources(['student'=>'Api\StudentController']);
Route::get('getGrade','Api\StudentController@getGrade');
Route::get('getSection','Api\StudentController@getSection');
Route::apiResources(['student'=>'Api\StudentController']);
Route::get('getRoles','Api\StudentController@getRole');
Route::apiResources(['attendance'=>'Api\StudentAttendanceController']);
Route::get('getGrades','Api\StudentAttendanceController@getGrades');
Route::get('getSections','Api\StudentAttendanceController@getSections');

Route::get('getStudents','API\StudentAttendanceController@getStudents');
Route::apiResources(['exam'=>'Api\ExamController']);
Route::get('marksgrade','Api\MarksController@getGrades');
Route::get('markssection','Api\MarksController@getSections');

Route::get('marksstudents','API\StudentAttendanceController@getStudents');

Route::get('getGradeSubject','Api\GradeSubjectController@getGrade');
Route::apiResources(['gradesubject'=>'Api\GradeSubjectController']);

// Route::post("addmore","Api\GradeSubjectController@addMorePost")->name('addmore');

Route::get('getteacherRoles','Api\TeacherController@getRole');
Route::apiResources(['teacher'=>'Api\TeacherController']);


