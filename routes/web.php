<?php

use app\Models\Order;
use App\Http\Controllers\OrderController;
use app\Models\Customer;
use App\Http\Controllers\CustomerController;
use app\Models\Product;
use App\Http\Controllers\ProductController;
use app\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/', function () {
        return view('welcome', [
            'products' => App\Models\Product::all()
        ]);
    });
    
    
    Route::get(
            'customers/trash/{id}',
            [CustomerController::class, 'trash']
        )->name('customers.trash');
    
    Route::get(
        'customers/trashed/',
        [CustomerController::class, 'trashed']
        )->name('customers.trashed');
    
    Route::get(
        'customers/restore/{id}',
        [CustomerController::class, 'trash']
        )->name('customers.restore');
    
    Route::resource('customers', CustomerController::class);

    //users
    Route::get(
        'users/trash/{id}',
        [UserController::class, 'trash']
    )->name('users.trash');

Route::get(
    'users/trashed/',
    [UserController::class, 'trashed']
    )->name('users.trashed');

Route::get(
    'users/restore/{id}',
    [UserController::class, 'trash']
    )->name('users.restore');

Route::resource('users', UserController::class);

//product
Route::get(
    'products/trash/{id}',
    [ProductController::class, 'trash']
)->name('products.trash');

Route::get(
'products/trashed/',
[ProductController::class, 'trashed']
)->name('products.trashed');

Route::get(
'products/restore/{id}',
[ProductController::class, 'trash']
)->name('products.restore');

Route::resource('products', ProductController::class);

//order
Route::get(
    'orders/trash/{id}',
    [OrderController::class, 'trash']
)->name('orders.trash');

Route::get(
'orders/trashed/',
[OrderController::class, 'trashed']
)->name('orders.trashed');

Route::get(
'orders/restore/{id}',
[OrderController::class, 'trash']
)->name('orders.restore');

Route::resource('orders', OrderController::class);

});

require __DIR__.'/auth.php';
