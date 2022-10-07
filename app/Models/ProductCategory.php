<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 */
class ProductCategory extends Model
{

    public $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSubcategories()
    {
        return $this->hasMany(ProductSubcategory::class);
    }

}
