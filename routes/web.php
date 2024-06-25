<?php

use App\Http\Controllers\backend\categoryoController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\newsController as BackendNewsController;
use App\Http\Controllers\backend\productsController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\frontend\detailController;
use App\Http\Controllers\frontend\frontendproductsController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\newsController;
use Illuminate\Support\Facades\Auth;
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

Route::controller(UserController::class)->group(function () {
    Route::get('/signup', 'register')->name('signup');
    Route::post('/signup-submit', 'registerSubmit')->name('signup-submit');
    Route::get('/login', 'login')->name('login');
    Route::post('/signin-submit', 'signinSubmit')->name('signin-submit');
    Route::get('/admin/logout', 'logoutUser')->name('admin-logout');
    Route::get('/edit-profile/{user}','editProfile')->name('edit-profile');
    Route::post('edit-profile-submit/{user}','editProfileSubmit')->name('edit-profile-submit');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::view('/', 'backend.master')->name('admin-dashboard');
});

Route::controller(LogoController::class)->group(function () {
    Route::get('/list-logo', 'listLogo')->name('list-logo');
    Route::get('/add-logo', 'addLogo')->name('add-logo');
    Route::post('/add-logo-submit', 'addLogoSubmit')->name('add-logo-submit');
    Route::get('/edit-logo/{logo}', 'editLogo')->name('edit-logo');
    Route::post('/edit-logo-submit/{logo}', 'editLogoSubmit')->name('edit-logo-submit');
    Route::post('/delete-logo', 'deleteLogo')->name('delete-logo');
});

Route::controller(categoryoController::class)->group(function(){
    Route::get('/list-category','listCategory')->name('list-category');
    Route::get('/add-category', 'addCategory')->name('add-category');
    Route::post('/add-category-submit', 'addCategorySubmit')->name('add-category-Submit');
    Route::get('/edit-category/{category}','editCategory')->name('edit-category');
    Route::post('/edit-category-submit/{category}','editcategorySubmit')->name('edit-category-submit');
    Route::post('/delete-category','DeleteCategory')->name('delete-catrgory');
}); 

Route::controller(productsController::class)->group(function(){
    Route::get('/list-product','listProduct')->name('list-product');
    Route::get('/add-product','addProduct')->name('add-product');
    Route::post('/add-product-submit','addProductSubmit')->name('add-product-submit');
    Route::get('/edit-product/{product}','editProduct')->name('edit-product');
    Route::post('/edit-product-submit/{product}','editProductSubmit')->name('edit-product-submit');
    Route::post('/delete-product','deleteProduct')->name('delete-product');
    
});
Route::controller(HomeController::class)->group(function(){
    Route::get('/','getAllPro')->name('get-all-pro');
});

Route::controller(detailController::class)->group(function(){
    Route::get('/product-detail/{product}','productDaltail')->name('product-deltail');
});

Route::controller(frontendproductsController::class)->group(function(){
    Route::get('/shop','shop')->name('shop');
    Route::get('/buy-product/{product}','BuyProduct')->name('buy-product');
    Route::post('/buy-product-submit/{product}','BuyProductsubmit')->name('buy-product-submit');
    Route::get('/search-product','searchProduct')->name('search-product');

});

Route::controller(BackendNewsController::class)->group(function(){
    Route::get('/list-news','listNews')->name('list-news');
    Route::get('/add-news','addNews')->name('add-news');
    Route::post('/add-news-submit','addNewsSubmit')->name('add-news-submit');
    Route::get('/edit-news/{news}','editNews')->name('edit-news');
    Route::post('/edit-news-submit/{news}','editNewsSubmit')->name('edit-news-submit');
    Route::post('/delete-news','deleteNews')->name('delete-news');
});

Route::controller(newsController::class)->group(function(){
    Route::get('/get-news','getAllNews')->name('get-news');
    Route::get('/news-detail/{news}','newDetail')->name('news-detail');
});


// Route::view('/news', 'frontend.news')->name('news');
