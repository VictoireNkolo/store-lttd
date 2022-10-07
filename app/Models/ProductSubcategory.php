<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{

    public $guarded = [];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
