<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');    
});

Route::get('pesanan', function () {
    return view('pesanan');
});
 
