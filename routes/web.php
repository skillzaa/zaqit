<?php
Route::Resource('subject','SubjectsController');
Route::Resource('level','LevelsController');
Route::Resource('displayheading','DisplayHeadingController');
Route::Resource('question','QuestionController');
Route::Resource('paper','PaperController');
Route::Resource('student','UserController');

Route::post('question/tripplePost','QuestionController@tripplePost');
Route::post('paper/addItem','PaperController@addItem');
Route::get('paper/deleteItem/{paperId}/{itemId}','PaperController@deleteItem');

Route::get('/student/enabled/{param}','UserController@enabled');
Route::post('/question/query','QuestionController@query');


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
