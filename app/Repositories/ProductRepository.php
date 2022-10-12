<?php


namespace App\Repositories;


use App\Models\Product;
use App\Models\ProductSubcategory;
use Illuminate\Support\Str;

class ProductRepository
{

    /**
     * @var Product
     */
    private $product;
    /**
     * @var ProductSubcategory
     */
    private $productSubcategory;

    public function __construct(Product $product, ProductSubcategory $productSubcategory)
    {
        $this->product = $product;
        $this->productSubcategory = $productSubcategory;
    }

    public function getAll()
    {
        return $this->product::where(['is_deleted' => 0])
        ->orderBy('name')
        ->paginate(100);
    }

    public function getSubcategoryProducts($slug)
    {
        if ($slug) {
            $query = $this->productSubcategory
                ->whereSlug($slug)
                ->firstOrFail()
                ->products();
            return $query->latest()->paginate(100);
        }

        $query = Product::query();
        return $query->latest()->paginate(100);
    }

    public function one($id)
    {
        return $this->product::whereId($id)
            ->with('product_subcategories')
            ->first();
    }

    /**
     * Creates a product
     *
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        //dd($data['is_active']);
        $this->product->name = $data['name'];
        $this->product->slug = Str::slug($data['name']);
        $this->product->description = $data['description'];
        $this->product->price = $data['price'];
        $this->product->weight = $data['weight'];
        $this->product->quantity = $data['quantity'];
        $this->product->quantity_alert = $data['quantity_alert'];
        if (isset($data['image'])) {
            $this->product->image = $data['image'];
        }
        $this->product->is_active = isset($data['is_active']) ? $data['is_active'] : 1;
        $this->product->is_promoted = isset($data['is_promoted']) ? $data['is_promoted'] : 0;
        $this->product->is_deleted = 0;

        $is_saved = $this->product->save();
        if ($is_saved) {
            $this->product->product_subcategories()->attach($data['product_subcategories']);
            return true;
        }
        return false;
    }

    /**
     * Updates a product
     * @param array $data
     */
    public function update(array $data)
    {

        $product = $this->product::find($data['id']);

        $product->name = $data['name'];
        $product->slug = Str::slug($data['name']);
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->weight = $data['weight'];
        $product->quantity = $data['quantity'];
        $product->quantity_alert = $data['quantity_alert'];
        if (isset($data['image'])) {
            $product->image = $data['image'];
        }
        $product->is_active = isset($data['is_active']) ? $data['is_active'] : 0;
        $product->is_promoted = isset($data['is_promoted']) ? $data['is_promoted'] : 0;

        $is_saved = $product->save();
        if ($is_saved) {
            $product->product_subcategories()->sync($data['product_subcategories']);
            return true;
        }
        return false;
    }

    /**
     * Soft deletes a product
     */
    public function delete($id)
    {
        $product = $this->product::find($id);
        $product->is_deleted = 1;
        return $product->save();
    }
}
