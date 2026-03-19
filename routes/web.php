<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Show portfolio on the homepage
Route::get('/', function () {
    return view('auth.login');
});