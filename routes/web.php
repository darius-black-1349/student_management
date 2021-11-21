<?php

use App\Http\Controllers\Admin\AdminController;
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
})->name('welcome');

Auth::routes();


//Admin Routes

Route::prefix('admin')->namespace('Admin')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');


    // students Routes

    Route::prefix('students')->group(function(){


    });


    // courses Routes

    Route::prefix('courses')->group(function(){


    });

});
