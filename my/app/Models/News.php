<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'content', 'tags', 'image', 'cat_name', 'cat_id', 'author', 'slug', 'read','slider', 'status', 'draft','created_at'];

}
