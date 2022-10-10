<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductSubcategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\WebSiteController;
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
Route::get('/', [WebSiteController::class, 'index']);
Route::get('home', [WebSiteController::class, 'index'])->name('home');
Route::get('a-propos', [WebSiteController::class, 'a_propos'])->name('a-propos');
Route::get('nos-services', [WebSiteController::class, 'nos_services'])->name('nos-services');
Route::get('nos-realisations', [WebSiteController::class, 'nos_realisations'])->name('nos-realisations');
Route::get('contact', [WebSiteController::class, 'contact'])->name('contact');
Route::get('boutique', [WebSiteController::class, 'shop'])->name('boutique');
Route::get('boutique/{slug}/produits', [WebSiteController::class, 'shop'])->name('shop_category_products');
Route::get('boutique/produit/{id}', [WebSiteController::class, 'shop_product_details'])->name('shop_product_details');
Route::get('blog', [WebSiteController::class, 'blog'])->name('blog');

//Front-end routes when connected
Route::middleware('auth')->group(static function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

/**
 * Back-end Routes that don't necessite a connection
 */
Route::middleware('guest')->group(static function () {
    Route::get('/lbadmin', [LoginController::class, 'showLoginForm']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::middleware('throttle:5,5')->post('/login', [LoginController::class, 'saveLogin'])->name('login.save');
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset.form');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


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
        Route::get('/logout', [LoginController::class, 'logout'])->name('lb_admin.logout');

        //User's routes
        Route::group(
            [
                'middleware' => ['user'],
                'prefix' => 'user',
            ],
            static function () {
                Route::get('/', [UserDashboardController::class, 'index'])->name('lb_admin.user.dashboard.index');
                Route::get('home', [UserDashboardController::class, 'index']);
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
                Route::get('', [DashboardController::class, 'index']);
                Route::get('home', [DashboardController::class, 'index'])->name('lb_admin.admin.dashboard.index');

                Route::get('users', [UserController::class, 'index'])->name('lb_admin.admin.user.index');
                Route::get('user/new', [UserController::class, 'create'])->name('lb_admin.admin.user.new');
                Route::get('user/{id}/delete', [UserController::class, 'delete'])->name('lb_admin.admin.user.delete');
                Route::post('user/store', [UserController::class, 'store'])->name('lb_admin.admin.user.store');

                Route::get('categories', [CategoryController::class, 'index'])->name('lb_admin.admin.category.index');
                Route::get('category/create', [CategoryController::class, 'create'])->name('lb_admin.admin.category.create');
                Route::post('category/store', [CategoryController::class, 'store'])->name('lb_admin.admin.category.store');
                Route::get('category/{id}', [CategoryController::class, 'show'])->name('lb_admin.admin.category.show');
                Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('lb_admin.admin.category.edit');
                Route::post('category/update', [CategoryController::class, 'update'])->name('lb_admin.admin.category.update');
                Route::get('category/{id}/delete', [CategoryController::class, 'delete'])->name('lb_admin.admin.category.delete');

                Route::get('product_categories', [ProductCategoryController::class, 'index'])->name('lb_admin.admin.product_category.index');
                Route::get('product_category/create', [ProductCategoryController::class, 'create'])->name('lb_admin.admin.product_category.create');
                Route::post('product_category/store', [ProductCategoryController::class, 'store'])->name('lb_admin.admin.product_category.store');
                Route::get('product_category/{id}', [ProductCategoryController::class, 'show'])->name('lb_admin.admin.product_category.show');
                Route::get('product_category/{id}/edit', [ProductCategoryController::class, 'edit'])->name('lb_admin.admin.product_category.edit');
                Route::post('product_category/update', [ProductCategoryController::class, 'update'])->name('lb_admin.admin.product_category.update');
                Route::get('product_category/{id}/delete', [ProductCategoryController::class, 'delete'])->name('lb_admin.admin.product_category.delete');

                Route::get('product_subcategories', [ProductSubcategoryController::class, 'index'])->name('lb_admin.admin.product_subcategory.index');
                Route::get('product_category/{product_category_id}/product_subcategories', [ProductSubcategoryController::class, 'index'])->name('lb_admin.admin.product_subcategory.product_category');
                Route::get('product_subcategory/create', [ProductSubcategoryController::class, 'create'])->name('lb_admin.admin.product_subcategory.create');
                Route::post('product_subcategory/store', [ProductSubcategoryController::class, 'store'])->name('lb_admin.admin.product_subcategory.store');
                Route::get('product_subcategory/{id}', [ProductSubcategoryController::class, 'show'])->name('lb_admin.admin.product_subcategory.show');
                Route::get('product_subcategory/{id}/edit', [ProductSubcategoryController::class, 'edit'])->name('lb_admin.admin.product_subcategory.edit');
                Route::post('product_subcategory/update', [ProductSubcategoryController::class, 'update'])->name('lb_admin.admin.product_subcategory.update');
                Route::get('product_subcategory/{id}/delete', [ProductSubcategoryController::class, 'delete'])->name('lb_admin.admin.product_subcategory.delete');

                Route::get('posts', [PostController::class, 'index'])->name('lb_admin.admin.posts.index');
                Route::get('category/{slug}/posts', [PostController::class, 'index'])->name('lb_admin.admin.posts.category');
                Route::get('user/{user_id}/posts', [PostController::class, 'index'])->name('lb_admin.admin.posts.user');
                Route::get('post/create', [PostController::class, 'create'])->name('lb_admin.admin.post.create');
                Route::post('post/store', [PostController::class, 'store'])->name('lb_admin.admin.post.store');
                Route::get('post/{slug}', [PostController::class, 'show'])->name('lb_admin.admin.post.show');
                Route::get('post/{slug}/edit', [PostController::class, 'edit'])->name('lb_admin.admin.post.edit');
                Route::post('post/update', [PostController::class, 'update'])->name('lb_admin.admin.post.update');
                Route::get('post/{slug}/delete', [PostController::class, 'delete'])->name('lb_admin.admin.post.delete');

                //Route::resource('pages', 'Admin\PageController')->except('show');
                Route::get('pages', [PageController::class, 'index'])->name('lb_admin.admin.pages.index');
                Route::get('page/create', [PageController::class, 'create'])->name('lb_admin.admin.page.create');
                Route::post('page/store', [PageController::class, 'store'])->name('lb_admin.admin.page.store');
                Route::get('page/{id}', [PageController::class, 'show'])->name('lb_admin.admin.page.show');
                Route::get('page/{id}/edit', [PageController::class, 'edit'])->name('lb_admin.admin.page.edit');
                Route::post('page/update', [PageController::class, 'update'])->name('lb_admin.admin.page.update');
                Route::get('page/{id}/delete', [PageController::class, 'delete'])->name('lb_admin.admin.page.delete');

                Route::get('products', [ProductController::class, 'index'])->name('lb_admin.admin.products.index');
                Route::get('category/{slug}/products', [ProductController::class, 'index'])->name('lb_admin.admin.products.category');
                Route::get('product/create', [ProductController::class, 'create'])->name('lb_admin.admin.product.create');
                Route::post('product/store', [ProductController::class, 'store'])->name('lb_admin.admin.product.store');
                Route::get('product/{id}', [ProductController::class, 'show'])->name('lb_admin.admin.product.show');
                Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('lb_admin.admin.product.edit');
                Route::post('product/update', [ProductController::class, 'update'])->name('lb_admin.admin.product.update');
                Route::get('product/{id}/delete', [ProductController::class, 'delete'])->name('lb_admin.admin.product.delete');

            }
        );
    }
);
