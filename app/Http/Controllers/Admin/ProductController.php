<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{

    private $productRepository;
    private $imageRepository;

    private $imgDimensions = [
        "imgWidth" => 600,
        "imgHeight" => 800,
        "thumbWidth" => 200,
        "thumbHeight" => 260,
    ];

    public function __construct(
        ProductRepository $productRepository,
        ImageRepository $imageRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
    }

    public function index(Request $request)
    {
        $slug = $request->route('slug');
        //dd("slug: $slug");
        if ($slug) {
            $products = $this->productRepository->getCategoryProducts($slug);
            return view('backend.admin.products.index', compact('products', 'slug'));
        }
        $products = $this->productRepository->getAll();
        return view('backend.admin.products.index', compact('products', 'slug'));
    }

    public function create()
    {
        return view('backend.admin.products.create');
    }

    public function store(ProductRequest $productRequest)
    {
        $inputs = $this->imageRepository->getInputs($productRequest, $this->imgDimensions);
        //dd($inputs);
        $is_stored = $this->productRepository->store($inputs);
        if ($is_stored) {
            session()->flash('success', 'Produit créée avec succès !');
            return redirect()->route('lb_admin.admin.products.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    public function show($id)
    {
        $product = $this->productRepository->one($id);
        return view('backend.admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productRepository->one($id);
        return view('backend.admin.products.edit', ['product' => $product]);
    }

    public function update(ProductRequest $productRequest)
    {
        //dd($productRequest->has('image'));
        if($productRequest->has('image')) {
            $id = $productRequest->toArray()['id'];
            $product = $this->productRepository->one($id);
            $this->imageRepository->deleteImages($product->image);
        }

        $inputs = $this->imageRepository->getInputs($productRequest, $this->imgDimensions);

        $is_updated = $this->productRepository->update($inputs);
        if ($is_updated) {
            session()->flash('success', 'Produit mis à jour avec succès !');
            return redirect()->route('lb_admin.admin.products.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($id)
    {
        $product = $this->productRepository->one($id);
        $this->imageRepository->deleteImages($product->image);
        $is_deleted = $this->productRepository->delete($id);

        if ($is_deleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.products.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }
}
