<?php

namespace App\Providers;

use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductSubcategoryRepository;
use App\Repositories\UserRepository;
use App\Repositories\PageRepository;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{

    public $pageRepository;
    public $categoryRepository;
    public $productCategoryRepository;
    public $productSubcategoryRepository;

    public function __construct()
    {
        $this->pageRepository = resolve(PageRepository::class);
        $this->categoryRepository = resolve(CategoryRepository::class);
        $this->productCategoryRepository = resolve(ProductCategoryRepository::class);
        $this->productSubcategoryRepository = resolve(ProductSubcategoryRepository::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'backend.admin.posts.index',
            'backend.admin.posts.create',
            'backend.admin.posts.edit',
            'backend.admin.product_subcategories.index',
            'backend.admin.product_subcategories.create',
            'backend.admin.product_subcategories.edit',
        ], function ($view) {
            $view->with('categories', $this->categoryRepository->getAll());
            $view->with('productCategories', $this->productCategoryRepository->getAll());
            $view->with('users', User::all());
        });

        View::composer(
            [
                'backend.admin.products.index',
                'backend.admin.products.create',
                'backend.admin.products.edit',
            ],
            function ($view) {
                $view->with('productCategories', $this->productCategoryRepository->getAll());
                $view->with('productSubcategories', $this->productSubcategoryRepository->getAll());
            }
        );

        View::composer([
            'backend.admin.pages.create',
            'backend.admin.pages.edit'
        ], function ($view) {
            $view->with('pages', $this->pageRepository->getAllActive());
        });

        View::composer('backend.layout.dashboard', function ($view) {
            $title = config('titles.' . Route::currentRouteName());
            $view->with(compact('title'));
        });

        View::composer(['frontend.partials.header'], function ($view) {
            $view->with('menu_items', $this->pageRepository->getMenuItems());
        });

        View::composer([
            'frontend.pages.blog',
            'frontend.pages.shop',
            'frontend.pages.index',
        ], function ($view) {
            $view->with('categories', $this->categoryRepository->getAll());
            $view->with('productCategories', $this->productCategoryRepository->getAll());
            $view->with('productSubcategories', $this->productSubcategoryRepository->getAll());
        });
    }
}
