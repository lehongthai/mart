<?php
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

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function (){
    /**
     * Route dashboard admin
     */
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard.index');

    /*Route User*/
    Route::group(['prefix' => 'user'], function (){
        Route::get('/', 'Admin\UserController@index')->name('user.index');
        Route::get('/profile', 'Admin\UserController@profile')->name('user.profile');
        Route::get('/create', 'Admin\UserController@create')->name('user.create');
        Route::post('/create', 'Admin\UserController@store')->name('user.store');
        Route::get('/update/{id?}', 'Admin\UserController@edit')->name('user.edit');
        Route::post('/update/{id?}', 'Admin\UserController@update')->name('user.update');
        Route::get('/destroy/{id?}', 'Admin\UserController@destroy')->name('user.destroy');
    });

    /* Route Product*/
    Route::group(['prefix' => 'product'], function (){
        Route::get('/', 'Admin\ProductController@index')->name('product.index');
        Route::get('/show/{id?}', 'Admin\ProductController@show')->name('product.show');
        Route::get('/create', 'Admin\ProductController@create')->name('product.create');
        Route::post('/create', 'Admin\ProductController@store')->name('product.store');
        Route::get('/update/{id?}', 'Admin\ProductController@edit')->name('product.edit');
        Route::post('/update/{id?}', 'Admin\ProductController@update')->name('product.update');
        Route::get('/destroy/{id?}', 'Admin\ProductController@destroy')->name('product.destroy');
    });


    /* Route Post */
    Route::group(['prefix' => 'post'], function (){
        Route::get('/', 'Admin\PostController@index')->name('post.index');
        Route::get('/show/{id?}', 'Admin\PostController@show')->name('post.show');
        Route::get('/create', 'Admin\PostController@create')->name('post.create');
        Route::post('/create', 'Admin\PostController@store')->name('post.store');
        Route::get('/update/{id?}', 'Admin\PostController@edit')->name('post.edit');
        Route::post('/update/{id?}', 'Admin\PostController@update')->name('post.update');
        Route::get('/destroy/{id?}', 'Admin\PostController@destroy')->name('post.destroy');
    });

    /* Route Slider */
    Route::group(['prefix' => 'slider'], function (){
        Route::get('/', 'Admin\SliderController@index')->name('slider.index');
        Route::get('/show/{id?}', 'Admin\SliderController@show')->name('slider.show');
        Route::get('/create', 'Admin\SliderController@create')->name('slider.create');
        Route::post('/create', 'Admin\SliderController@store')->name('slider.store');
        Route::get('/update/{id?}', 'Admin\SliderController@edit')->name('slider.edit');
        Route::post('/update/{id?}', 'Admin\SliderController@update')->name('slider.update');
        Route::get('/destroy/{id?}', 'Admin\SliderController@destroy')->name('slider.destroy');
    });

    /* Route Block */
    Route::group(['prefix' => 'block'], function (){
        Route::get('/', 'Admin\BlockController@index')->name('block.index');
        Route::get('/show/{id?}', 'Admin\BlockController@show')->name('block.show');
        Route::get('/create', 'Admin\BlockController@create')->name('block.create');
        Route::post('/create', 'Admin\BlockController@store')->name('block.store');
        Route::get('/update/{id?}', 'Admin\BlockController@edit')->name('block.edit');
        Route::post('/update/{id?}', 'Admin\BlockController@update')->name('block.update');
        Route::get('/destroy/{id?}', 'Admin\BlockController@destroy')->name('block.destroy');
    });

    /* Route Category*/
    Route::group(['prefix' => 'category'], function (){
        Route::get('/', 'Admin\CategoryController@index')->name('category.index');
        Route::get('/show/{id?}', 'Admin\CategoryController@show')->name('category.show');
        Route::get('/create', 'Admin\CategoryController@create')->name('category.create');
        Route::post('/create', 'Admin\CategoryController@store')->name('category.store');
        Route::get('/update/{id?}', 'Admin\CategoryController@edit')->name('category.edit');
        Route::post('/update/{id?}', 'Admin\CategoryController@update')->name('category.update');
        Route::get('/destroy/{id?}', 'Admin\CategoryController@destroy')->name('category.destroy');
    });

    /* Route SettingController*/
    Route::group(['prefix' => 'setting'], function (){
        Route::get('/', 'Admin\SettingController@index')->name('setting.index');
        Route::get('/show/{type?}', 'Admin\SettingController@show')->name('setting.show');
        Route::get('/update/{type?}/{id?}', 'Admin\SettingController@edit')->name('setting.edit');
        Route::post('/update/{type?}/{id?}', 'Admin\SettingController@update')->name('setting.update');
    });

    /**
     * Management Manager Admin
     */
    Route::group(['prefix' => 'manager'], function () {
        Route::get('/', 'Admin\ManagerController@index')->name('manager.index');
        Route::post('/', 'Admin\ManagerController@update')->name('manager.update');
    });
});

/* HomeController */
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/san-pham/{slug?}', 'HomeController@productSale')->name('home.productSale');
Route::get('/chi-tiet-san-pham/{slug?}', 'HomeController@productDetail')->name('home.productDetail');
Route::get('/about', 'HomeController@about')->name('home.about');
Route::get('/contact', 'HomeController@contact')->name('home.contact');
Route::post('/contact', 'HomeController@storeContact')->name('home.storeContact');
Route::get('/bai-viet/{slug?}', 'HomeController@blog')->name('home.blog');
Route::get('/thong-tin-chi-tiet/{slug?}', 'HomeController@blogDetail')->name('home.blogDetail');
Route::get('/thong-tin/{slug?}', 'HomeController@sliderDetail')->name('home.sliderDetail');
Route::get('/tim-kiem', 'HomeController@searchProduct')->name('home.searchProduct');
Route::get('/404', 'HomeController@notFound')->name('home.404');

/* CartController */
Route::post('/buy/{id?}', 'CartController@buyProduct')->name('cart.buyProduct');
Route::get('/cart', 'CartController@lists')->name('cart.list');
Route::get('/update-cart/{rowId?}', 'CartController@updateCart')->name('cart.updateCart');
Route::post('/cart', 'CartController@postCart')->name('cart.postCart');
Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('/checkout', 'CartController@postCheckout')->name('cart.postCheckout');
Route::get('/order-recieved', 'CartController@orderRecieved')->name('cart.orderRecieved');
Route::get('/delete-cart/{rowId?}', 'CartController@deleteCart')->name('cart.deleteCart');


/**/
Route::get('/home', 'HomeController@index')->name('home');


/* Language Controller */
Route::post('/language-chooser', 'LanguageController@changeLanguage')->name('language.chooser1');
Route::post('/language', [
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' =>  'LanguageController@changeLanguage'
])->name('language.chooser2');
