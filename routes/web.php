<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Customer;
use App\Http\Controllers\Admin\Deposit;
use App\Http\Controllers\Admin\Setting;
use App\Http\Controllers\Admin\Subscriptions;
use App\Http\Controllers\Admin\SystemUser;
use App\Http\Controllers\Admin\Withdrawal;
use App\Http\Controllers\Auth\AuthManager;
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

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login/post_login', [AuthManager::class, 'post_login'])->name('post_login');
Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');

// --------------- Admin Group ---------------
// Dashboard
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::post('/admin-dashboard/search', [AdminController::class, 'admin_search'])->middleware(['auth', 'verified'])->name('admin.search');
Route::post('/admin-dashboard/mobile_search', [AdminController::class, 'admin_mobile_search'])->middleware(['auth', 'verified'])->name('admin.mobile_search');

// Setting
Route::get('/setting/{id}', [Setting::class, 'admin_setting'])->middleware(['auth', 'verified'])->name('admin.setting');
Route::post('/setting/update_name/{id}', [Setting::class, 'update_admin_name'])->middleware(['auth', 'verified'])->name('admin.update_name');
Route::post('/setting/update_password/{id}', [Setting::class, 'update_admin_password'])->middleware(['auth', 'verified'])->name('admin.update_password');


// System Users
Route::get('/system-user', [SystemUser::class, 'system'])->middleware(['auth', 'verified'])->name('admin.system');
Route::post('/system-user/create-system-user', [SystemUser::class, 'create_system_user'])->middleware(['auth', 'verified'])->name('admin.create_system_user');
Route::post('/system-user/update-system-user/{id}', [SystemUser::class, 'update_system_user'])->middleware(['auth', 'verified'])->name('admin.update_system_user');


// Customer
Route::get('/customer', [Customer::class, 'customer'])->middleware(['auth', 'verified'])->name('admin.customer');
Route::post('/customer/create_customer', [Customer::class, 'create_customer'])->middleware(['auth', 'verified'])->name('admin.create_customer');
Route::post('/customer/update_customer/{id}', [Customer::class, 'update_customer'])->middleware(['auth', 'verified'])->name('admin.update_customer');

// Deposit
Route::get('/deposit', [Deposit::class, 'deposit'])->middleware(['auth', 'verified'])->name('admin.deposit');
Route::post('/deposit/create_deposit', [Deposit::class, 'create_deposit'])->middleware(['auth', 'verified'])->name('admin.create_deposit');

//  Withdrawal
Route::get('/withdrawal', [Withdrawal::class, 'withdrawal'])->middleware(['auth', 'verified'])->name('admin.withdrawal');
Route::post('/withdrawal/update_withdrawal/{id}', [Withdrawal::class, 'update_withdrawal'])->middleware(['auth', 'verified'])->name('admin.update_withdrawal');

//  Subscriptions
Route::get('/subscriptions', [Subscriptions::class, 'subscriptions'])->middleware(['auth', 'verified'])->name('admin.subscriptions');

