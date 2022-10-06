<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $slug = $request->route('slug');
        //dd("slug: $slug");
        if ($slug) {
            $products = $this->productRepository->getCategoryProducts($slug);
            return view('backend.admin.products.index', compact('products', 'slug'));
        } else {
            $products = $this->productRepository->getAll();
            return view('backend.admin.products.index', compact('products', 'slug'));
        }
    }

    public function create()
    {
        return view('backend.admin.products.create');
    }

    public function store(ProductRequest $productRequest)
    {
        $inputs = $this->getInputs($productRequest);
        //dd($inputs);
        $is_stored = $this->productRepository->store($inputs);
        if ($is_stored) {
            session()->flash('success', 'Produit créée avec succès !');
            return redirect()->route('lb_admin.admin.products.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    protected function saveImages($request)
    {
        $image = $request->file('image');
        $name = time() . '.' . $image->extension();
        $img = InterventionImage::make($image->path());
        $img->widen(800)->heighten(600)->encode()->save(public_path('/images/') . $name);
        $img->widen(360)->heighten(260)->encode()->save(public_path('/images/thumbs/') . $name);
        return $name;
    }

    protected function getInputs($request)
    {
        $inputs = $request->except(['image']);
        $inputs['is_active'] = $request->has('is_active');
        if($request->image) {
            $inputs['image'] = $this->saveImages($request);
        }
        return $inputs;
    }

    protected function deleteImages($id)
    {
        $product = $this->productRepository->one($id);
        File::delete([
            public_path('/images/') . $product->image,
            public_path('/images/thumbs/') . $product->image,
        ]);
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
            $this->deleteImages($id);
        }

        $inputs = $this->getInputs($productRequest);

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
        //dd($id);
        $this->deleteImages($id);
        $is_deleted = $this->productRepository->delete($id);
        if ($is_deleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.products.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }
}
