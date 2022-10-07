<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository
{

    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category::where(['is_deleted' => 0])
            ->orderBy('name')
            ->paginate(20);
    }

    public function one($id)
    {
        return $this->category::where(['id' => $id])->first();
    }

    /**
     * Creates a category
     *
     * @param array $arrData
     */
    public function store(array $arrData)
    {
        $this->category->name = $arrData['name'];
        $this->category->slug = Str::slug($arrData['name']);
        $this->category->description = $arrData['description'];
        $this->category->is_active = 1;
        $this->category->is_deleted = 0;
        return $this->category->save();
    }

    /**
     * Updates a category
     * @param array $arrData
     */
    public function update(array $arrData)
    {

        $category = $this->category::find($arrData['id']);

        $category->name = $arrData['name'];
        $category->slug = Str::slug($arrData['name']);
        $category->description = $arrData['description'];
        return $category->save();
    }

    /**
     * Soft deletes a category
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $category = $this->category::find($id);
        $category->is_deleted = 1;
        return $category->save();
    }
}
