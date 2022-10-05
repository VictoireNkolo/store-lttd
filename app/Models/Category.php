<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
