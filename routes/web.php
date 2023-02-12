<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PermissionController;

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

Route::get('login',[CustomAuthController::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('logout',[CustomAuthController::class,'logout'])->name('logout');

Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('home');

    Route::name('user-')->group(function(){
        Route::get('user',[UserController::class,'index'])->name('list');
        Route::get('user/create',[UserController::class,'create'])->name('create');
        Route::post('user/store',[UserController::class,'store'])->name('store');
        Route::get('user/{id}',[UserController::class,'view'])->name('view');
        Route::get('user/edit/{id}',[UserController::class,'edit'])->name('edit');
        Route::put('user/{id}',[UserController::class,'update'])->name('update');
        Route::get('user/delete/{id}',[UserController::class,'delete'])->name('delete');
        Route::get('user-search',[UserController::class,'search'])->name('search');
    });
    Route::name('role-')->group(function(){
        Route::get('role',[RoleController::class,'index'])->name('list');
        Route::get('role/create',[RoleController::class,'create'])->name('create');
        Route::post('role/store',[RoleController::class,'store'])->name('store');
        Route::get('role/{id}',[RoleController::class,'view'])->name('view');
        Route::get('role/edit/{id}',[RoleController::class,'edit'])->name('edit');
        Route::post('role/{id}',[RoleController::class,'update'])->name('update');
        Route::get('role/delete/{id}',[RoleController::class,'delete'])->name('delete');
    });
    Route::name('permission-')->group(function(){
        Route::get('permission',[PermissionController::class,'index'])->name('list');
        Route::get('permission/create',[PermissionController::class,'create'])->name('create');
        Route::post('permission/store',[PermissionController::class,'store'])->name('store');
        Route::get('permission/edit/{id}',[PermissionController::class,'edit'])->name('edit');
        Route::post('permission/{id}',[PermissionController::class,'update'])->name('update');
        Route::get('permission/delete/{id}',[PermissionController::class,'delete'])->name('delete');
        Route::get('permission-search',[PermissionController::class,'search'])->name('search');
    });
});
