<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.editArticle', ['post'=> $post, 'categories'=>$categories, 'tags'=>$tags]);
    }
    public function  updatePost(Request $request, Post $post){
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->selectCategory;
        $post->image = $request->image;
        $post->save();

        if($request->has('tags'))
            $post->tags()->sync($request->tags);



        return redirect('/home');
    }
    public function createPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = new Post();
        return view('backend.createArticle', ['post'=> $post, 'categories'=>$categories, 'tags'=>$tags]);
    }

    public function  savePost(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '_');
        $post->description = "";
        $post->content = $request->content;
        $post->image = $request->image;
        $post->active = 0;
        $post->category_id = $request->selectCategory;
        $post->save();

        if($request->has('tags'))
            $post->tags()->attach($request->tags);

        return redirect('/home');
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect('/home');
    }


}
