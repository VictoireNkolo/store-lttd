<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
