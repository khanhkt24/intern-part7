<?php

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

Route::get('/product-detail', function () {
    return view('client.product-details');
})->name('product-detail');
// ...

Route::get('page-not-found', function () {
    return view('client.page-not-found');
});
Route::get('contact', function () {
    return view('client.contact');
})->name('contact');
Route::get('shop-wishlist', function () {
    return view('client.shop-wishlist');
});



Route::middleware(CheckRole::class)->prefix('admin')->group(function () {


    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/statistics', [DashboardController::class, 'getStatistics'])->name('statistics');
    Route::post('/statistics/year', [DashboardController::class, 'getStatisticsByYear'])->name('statisticsYear');
    Route::post('/statistics-month', [DashboardController::class, 'statisticsMonth'])->name('statisticsMonth');
    Route::post('/statistics/time-range', [DashboardController::class, 'getStatisticsByTimeRange'])->name('statisticsTimeRange');


    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{id}/show', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Route quản lý sản phẩm
    Route::prefix('products')
        ->as('products.')
        ->group(function () {
            Route::get('/',                     [ProductController::class, 'index'])->name('index');
            Route::get('/create',               [ProductController::class, 'create'])->name('create');
            Route::post('/store',               [ProductController::class, 'store'])->name('store');
            Route::get('/show/{product}',       [ProductController::class, 'show'])->name('show');
            Route::get('{product}/edit',        [ProductController::class, 'edit'])->name('edit');
            Route::put('{product}/update',      [ProductController::class, 'update'])->name('update');
            Route::delete('{product}/destroy',  [ProductController::class, 'destroy'])->name('destroy');
        });

    // Route quản lý biến thể sản phẩm
    Route::prefix('variants')
        ->as('variants.')
        ->group(function () {
            Route::get('/',                     [VariantController::class, 'index'])->name('index');
            Route::get('/show/{variant}',       [VariantController::class, 'show'])->name('show');
            Route::get('{variant}/edit',        [VariantController::class, 'edit'])->name('edit');
            Route::put('{variant}/update',      [VariantController::class, 'update'])->name('update');
            Route::delete('{variant}/destroy',  [VariantController::class, 'destroy'])->name('destroy');
        });


    // Route quản lý kích thước sản phẩm
    Route::prefix('productsize')
        ->as('productsize.')
        ->group(function () {
            Route::get('/',                     [ProductSizeController::class, 'index'])->name('index');
            Route::get('/create',               [ProductSizeController::class, 'create'])->name('create');
            Route::post('/store',               [ProductSizeController::class, 'store'])->name('store');
            Route::get('/edit/{id}',            [ProductSizeController::class, 'edit'])->name('edit');
            Route::put('/update/{id}',          [ProductSizeController::class, 'update'])->name('update');
            Route::delete('/delete/{id}',       [ProductSizeController::class, 'destroy'])->name('destroy');
        });

});
