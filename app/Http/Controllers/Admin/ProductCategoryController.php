<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Repositories\ProductCategoryRepository;

class ProductCategoryController extends Controller
{

    private $productCategoryRepository;

    public function __construct(ProductCategoryRepository $repository)
    {
        $this->productCategoryRepository = $repository;
    }

    public function index()
    {
        $productCategories = $this->productCategoryRepository->getAll();
        return view('backend.admin.product_categories.index', ['productCategories' => $productCategories]);
    }

    public function create()
    {
        return view('backend.admin.product_categories.create');
    }

    public function store(productCategoryRequest $request)
    {
        $is_stored = $this->productCategoryRepository->store($request->toArray());
        if ($is_stored) {
            session()->flash('success', 'Catégorie créée avec succès !');
            return redirect()->route('lb_admin.admin.product_category.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    public function show($id)
    {
        $productCategory = $this->productCategoryRepository->one($id);
        return view('backend.admin.product_categories.show', ['productCategory' => $productCategory]);
    }

    public function edit($id)
    {
        $productCategory = $this->productCategoryRepository->one($id);
        return view('backend.admin.product_categories.edit', ['productCategory' => $productCategory]);
    }

    public function update(ProductCategoryRequest $request)
    {
        $isUpdated = $this->productCategoryRepository->update($request->toArray());
        if ($isUpdated) {
            session()->flash('success', 'Catégorie mise à jour avec succès !');
            return redirect()->route('lb_admin.admin.product_category.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($id)
    {
        $isDeleted = $this->productCategoryRepository->delete($id);
        if ($isDeleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.product_category.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }

}
