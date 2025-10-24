<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () { // when user visits the root URL welcome page
    return view('home');
});
