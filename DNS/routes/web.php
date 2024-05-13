<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/computer', function () {
    return view('computer');
});
