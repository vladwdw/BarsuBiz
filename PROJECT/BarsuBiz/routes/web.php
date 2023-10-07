<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('forms/index');
});
Route::get('/form1',[MainController::class, 'form1']);
Route::get('/form2',[MainController::class, 'form2']);
Route::get('/form3',[MainController::class, 'form3']);
Route::get('/form4',[MainController::class, 'form4']);
Route::get('/form5',[MainController::class, 'form5']);
