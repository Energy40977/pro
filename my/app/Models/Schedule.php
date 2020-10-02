<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = ['title', 'content','socials', 'tags', 'slider','image', 'cat_name', 'cat_id', 'author', 'slug', 'read', 'status', 'draft','created_at'];
}
