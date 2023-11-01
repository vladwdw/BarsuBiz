<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\FormController1;
use App\Http\Controllers\FormController2;
use App\Http\Controllers\FormController3;
use App\Http\Controllers\FormController4;
use App\Http\Controllers\FormController5;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StoreController1;
use App\Http\Controllers\StoreController2;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
})->name('home');
Route::post('/submit-word/{name}/{id}',[MainController::class, 'form_word'])->name('form_word');
Route::get('/submit-pdf/{name}/{id}',[MainController::class, 'form_pdf'])->name('form_pdf');

Route::get('/login',[MainController::class, 'login'])->name('login');
Route::get('/register',[MainController::class, 'registerPage'])->name('registerPage');
Route::post('/submit-register', [RegisterController::class,'register']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
Route::get('/cabinet',[MainController::class, 'cabinet'])->name('cabinet');
Route::get('/form1',[MainController::class, 'form1'])->name('form1');
Route::get('/form11/{name}/{id}',[MainController::class, 'form11'])->name('form11');
Route::get('/form2',[MainController::class, 'form2'])->name('form2');
Route::get('/form3',[MainController::class, 'form3'])->name('form3');
Route::get('/form4',[MainController::class, 'form4'])->name('form4');
Route::get('/form5',[MainController::class, 'form5'])->name('form5');
Route::post('/submit-form1', [StoreController1::class, 'store']);
Route::post('/submit-form2', [StoreController2::class, 'store']);
Route::post('/submit-form3', [FormController3::class, 'store']);
Route::post('/submit-form4', [FormController4::class, 'store']);
Route::post('/submit-form5', [FormController5::class, 'store']);
Route::post('/form11/{name}/{id}',[StoreController1::class, 'form11_update'])->name('form11_update');
Route::post('/form11/{name}/{id}/delete',[StoreController1::class, 'form11_delete'])->name('form11_delete');
});
Route::get('/css/{filename}', function ($filename) {
    return response()->file(public_path('css/' . $filename));
});
