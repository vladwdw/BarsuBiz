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
use App\Http\Controllers\StoreController3;
use App\Http\Controllers\StoreController4;
use App\Http\Controllers\StoreController5;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Edit;
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
Route::get('/back',[MainController::class, 'back'])->name('back');
Route::post('/submit-form1', [StoreController1::class, 'store']);
Route::post('/submit-form2', [StoreController2::class, 'store']);
Route::post('/submit-form3', [StoreController3::class, 'store']);
Route::post('/submit-form4', [StoreController4::class, 'store']);
Route::post('/submit-form5', [StoreController5::class, 'store']);
Route::post('/form11-update/{name}/{id}',[StoreController1::class, 'form11_update'])->name('form11_update');
Route::post('/form22-update/{name}/{id}',[StoreController2::class, 'form22_update'])->name('form22_update');
Route::post('/form33-update/{name}/{id}',[StoreController3::class, 'form33_update'])->name('form33_update');
Route::post('/form44-update/{name}/{id}',[StoreController4::class, 'form44_update'])->name('form44_update');
Route::post('/form55-update/{name}/{id}',[StoreController5::class, 'form55_update'])->name('form55_update');
Route::post('/form11-delete/{name}/{id}/delete',[StoreController1::class, 'form11_delete'])->name('form11_delete');
});
Route::post('/mark-as-read', [NotificationController::class,'markAsRead']);

Route::get('/css/{filename}', function ($filename) {
    return response()->file(public_path('css/' . $filename));
});
