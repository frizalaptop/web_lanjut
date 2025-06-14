<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::resource('member', MemberController::class);

// Auth
// Route::resource('dashboard', DashboardController::class);

Route::get('/login', [LoginController::class, 'indexLogin'])->name('login');
Route::post('/login_proses', [LoginController::class, 'proses'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'Register'])->name('auth.register');
Route::post('/register', [LoginController::class, 'storeRegister'])->name('auth.register');

Route::middleware(['auth' , 'isLevel:admin'])->group(function () {
    Route::resource('dashboard', PageController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('products', ProductController::class);
    // Route::resource('orders', OrderController::class);
    Route::resource('transactions', TransactionController::class);
    Route::post('transactions', [TransactionController::class, 'store'])
        ->name('transactions.store');
    Route::put('/transactions/{id}/update-status',[TransactionController::class, 'updateStatus'])
        ->name('transactions.update-status');
});

Route::middleware(['auth' , 'isLevel:admin,customer'])->group(function () {
    Route::resource('customers', CustomerController::class)->except(['show','edit', 'destroy']);
    Route::resource('products', ProductController::class)->except(['edit',
    'destroy']);
    Route::resource('dashboard', PageController::class);
    Route::get('/pdf/customers', [CustomerController::class, 'downloadPdf'])
        ->name('customers.pdf');
    Route::get('/transactions/{id}/invoice/view', [TransactionController::class,'viewInvoice'])->name('transactions.invoice.view');
    Route::get('/transactions/{id}/invoice/download', [TransactionController::class,'downloadInvoice'])->name('transactions.invoice.download');
}); 

