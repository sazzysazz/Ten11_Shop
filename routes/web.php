<?php

use App\Http\Controllers\backend\categoryoController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\backend\productsController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\frontend\frontendproductsController;
use App\Http\Controllers\frontend\HomeController;
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

Route::controller(frontendproductsController::class)->group(function(){
  
    Route::get('/shop','shopProduct')->name('shop-product');
    Route::get('/product-detail/{product}','productDaltail')->name('product-deltail');
    Route::get('/buy-product/{product}','BuyProduct')->name('buy-product');
    Route::post('/buy-product-submit/{product}','BuyProductsubmit')->name('buy-product-submit');
    Route::get('/get-by-man','getByMan')->name('get-by-man');
    Route::get('/get-by-man','getByMan')->name('get-by-man');
    Route::get('/get-by-women','getByWomen')->name('get-by-women');
    Route::get('/get-by-boy','getByBoy')->name('get-by-boy');
    Route::get('/get-by-girl','getByGirl')->name('get-by-girl');
    Route::get('/get-by-shirt','getByshirt')->name('get-by-shirt');
    Route::get('/get-by-jeans','getByjeans')->name('get-by-jeans');
    Route::get('/get-by-Cargo','getByCargo')->name('get-by-Cargo');
    Route::get('/get-by-shoes','getByshoes')->name('get-by-shoes');
    Route::get('/search-product','searchProduct')->name('search-product');
    Route::get('/get-by-hight-price','getByHightprice')->name('get-by-hight-price');
    Route::get('/get-by-low-price','getByLowPrice')->name('get-by-low-price');
    Route::get('/promotion-product','promotionProduct')->name('promotion-product');
});


// Route::view('/', 'frontend.home')->name('home');
// Route::view('/shop', 'frontend.shop')->name('shop');
Route::view('/news', 'frontend.news')->name('news');
// Route::view('/product-detail', 'frontend.product-detail')->name('product-detail');
