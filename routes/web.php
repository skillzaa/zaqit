<?php
Route::Resource('subject','SubjectsController');
Route::Resource('level','LevelsController');
Route::Resource('displayheading','DisplayHeadingController');
Route::Resource('question','QuestionController');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
