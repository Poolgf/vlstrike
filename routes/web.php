<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rangosValorant', function () {
    return view('rangosValorant');
});

Route::get('/rangosLOL', function () {
    return view('rangosLOL');
});

Route::get('/login', function () {
    return view('login');
});
