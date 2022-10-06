<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'postable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
