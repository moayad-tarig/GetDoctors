<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::resource('/getdoctor', 'App\Http\Controllers\GetDoctors');
Auth::routes();



Route::group(['middleware' => ['auth', 'role:doctor']], function ()
{
    Route::get('/home', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor');
    Route::get('/home/requests', [App\Http\Controllers\DoctorController::class, 'request'])->name('request');
    Route::put('/doctor/update', [App\Http\Controllers\DoctorController::class, 'update'])->name('update');
    Route::post('/doctor/accept', [App\Http\Controllers\DoctorController::class, 'accept'])->name('accept');
    Route::get('/doctor/accepted', [App\Http\Controllers\DoctorController::class, 'accepted'])->name('accepted');
    
});

