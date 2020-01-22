<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/debugbar', function () {
    try {
        throw new Exception('foobar');
      } catch (Exception $e) {
      //  Debugbar::addException($e);
      }
//...................................
$arr = ["a","b","c"];
Debugbar::info($arr);
Debugbar::error('Error!');
Debugbar::warning('Watch out…');
Debugbar::addMessage('Another message', 'mylabel');
//...................................


    return "Debugbar";
});

?>
