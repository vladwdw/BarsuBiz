<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\FormController1;
use App\Http\Controllers\FormController3;
use App\Http\Controllers\RegisterController;
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
Route::get('/form1',[MainController::class, 'form1'])->name('form1');
Route::get('/form2',[MainController::class, 'form2'])->name('form2');
Route::get('/form3',[MainController::class, 'form3'])->name('form3');
Route::get('/form4',[MainController::class, 'form4'])->name('form4');
Route::get('/form5',[MainController::class, 'form5'])->name('form5');
Route::get('/login',[MainController::class, 'loginPage'])->name('loginPage');
Route::get('/register',[MainController::class, 'registerPage'])->name('registerPage');
Route::post('/submit-form1', [FormController1::class, 'store']);
Route::post('/submit-form3', [FormController3::class, 'store']);
Route::post('/submit-form5', [FormController3::class, 'store']);
Route::post('/submit-register', [RegisterController::class,'register']);