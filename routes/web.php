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

Auth::routes();
Route::resource('/getdoctor', 'App\Http\Controllers\GetDoctors');



Route::group(['middleware' => ['auth', 'role:doctor']], function ()
{
    Route::get('/home', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor');
    Route::get('/home/requests', [App\Http\Controllers\DoctorController::class, 'request'])->name('request');
    Route::put('/doctor/update', [App\Http\Controllers\DoctorController::class, 'update'])->name('update');
    Route::post('/doctor/accept', [App\Http\Controllers\DoctorController::class, 'accept'])->name('accept');
    Route::get('/doctor/accepted', [App\Http\Controllers\DoctorController::class, 'accepted'])->name('accepted');
    
});


Route::group(['middleware' => ['auth', 'role:admin']], function (){
    Route::get('/home', [App\Http\Controllers\adminController::class, 'index'])->name('doctor');
    Route::resource('/home/delete', 'App\Http\Controllers\adminController');
    Route::resource('/home/register', 'App\Http\Controllers\adminController');
    Route::get('/home/requests', [App\Http\Controllers\adminController::class, 'request'])->name('request');
});

