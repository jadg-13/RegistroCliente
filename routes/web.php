<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;

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

Route::get('customer/list', [CustomerController::class, 'show'])->name('customer.list');
Route::get('customer/list/find', [CustomerController::class, 'findByName'])->name('customer.findbyname');
Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('customer', [CustomerController::class, 'store' ])->name('customer.save');
Route::get('customer/list/download', [CustomerController::class, 'export'])->name('customer.export');

