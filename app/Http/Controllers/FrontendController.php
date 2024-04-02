<?php

namespace App\Http\Controllers;

use App\Events\PostShow;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getAllPosts(){
        $articles = Post::paginate(10);
        $categories = \App\Models\Category::withCount('posts')->get();
        $last_posts = Post::latest()->limit(5)->get();

        $OldTags = Tag::withCount('posts')->get();
        $tags = $OldTags->where('posts_count','>',0);

        return view('frontend.articlesView', compact('articles', 'categories', 'last_posts', 'tags'));
    }
    public function getOnePost( $id){
        $post = Post::where('id', $id)->first();
        PostShow::dispatch($post);
        $readingTime = $post->calculateReadingTime($post->content);
        $categories = \App\Models\Category::withCount('posts')->get();
        $last_posts = Post::latest()->limit(5)->get();
        $OldTags = Tag::withCount('posts')->get();
        $tags = $OldTags->where('posts_count','>',0);
        $postTags = $post->tags();

        return view('frontend.oneArticleView', ['article'=> $post, 'categories' => $categories, 'readingTime'=>$readingTime, 'last_posts'=>$last_posts, 'tags'=>$tags, 'postTags'=>$postTags]);
    }

    public function postsWithCategory($id){
        $posts = Post::where('category_id', $id)->paginate(10);
        $categories = \App\Models\Category::withCount('posts')->get();
        $last_posts = Post::latest()->limit(5)->get();
        $OldTags = Tag::withCount('posts')->get();
        $tags = $OldTags->where('posts_count','>',0);

        return view('frontend.articlesView', ['articles'=>$posts, 'categories' => $categories, 'last_posts'=>$last_posts, 'tags'=>$tags]);
    }
    public function postsWithTag($name){
        $tag = Tag::where('name', $name)->first();
        $categories = \App\Models\Category::withCount('posts')->get();
        $last_posts = Post::latest()->limit(5)->get();
        $OldTags = Tag::withCount('posts')->get();
        $tags = $OldTags->where('posts_count','>',0);
        $posts = $tag->posts()->paginate(10);


        return view('frontend.articlesView', ['articles'=>$posts, 'categories' => $categories, 'last_posts'=>$last_posts, 'tags'=>$tags]);
    }
}
