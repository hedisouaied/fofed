<?php

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//BEGIN Frontend section

Route::get('/',  [App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('home');

/* AUTHENFICATION */
Route::get('user/auth', [App\Http\Controllers\Frontend\IndexController::class, 'userAuth'])->name('user.auth');
/* PRODUCT CATEGORY */
Route::get('product-category/{slug}/', [App\Http\Controllers\Frontend\IndexController::class, 'productCategory'])->name('product.category');
/* PRODUCT DETAIL */
Route::get('product-detail/{slug}/', [App\Http\Controllers\Frontend\IndexController::class, 'productDetail'])->name('product.detail');


//END Frontend section

Auth::routes(['register' => false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ADMIN DASHBOARD

Route::group(
    ['prefix' => 'admin', 'middleware' => 'auth'],
    function () {

        Route::get('/', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');

        //BANNER SECTION
        Route::resource('/banner', \App\Http\Controllers\BannerController::class);
        Route::post('banner_status', [\App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');

        //CATEGORY SECTION
        Route::resource('/category', \App\Http\Controllers\CategoryController::class);
        Route::post('category_status', [\App\Http\Controllers\CategoryController::class, 'categoryStatus'])->name('category.status');
        Route::post('category/{id}/child', [\App\Http\Controllers\CategoryController::class, 'getChildByParentID']);

        //BRAND SECTION
        Route::resource('/brand', \App\Http\Controllers\BrandController::class);
        Route::post('brand_status', [\App\Http\Controllers\BrandController::class, 'brandStatus'])->name('brand.status');

        //PRODUCT SECTION
        Route::resource('/product', \App\Http\Controllers\ProductController::class);
        Route::post('product_status', [\App\Http\Controllers\ProductController::class, 'productStatus'])->name('product.status');

        //USER SECTION
        Route::resource('/user', \App\Http\Controllers\UserController::class);
        Route::post('user_status', [\App\Http\Controllers\UserController::class, 'userStatus'])->name('user.status');
    }
);
