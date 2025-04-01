<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Route::get('admin/products/create',function(){
//     return view('admin.products.create');
// });
// Route::get('admin/products/index',function(){
//     return view('admin.products.index');
// });

//Dashboard Routes
Route::get('products', [ProductController::class, 'index']);
Route::get('products/create', [ProductController::class, 'create']);
Route::post('products/store', [ProductController::class, 'store']);
Route::get('products/edit/{id}', [ProductController::class, 'edit']);
Route::get('products/delete/{id}', [ProductController::class, 'destroy']);
Route::patch('products/update/{id}', [ProductController::class, 'update']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories_create');
Route::post('categories/store', [CategoryController::class, 'store']);
Route::get('categories/edit/{id}', [CategoryController::class, 'edit']);
Route::get('categories/delete/{id}', [CategoryController::class, 'destroy']);
Route::patch('categories/update/{id}', [CategoryController::class, 'update']);
//Front pages Route

Route::get('/', [FrontController::class,'index']);

Route::get('/welcome',function(){
    return view('welcome');
});

//Dashboard route
Route::prefix('admin')->group(function(){
    Route::get('products',[ProductController::class,'index']);
    Route::get('products/create',[ProductController::class,'create'])->name('product_create');
    Route::get('products/store',[ProductController::class,'store'])->name('product_store');
    Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('product_edit');
    Route::get('products/delete/{id}',[ProductController::class,'destroy'])->name('product_destroy');
    Route::patch('products/update/{id}',[ProductController::class,'update'])->name('product_update');

    Route::get('categories',[CategoryController::class,'index']);
    Route::get('categories/create',[CategoryController::class,'create'])->name('category_create');
    Route::get('categories/store',[CategoryController::class,'store']);
    Route::get('categories/edit/{id}',[CategoryController::class,'edit']);
    Route::get('categories/delete/{id}',[CategoryController::class,'destroy']);
    Route::patch('categories/update/{id}',[CategoryController::class,'update']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
