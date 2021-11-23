<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Permission\PermissionController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\User\UserController;
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

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');


    //users Routes



    Route::prefix('users')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::get('/show/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        Route::get('/status/{user}', [UserController::class, 'status'])->name('admin.users.status');
    });



    //Permissions Routes

    Route::prefix('permissions')->group(function () {

        Route::get('/', [PermissionController::class, 'index'])->name('admin.permissions.index');
        Route::get('/create', [PermissionController::class, 'create'])->name('admin.permissions.create');
        Route::get('/show/{permission}', [PermissionController::class, 'show'])->name('admin.permissions.show');
        Route::post('/store', [PermissionController::class, 'store'])->name('admin.permissions.store');
        Route::get('/edit/{permission}', [PermissionController::class, 'edit'])->name('admin.permissions.edit');
        Route::put('/update/{permission}', [PermissionController::class, 'update'])->name('admin.permissions.update');
        Route::delete('/destroy/{permission}', [PermissionController::class, 'destroy'])->name('admin.permissions.destroy');
    });


    //Roles Routes

    Route::prefix('roles')->group(function () {

        Route::get('/', [RoleController::class, 'index'])->name('admin.roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('admin.roles.create');
        Route::get('/show/{role}', [RoleController::class, 'show'])->name('admin.roles.show');
        Route::post('/store', [RoleController::class, 'store'])->name('admin.roles.store');
        Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('admin.roles.edit');
        Route::put('/update/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
        Route::delete('/destroy/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
    });




    // students Routes

    Route::prefix('students')->namespace('Student')->group(function () {

    });


    // courses Routes

    Route::prefix('courses')->namespace('Course')->group(function () {
    });
});
