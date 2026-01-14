<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master');
});
Route::get('/master', function () {
    return view('master');
});
