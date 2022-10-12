<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSubcategoryRequest;
use App\Repositories\ImageRepository;
use App\Repositories\ProductSubcategoryRepository;
use Illuminate\Http\Request;

class ProductSubcategoryController extends Controller
{

    private $productSubcategoryRepository;
    private $imageRepository;

    private $imgDimensions = [
        "imgWidth" => 600,
        "imgHeight" => 800,
        "thumbWidth" => 200,
        "thumbHeight" => 260,
    ];

    public function __construct(
        ProductSubcategoryRepository $repository,
        ImageRepository $imageRepository
    )
    {
        $this->productSubcategoryRepository = $repository;
        $this->imageRepository = $imageRepository;
    }

    public function index(Request $request)
    {
        $productCategoryId = $request->route('product_category_id');

        if ($productCategoryId) {
            $productSubcategories = $this->productSubcategoryRepository->getProductCategoryProductSubcategories($productCategoryId);
            return view('backend.admin.product_subcategories.index', compact('productSubcategories', 'productCategoryId'));
        }
        $productSubcategories = $this->productSubcategoryRepository->getAll();
        return view(
            'backend.admin.product_subcategories.index',
            [
                'productSubcategories' => $productSubcategories,
                'productCategoryId' => $productCategoryId
            ]
        );
    }

    public function create()
    {
        return view('backend.admin.product_subcategories.create');
    }

    public function store(ProductSubcategoryRequest $request)
    {
        $inputs = $this->imageRepository->getInputs($request, $this->imgDimensions);
        $is_stored = $this->productSubcategoryRepository->store($inputs);

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

    public function update(ProductSubcategoryRequest $request)
    {
        if($request->has('image')) {
            $id = $request->toArray()['id'];
            $item = $this->productSubcategoryRepository->one($id);
            $this->imageRepository->deleteImages($item->image);
        }

        $inputs = $this->imageRepository->getInputs($request, $this->imgDimensions);

        $isUpdated = $this->productSubcategoryRepository->update($inputs);
        if ($isUpdated) {
            session()->flash('success', 'Sous-Catégorie mise à jour avec succès !');
            return redirect()->route('lb_admin.admin.product_subcategory.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($id)
    {
        $item = $this->productSubcategoryRepository->one($id);
        $this->imageRepository->deleteImages($item->image);
        $isDeleted = $this->productSubcategoryRepository->delete($id);

        if ($isDeleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.product_subcategory.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }

}
