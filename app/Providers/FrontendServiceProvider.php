<?php

namespace App\Providers;

use App\Models\Post;
use \App\Models\Category;

use App\Models\Tag;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;


class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        View::composer('frontend.articlesView', function ($view){
            $view->with('categories', Category::withCount('posts')->get());
            $view->with('last_posts', Post::latest()->limit(5)->get());

            $OldTags = Tag::all();
            $tags = [];
            foreach($OldTags as $tag){
                if($tag->posts()->get() != [])
                    $tags->push($tag);
            }
            $view->with('tags', $tags);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

    }
}
