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

/**
 * Frontend routes (web site) not connected
 */
    Route::get('/', 'WebSiteController@index');
    Route::get('home', 'WebSiteController@index')->name('home');
    Route::get('a-propos', 'WebSiteController@a_propos')->name('a-propos');
    Route::get('nos-services', 'WebSiteController@nos_services')->name('nos-services');
    Route::get('nos-realisations', 'WebSiteController@nos_realisations')->name('nos-realisations');
    Route::get('contact', 'WebSiteController@contact')->name('contact');
    Route::get('boutique', 'WebSiteController@shop')->name('boutique');
    Route::get('boutique/{slug}/produits', 'WebSiteController@shop')->name('shop_category_products');
    Route::get('boutique/produit/{id}', 'WebSiteController@shop_product_details')->name('shop_product_details');
    Route::get('blog', 'WebSiteController@blog')->name('blog');

//Frent-end routes when connected
    Route::middleware('auth')->group(static function () {
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});

/**
 * Back-end Routes that don't necessite a connection
 */
Route::middleware('guest')->group(static function () {
    Route::get('/lbadmin', 'Auth\LoginController@showLoginForm');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.form');
    Route::middleware('throttle:5,5')->post('/login', 'Auth\LoginController@saveLogin')->name('login.save');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('reset.form');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


});

/**
 * Back-end Administration routes prefixed by lb-admin when connected
 */
Route::group(
    [
        'middleware' => 'auth',
        'prefix' => 'lbadmin',
    ],
    static function () {
        //Routes that concern all users connected
        Route::get('/logout', 'Auth\LoginController@logout')->name('lb_admin.logout');

        //User's routes
        Route::group(
            [
                'middleware' => ['user'],
                'prefix' => 'user',
            ],
            static function () {
                Route::get('/', 'User\DashboardController@index')->name('lb_admin.user.dashboard.index');
                Route::get('home', 'User\DashboardController@index')->name('lb_admin.user.dashboard.index');
                Route::get('categories', 'User\CategoryController@index')->name('lb_admin.user.category.index');
                Route::get('posts/{user_id}', 'User\PostController@getUserPosts')->name('lb_admin.user.post.get_user_posts'); // to complete
            }
        );

        //Admin's routes
        Route::group(
            [
                'middleware' => ['admin'],
                'prefix' => 'admin',
            ],
            static function () {
                Route::get('', 'Admin\DashboardController@index');
                Route::get('home', 'Admin\DashboardController@index')->name('lb_admin.admin.dashboard.index');

                Route::get('users', 'Admin\UserController@index')->name('lb_admin.admin.user.index');
                Route::get('user/new', 'Admin\UserController@new')->name('lb_admin.admin.user.new');
                Route::get('user/{id}/delete', 'Admin\UserController@delete')->name('lb_admin.admin.user.delete');
                Route::post('user/store', 'Admin\UserController@store')->name('lb_admin.admin.user.store');

                Route::get('categories', 'Admin\CategoryController@index')->name('lb_admin.admin.category.index');
                Route::get('category/create', 'Admin\CategoryController@create')->name('lb_admin.admin.category.create');
                Route::post('category/store', 'Admin\CategoryController@store')->name('lb_admin.admin.category.store');
                Route::get('category/{id}', 'Admin\CategoryController@show')->name('lb_admin.admin.category.show');
                Route::get('category/{id}/edit', 'Admin\CategoryController@edit')->name('lb_admin.admin.category.edit');
                Route::post('category/update', 'Admin\CategoryController@update')->name('lb_admin.admin.category.update');
                Route::get('category/{id}/delete', 'Admin\CategoryController@delete')->name('lb_admin.admin.category.delete');

                Route::get('posts', 'Admin\PostController@index')->name('lb_admin.admin.posts.index');
                Route::get('category/{slug}/posts', 'Admin\PostController@index')->name('lb_admin.admin.posts.category');
                Route::get('user/{user_id}/posts', 'Admin\PostController@index')->name('lb_admin.admin.posts.user');
                Route::get('post/create', 'Admin\PostController@create')->name('lb_admin.admin.post.create');
                Route::post('post/store', 'Admin\postController@store')->name('lb_admin.admin.post.store');
                Route::get('post/{slug}', 'Admin\PostController@show')->name('lb_admin.admin.post.show');
                Route::get('post/{slug}/edit', 'Admin\PostController@edit')->name('lb_admin.admin.post.edit');
                Route::post('post/update', 'Admin\postController@update')->name('lb_admin.admin.post.update');
                Route::get('post/{slug}/delete', 'Admin\PostController@delete')->name('lb_admin.admin.post.delete');

                //Route::resource('pages', 'Admin\PageController')->except('show');
                Route::get('pages', 'Admin\PageController@index')->name('lb_admin.admin.pages.index');
                Route::get('page/create', 'Admin\PageController@create')->name('lb_admin.admin.page.create');
                Route::post('page/store', 'Admin\PageController@store')->name('lb_admin.admin.page.store');
                Route::get('page/{id}', 'Admin\PageController@show')->name('lb_admin.admin.page.show');
                Route::get('page/{id}/edit', 'Admin\PageController@edit')->name('lb_admin.admin.page.edit');
                Route::post('page/update', 'Admin\PageController@update')->name('lb_admin.admin.page.update');
                Route::get('page/{id}/delete', 'Admin\PageController@delete')->name('lb_admin.admin.page.delete');

                Route::get('products', 'Admin\ProductController@index')->name('lb_admin.admin.products.index');
                Route::get('category/{slug}/products', 'Admin\ProductController@index')->name('lb_admin.admin.products.category');
                Route::get('product/create', 'Admin\ProductController@create')->name('lb_admin.admin.product.create');
                Route::post('product/store', 'Admin\productController@store')->name('lb_admin.admin.product.store');
                Route::get('product/{id}', 'Admin\ProductController@show')->name('lb_admin.admin.product.show');
                Route::get('product/{id}/edit', 'Admin\ProductController@edit')->name('lb_admin.admin.product.edit');
                Route::post('product/update', 'Admin\productController@update')->name('lb_admin.admin.product.update');
                Route::get('product/{id}/delete', 'Admin\ProductController@delete')->name('lb_admin.admin.product.delete');

            }
        );
    }
);
