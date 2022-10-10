<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSubcategoryRequest;
use App\Repositories\ProductSubcategoryRepository;
use Illuminate\Http\Request;

class ProductSubcategoryController extends Controller
{

    private $productSubcategoryRepository;

    public function __construct(ProductSubcategoryRepository $repository)
    {
        $this->productSubcategoryRepository = $repository;
    }

    public function index(Request $request)
    {
        $product_category_id = $request->route('product_category_id');

        if ($product_category_id) {
            $productSubcategories = $this->productSubcategoryRepository->getProductCategoryProductSubcategories($product_category_id);
            return view('backend.admin.product_subcategories.index', compact('productSubcategories', 'product_category_id'));
        }
        $productSubcategories = $this->productSubcategoryRepository->getAll();
        return view('backend.admin.product_subcategories.index', ['productSubcategories' => $productSubcategories]);
    }

    public function create()
    {
        return view('backend.admin.product_subcategories.create');
    }

    public function store(ProductSubcategoryRequest $request)
    {
        $is_stored = $this->productSubcategoryRepository->store($request->toArray());
        if ($is_stored) {
            session()->flash('success', 'Sous-Catégorie créée avec succès !');
            return redirect()->route('lb_admin.admin.product_subcategory.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    public function show($id)
    {
        $productSubcategory = $this->productSubcategoryRepository->one($id);
        return view('backend.admin.product_subcategories.show', ['productSubcategory' => $productSubcategory]);
    }

    public function edit($id)
    {
        $productSubcategory = $this->productSubcategoryRepository->one($id);
        return view('backend.admin.product_subcategories.edit', ['productSubcategory' => $productSubcategory]);
    }

    public function update(productSubcategoryRequest $request)
    {
        $isUpdated = $this->productSubcategoryRepository->update($request->toArray());
        if ($isUpdated) {
            session()->flash('success', 'Sous-Catégorie mise à jour avec succès !');
            return redirect()->route('lb_admin.admin.product_subcategory.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->deleteImages($id);
        $is_deleted = $this->productSubcategoryRepository->delete($id);
        if ($is_deleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.product_subcategory.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }

}
