<?php

Route::get('/admin/test', 'TestController@test');

//Admin Routes
Route::resource('/admin/degree', 'DegreeController');
Route::resource('/admin/department', 'DepartmentController');
Route::post('/admin/department/search', 'DepartmentController@search');
Route::resource('/admin/subject', 'SubjectController');
Route::post('/admin/subject/search', 'SubjectController@search');
Route::resource('/admin/department_subject', 'DepartmentSubjectController');
Route::get('/admin/department_subject/single_department/{department}', 'DepartmentSubjectController@single_department');

//Frontend Routes
Route::get('/', 'FrontendLayoutController@index');
Route::get('/academic', 'FrontendLayoutController@degree_program');


//Student Routes

