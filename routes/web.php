<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/help', function () {
    return "Help on its way";
});

?>
