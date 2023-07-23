<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;

//MyCommerceController
Route::get('/', [MyCommerceController::class, 'index'])->name('home');
Route::get('/product-category/{id}', [MyCommerceController::class, 'category'])->name('product-category');
Route::get('/product-detail/{id}', [MyCommerceController::class, 'detail'])->name('product-detail');

//CartController
Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('add-to-cart');
Route::get('/show-cart', [CartController::class, 'show'])->name('show-cart');
Route::get('/remove-cart-product/{id}', [CartController::class, 'remove'])->name('remove-cart-product');
Route::post('/update-cart-product/{id}', [CartController::class, 'update'])->name('update-cart-product');

//CheckoutController
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new-cash-order', [CheckoutController::class, 'newCashOrder'])->name('new-cash-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    //CheckoutController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //CategoryController
    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    //SubCategoryController
    Route::get('/sub-category/add', [SubCategoryController::class, 'index'])->name('sub-category.add');
    Route::get('/sub-category/manage', [SubCategoryController::class, 'manage'])->name('sub-category.manage');
    Route::post('/sub-category/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');

    //BrandController
    Route::get('/brand/add', [BrandController::class, 'index'])->name('brand.add');
    Route::get('/brand/manage', [BrandController::class, 'manage'])->name('brand.manage');
    Route::post('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    //UnitController
    Route::get('/unit/add', [UnitController::class, 'index'])->name('unit.add');
    Route::get('/unit/manage', [UnitController::class, 'manage'])->name('unit.manage');
    Route::post('/unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');

    //ProductController
    Route::get('/product/add', [ProductController::class, 'index'])->name('product.add');
    Route::get('/product/get-subcategory-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('product.get-subcategory-by-category');
    Route::get('/product/manage', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/product/details/{id}', [ProductController::class, 'details'])->name('product.details');
    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');


});


