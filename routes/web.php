<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome',
['siteName' => 'HomePage : František']);
});

Route::get ('zakazka/new', function(){
    return view('zakazka_new',
    ['siteName' => 'Nová zakázka : František']);
});

