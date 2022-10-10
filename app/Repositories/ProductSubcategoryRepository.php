<?php


namespace App\Repositories;


use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Support\Str;

class ProductSubcategoryRepository
{

    /**
     * @var ProductCategory
     */
    private $productSubcategory;
    /**
     * @var ProductSubcategory
     */
    private $productCategory;

    public function __construct(
        ProductCategory $productSubcategory,
        ProductCategory $productCategory
    )
    {
        $this->productSubcategory = $productSubcategory;
        $this->productCategory = $productCategory;
    }

    public function getAll()
    {
        return $this->productSubcategory::where(['is_deleted' => 0])
            ->orderBy('name')
            ->paginate(50);
    }

    public function getProductCategoryProductSubcategories($product_category_id)
    {
        $query = $this->productCategory->whereId($product_category_id)
            ->firstOrFail()
            ->productSubcategories();
        return $query->paginate(50);
    }

    public function one($id)
    {
        return $this->productSubcategory::where(['id' => $id])
            ->with('product_category')
            ->first();
    }

    /**
     * Creates a productSubcategory
     *
     * @param array $arrData
     */
    public function store(array $arrData)
    {
        $this->productSubcategory->name = $arrData['name'];
        $this->productSubcategory->slug = Str::slug($arrData['name']);
        $this->productSubcategory->description = $arrData['description'];
        if (isset($arrData['image'])) {
            $this->productSubcategory->image = $arrData['image'];
        }
        $this->productSubcategory->product_category_id = $arrData['product_category_id'];
        $this->productSubcategory->is_active = 1;
        $this->productSubcategory->is_deleted = 0;
        return $this->productSubcategory->save();
    }

    /**
     * Updates a productSubcategory
     * @param array $arrData
     */
    public function update(array $arrData)
    {

        $productSubcategory = $this->productSubcategory::find($arrData['id']);

        $productSubcategory->name = $arrData['name'];
        $productSubcategory->slug = Str::slug($arrData['name']);
        $productSubcategory->description = $arrData['description'];
        $productSubcategory->product_category_id = $arrData['product_category_id'];
        if (isset($arrData['image'])) {
            $productSubcategory->image = $arrData['image'];
        }
        return $productSubcategory->save();
    }

    /**
     * Soft deletes a productSubcategory
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $productSubcategory = $this->productSubcategory::find($id);
        $productSubcategory->is_deleted = 1;
        return $productSubcategory->save();
    }
}
