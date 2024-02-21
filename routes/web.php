<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Customer;
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
Route::post('/system-user/create-system-user', [SystemUser::class, 'create_system_user'])->name('admin.create_system_user');
Route::post('/system-user/update-system-user/{id}', [SystemUser::class, 'update_system_user'])->name('admin.update_system_user');


// Customer
Route::get('/customer', [Customer::class, 'customer'])->name('admin.customer');
