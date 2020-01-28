<?php
Route::Resource('subject','SubjectsController');
Route::Resource('level','LevelsController');
Route::Resource('displayheading','DisplayHeadingController');
Route::Resource('question','QuestionController');
Route::Resource('student','UserController');

Route::post('question/tripplePost','QuestionController@tripplePost');

Route::get('/student/enabled/{param}','UserController@enabled');
Route::post('/question/query','QuestionController@query');


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
