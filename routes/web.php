<?php
Route::group(['middleware' => 'CheckAdmin'],
function()
{
Route::Resource('subject','SubjectsController');
Route::Resource('level','LevelsController');
Route::Resource('displayheading','DisplayHeadingController');
Route::Resource('paper','PaperController');
Route::post('paper/addItem','PaperController@addItem');
Route::get('paper/deleteItem/{paperId}/{itemId}','PaperController@deleteItem');
Route::Resource('question','QuestionController');
Route::Resource('student','UserController');
Route::post('question/tripplePost','QuestionController@tripplePost');
Route::get('student/query/{param}','UserController@query');
Route::post('/question/query','QuestionController@query');
});

Route::Resource('teacher','Teacher');
//Route::get('factory','UserController@factory');
Route::get('/test/{id}','Test@show');
Route::post('/test/check','Test@check');

Auth::routes();
Route::get('/', 'HomeController@index');
