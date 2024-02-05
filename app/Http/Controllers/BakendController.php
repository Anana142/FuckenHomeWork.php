<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class BakendController extends Controller
{
    public function getAllPosts(){
        $articles = Post::all();

        return view('backend.adminArticles', ['articles'=>$articles]);
    }
    public  function  EditPosts($id){
        $posts = \App\Models\Post::all();
        $post = $posts->where('id', $id)->first();
        $categories = \App\Models\Category::withCount('posts')->get();

        return view('backend.editArticle', ['article'=> $post]);
    }
}
