<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Models\Order;

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

Route::view('/', 'home')->name('home');
Route::view('/products', 'products')->name('products');
Route::get('/custom', function() {
    $orders = Order::orderByDesc('id')->get();
    return view('admin.orders.show', compact('orders'));
})->name('custom');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/checkout', 'checkout')->name('checkout');

// CRUD Order Publik
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

Route::prefix('admin')->middleware('adminauth')->group(function () {
    Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('admin.dashboard');
    Route::view('/products', 'admin.products')->name('admin.products');
    Route::view('/orders', 'admin.orders')->name('admin.orders');
    Route::get('products/export', [ProductController::class, 'export'])->name('admin.products.export');
    Route::get('orders/export', [OrderController::class, 'export'])->name('admin.orders.export');
    Route::get('products/export-csv', [ProductController::class, 'exportCsv'])->name('admin.products.exportCsv');
    Route::get('orders/export-csv', [OrderController::class, 'exportCsv'])->name('admin.orders.exportCsv');
    Route::post('products/import', [ProductController::class, 'import'])->name('admin.products.import');
    Route::post('orders/import', [OrderController::class, 'import'])->name('admin.orders.import');
    Route::resource('products', ProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
        'show' => 'admin.products.show',
    ]);
    Route::resource('orders', OrderController::class)->names([
        'index' => 'admin.orders.index',
        'create' => 'admin.orders.create',
        'store' => 'admin.orders.store',
        'edit' => 'admin.orders.edit',
        'update' => 'admin.orders.update',
        'destroy' => 'admin.orders.destroy',
        'show' => 'admin.orders.show',
    ]);
    Route::get('products/template', [ProductController::class, 'downloadTemplate'])->name('admin.products.template');
    Route::get('orders/template', [OrderController::class, 'downloadTemplate'])->name('admin.orders.template');
    Route::get('logs', [\App\Http\Controllers\Admin\LogController::class, 'index'])->name('admin.logs.index');
    Route::get('logs/export', [\App\Http\Controllers\Admin\LogController::class, 'exportExcel'])->name('admin.logs.export');
    Route::get('logs/export-csv', [\App\Http\Controllers\Admin\LogController::class, 'exportCsv'])->name('admin.logs.exportCsv');
    Route::get('logs/export-pdf', [\App\Http\Controllers\Admin\LogController::class, 'exportPdf'])->name('admin.logs.exportPdf');
});

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/admin/register', [AuthAdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AuthAdminController::class, 'register'])->name('admin.register.submit');
Route::get('/admin/login', [AuthAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthAdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');

Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.submit');
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});
