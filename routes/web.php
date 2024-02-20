<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SystemUser;
use Illuminate\Support\Facades\Route;

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

// Dashboard
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');


// System Users
Route::get('/system-user', [SystemUser::class, 'system'])->name('admin.system');

