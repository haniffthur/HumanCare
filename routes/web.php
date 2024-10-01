<?php

use App\Http\Controllers\User;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Catatan;
use App\Http\Controllers\Profile;
use App\Http\Controllers\IsiCatatans;
use App\Http\Controllers\ResetPasswordController;
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
    return view('welcome');
});
Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login/proses', [Login::class, 'proses']);
Route::get('/logout', [Login::class, 'logout'])->name('logout');
Route::get('/auth/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/auth/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/auth/register', [Register::class, 'showRegistrationForm'])->name('register.request');
Route::post('/catatan/save', [Catatan::class,'save']);
Route::post('/auth/register', [Register::class, 'Register'])->name('Register');
Route::delete('/catatan/delete/{id}',[Catatan::class,'delete'])->name('catatan.delete');
Route::put('/catatan/update/{id}',[Catatan::class,'update'])->name('catatan.update');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/catatan', [Catatan::class, 'formCatatan'])->name('catatan');
    Route::get('/profile',[Profile::class,'formProfile'])->name('profile');
    Route::get('/isiCatatan/{id}',[IsiCatatans::class,'isiCatatan'])->name('isiCatatan');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:user']], function () {
        Route::resource('user', Dashboard::class);
    });
});
