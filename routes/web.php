<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\ZakazkyController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

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
})->middleware('auth');

Route::get ('zakazka/new', function(){
    return view('zakazka_new',
    ['siteName' => 'Nová zakázka : František']);
})->middleware('auth');

Route::get ('login', function(){
    return view('login',
    ['siteName' => 'Přihlášení : František']);
})->name('login');

Route::post ('login', [Login::class, 'autenticate'])->name('login.post');
Route::get ('logout', [Login::class, 'logout'])->name('logout');

Route::get('zakazky', [ZakazkyController::class, 'index']);

Route::get('users', function(){
    return response::json([

    ]);
});

