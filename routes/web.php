<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Customer;
use App\Http\Controllers\Admin\Deduct;
use App\Http\Controllers\Admin\Deposit;
use App\Http\Controllers\Admin\Setting;
use App\Http\Controllers\Admin\Subscriptions;
use App\Http\Controllers\Admin\SystemUser;
use App\Http\Controllers\Admin\Withdrawal;
use App\Http\Controllers\Auth\AuthManager;
use App\Http\Controllers\CustomerAuth\CustomerAuthManager;
use App\Http\Controllers\FrontEnd\Bank;
use App\Http\Controllers\FrontEnd\Financial\Deposit as FinancialDeposit;
use App\Http\Controllers\FrontEnd\Financial\Package as FinancialPackage;
use App\Http\Controllers\FrontEnd\Financial\Withdrawal as FinancialWithdrawal;
use App\Http\Controllers\FrontEnd\History;
use App\Http\Controllers\FrontEnd\Index;
use App\Http\Controllers\FrontEnd\Info;
use App\Http\Controllers\FrontEnd\Package;
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

// --------------- Customer Group ---------------
// Customer
Route::get('/customer_login', [CustomerAuthManager::class, 'customer_login'])->name('customer_login');
Route::post('/customer_login/post_customer_login', [CustomerAuthManager::class, 'post_customer_login'])->name('post_customer_login');
Route::post('/customer_logout', [CustomerAuthManager::class, 'customer_logout'])->name('customer_logout');


// Route::group(['middleware' => ['web','auth:customer'], 'prefix' => 'customer_login'], function () {
//     Route::get('/', [Index::class, 'index'])->name('index');
// });

// Home
// Route::get('/', [Index::class, 'index'])->middleware('auth:customer')->name('index');
Route::get('/', [Index::class, 'index'])->name('index');

// Package
Route::get('/package', [Package::class, 'package'])->name('package');

// History
Route::get('/history_deposit', [History::class, 'history_deposit'])->middleware('auth:customer')->name('history_deposit');
Route::get('/history_withdrawal', [History::class, 'history_withdrawal'])->middleware('auth:customer')->name('history_withdrawal');

// Info
Route::get('/info', [Info::class, 'info'])->middleware('auth:customer')->name('info');

// Bank
Route::get('/bank', [Bank::class, 'bank'])->middleware('auth:customer')->name('bank');
Route::get('/bank_add', [Bank::class, 'bank_add'])->middleware('auth:customer')->name('bank_add');
Route::post('/bank_add/bank_add_post', [Bank::class, 'bank_add_post'])->middleware('auth:customer')->name('bank_add_post');

// Finalcial
Route::post('/finalcial/customer_withdrawal', [FinancialWithdrawal::class, 'customer_withdrawal'])->middleware('auth:customer')->name('customer_withdrawal');
Route::post('/finalcial/customer_deposit', [FinancialDeposit::class, 'customer_deposit'])->middleware('auth:customer')->name('customer_deposit');
Route::post('/finalcial/customer_package', [FinancialPackage::class, 'customer_package'])->middleware('auth:customer')->name('customer_package');


// ADMIN

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
Route::post('/deposit/update_deposit/{id}', [Deposit::class, 'update_deposit'])->middleware(['auth', 'verified'])->name('admin.update_deposit');

// Deduct
Route::post('/deduct/{id}', [Deduct::class, 'deduct'])->middleware(['auth', 'verified'])->name('admin.deduct');

//  Withdrawal
Route::get('/withdrawal', [Withdrawal::class, 'withdrawal'])->middleware(['auth', 'verified'])->name('admin.withdrawal');
Route::post('/withdrawal/update_withdrawal/{id}', [Withdrawal::class, 'update_withdrawal'])->middleware(['auth', 'verified'])->name('admin.update_withdrawal');

//  Subscriptions
Route::get('/subscriptions', [Subscriptions::class, 'subscriptions'])->middleware(['auth', 'verified'])->name('admin.subscriptions');
Route::post('/subscribe', [Subscriptions::class, 'subscribe'])->middleware(['auth', 'verified'])->name('admin.subscribe');

