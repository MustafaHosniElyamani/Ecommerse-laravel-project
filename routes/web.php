<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\CartController;
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

    $viewData = [];
    $viewData["title"] = "Home Page - Online Store";
    return view('home.index')->with("viewData", $viewData);
});


use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

 Route::get('/', [HomeController::class, 'index'])->name("home.index");
 Route::get('/about', [HomeController::class, 'about'])->name("home.about");
 Route::get('/products', [ProductController::class, 'index'])->name("product.index");
 Route::get('/products/{id}', [ProductController::class, 'show'])->name("product.show");
 Route::get('/cart', [CartController::class, 'index'])->name("cart.index");
 Route::get('/cart/delete', [CartController::class, 'delete'])->name("cart.delete");
 Route::post('/cart/add/{id}', [CartController::class, 'add'])->name("cart.add");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])->name("admin.home.index");
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name("admin.product.index");
    Route::post('/admin/products/store', [AdminProductController::class, 'store'])->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', [AdminProductController::class, 'delete'])->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', [AdminProductController::class, 'update'])->name("admin.product.update");

});
Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', [CartController::class, 'purchase'])->name("cart.purchase");
    Route::get('/my-account/orders', [MyAccountController::class, 'orders'])->name("myaccount.orders");

    });
