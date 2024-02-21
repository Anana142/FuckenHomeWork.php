<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use Illuminate\Support\Str;

class BakendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllPosts(){
        $articles = Post::paginate(10);

        return view('backend.adminArticles', ['articles'=>$articles]);
    }
    public  function  editPosts(Post $post){

       return view('backend.editArticle', ['post'=> $post]);
    }
    public function  updatePost(Request $request, Post $post){
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();
        return redirect('/home');
    }
    public function createPost()
    {
        $post = new Post();
        return view('backend.createArticle', ['post'=> $post]);
    }
    public function  savePost(Request $request, Post $post){
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '_');
        $post->description = "";
        $post->content = $request->content;
        $post->category_id = 1;
        $post->image = "";
        $post->active = 0;
        $post->save();
        return redirect('/home');
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect('/home');
    }


}
