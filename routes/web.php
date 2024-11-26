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
