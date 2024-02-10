<?php

use App\Http\Controllers\CustomerContactController;
use App\Http\Controllers\Login;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\XmlController;
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


Route::get ('login', function(){
    return view('login',
    ['siteName' => 'Přihlášení : František']);
})->name('login');

Route::post ('login', [Login::class, 'autenticate'])->name('login.post');
Route::get ('logout', [Login::class, 'logout'])->name('logout');

Route::get('zakazky', [CustomerOrderController::class, 'index'])->middleware('auth')->name('zakazkyList');
Route::post ('zakazky',[CustomerOrderController::class, 'find'])->middleware('auth');

Route::get ('zakazka/new', [CustomerOrderController::class, 'new'])->middleware('auth');
Route::post ('zakazka/new', [CustomerOrderController::class, 'store'])->middleware('auth');

Route::get ('zakazka/detail/{id}', [CustomerOrderController::class, 'detail'])->middleware('auth')->name('zakazkaDetail');
Route::post ('zakazka/upravit_kontakt', [CustomerContactController::class, 'update'])->middleware('auth');

Route::get ('zakazka/xml', [XmlController::class, 'xmlToJson']);
