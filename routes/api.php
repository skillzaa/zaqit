<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
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
