<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admins.layouts.index');
});
Route::get('/', function () {
    return view('clients.layouts.index');
});
