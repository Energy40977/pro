<?php

namespace App\Http\Controllers\System;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function category(){
        $cats = Category::all();
        return view ('system.category.index', compact('cats'));
    }
    public function newcat(Request $request){
        $validator = $request->validate([
            'cat_name' => 'required|unique:category',
            'main' => 'required',
            'tags' => 'required'

        ], [
            'cat_name.required' => 'Kateqoriya adını daxil edin',
            'cat_name.unique' => 'Kateqoriya adını mövcuddur',
            'main.required' => 'Alt kateqoriyanı seçin',
            'tags.required' => 'Etiketləri daxil edin'
        ]);
        $slug = str_slug($request['cat_name']);
        $main_name = Category::where('id', $request['main'])->first();
        $newcat = Category::create([
            'cat_name' => $request['cat_name'],
            'main' => $request['main'],
            'slug' => $slug,
            'main_name' => $main_name['cat_name'],
            'tags' => $request['tags']
        ]);
    }
    public function editcat(Request $request){

        $validator = $request->validate([
            'cat_name' => 'required',
            'main' => 'required',
            'tags' => 'required'

        ], [
            'cat_name.required' => 'Kateqoriya adını daxil edin',
            'main.required' => 'Alt kateqoriyanı seçin',
            'tags.required' => 'Etiketləri daxil edin'
        ]);
        $slug = str_slug($request['cat_name']);
        $main_name = Category::where('id', $request['main'])->first();
        $newcat = Category::where('id', $request['id'])->update([
            'cat_name' => $request['cat_name'],
            'main' => $request['main'],
            'slug' => $slug,
            'main_name' => $main_name['cat_name'],
            'tags' => $request['tags']
        ]);
    }
    public function deletecat(Request $request){
        Category::where('id', $request['id'])->delete();
    }
}
