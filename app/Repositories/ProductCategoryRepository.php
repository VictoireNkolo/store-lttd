<?php


namespace App\Repositories;


use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategoryRepository
{

    /**
     * @var ProductCategory
     */
    private $productCategory;

    public function __construct(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
    }

    public function getAll()
    {
        return $this->productCategory::where(['is_deleted' => 0])
            ->orderBy('name')
            ->paginate(20);
    }

    public function one($id)
    {
        return $this->productCategory::where(['id' => $id])->first();
    }

    /**
     * Creates a productCategory
     *
     * @param array $arrData
     */
    public function store(array $arrData)
    {
        $this->productCategory->name = $arrData['name'];
        $this->productCategory->slug = Str::slug($arrData['name']);
        $this->productCategory->description = $arrData['description'];
        $this->productCategory->icon = $arrData['icon'];
        $this->productCategory->is_active = 1;
        $this->productCategory->is_deleted = 0;
        return $this->productCategory->save();
    }

    /**
     * Updates a productCategory
     * @param array $arrData
     */
    public function update(array $arrData)
    {

        $productCategory = $this->productCategory::find($arrData['id']);

        $productCategory->name = $arrData['name'];
        $productCategory->slug = Str::slug($arrData['name']);
        $productCategory->description = $arrData['description'];
        $productCategory->icon = $arrData['icon'];
        return $productCategory->save();
    }

    /**
     * Soft deletes a productCategory
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $productCategory = $this->productCategory::find($id);
        $productCategory->is_deleted = 1;
        return $productCategory->save();
    }
}
