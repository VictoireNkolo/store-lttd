<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $guarded = [];

    public function product_subcategories()
    {
        return $this->belongsToMany(ProductSubcategory::class);
    }

}
