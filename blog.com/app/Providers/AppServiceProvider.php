<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\Category;
use App\Post;
use App\Tag;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View::share('name', 'Zent Group');   //bien name duoc dung ở các view
        $category = Category::where('parent_id', 0)->get();
        View::share('category_parent', $category);

        $categories = Category::get();
        View::share('categories', $categories);
        
        $posts = Post::orderBy('id','desc')->get();
        View::share('posts', $posts);

        $tags = Tag::get();
        View::share('tags', $tags);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
