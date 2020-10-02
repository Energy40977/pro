<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['cat_name', 'main', 'main_name', 'slug', 'tags'];

    public function category(){
        return $this->hasMany(Category::class);
    }
}
