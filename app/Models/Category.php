<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 */
class Category extends Model
{

    public $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

}
