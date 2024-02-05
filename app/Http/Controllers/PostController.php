<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(){
        $post = Post::find(1);
        $category = $post->category;

        dd($category->title);
    }
}
