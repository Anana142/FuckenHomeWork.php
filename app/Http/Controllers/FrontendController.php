<?php

namespace App\Http\Controllers;

use App\Events\PostShow;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getAllPosts(){
        $articles = \App\Models\Post::all();
        $categories = \App\Models\Category::withCount('posts')->get();
        $last_posts = Post::latest()->limit(5)->get();
        $tags = Tag::all();

        return view('frontend.articlesView', compact('articles', 'categories', 'last_posts', 'tags'));
    }
    public function getOnePost( $id){
        $posts = \App\Models\Post::all();
        $post = $posts->where('id', $id)->first();
        PostShow::dispatch($post);
        $readingTime = $post->calculateReadingTime($post->content);
        $categories = \App\Models\Category::withCount('posts')->get();
        $last_posts = Post::latest()->limit(5)->get();

        return view('frontend.oneArticleView', ['article'=> $post, 'categories' => $categories, 'readingTime'=>$readingTime, 'last_posts'=>$last_posts]);
    }

    public function postsWithCategory($id){
        $posts = \App\Models\Post::all();
        $posts = $posts->where('category_id', $id)->all();
        $categories = \App\Models\Category::withCount('posts')->get();
        $last_posts = Post::latest()->limit(5)->get();

        return view('frontend.articlesView', ['articles'=>$posts, 'categories' => $categories, 'last_posts'=>$last_posts]);
    }
}
