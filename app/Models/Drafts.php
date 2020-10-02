<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drafts extends Model
{
    protected $table = 'drafts';
    protected $fillable = ['title', 'content', 'demo_id','tags', 'image', 'cat_name', 'cat_id', 'author', 'slug', 'read', 'status', 'draft'];
}
