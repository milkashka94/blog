<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('User.includes.MainMenu', function ($view) {
            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(4)->get());  //вывод полулярных постов в главном меню
            $view->with('popular_tags', Tag::withCount('posts')->orderBy('posts_count', 'desc')->limit(10)->get()); //вывод полулярных тегов в главно меню
            $view->with('popular_categories', Category::withCount('posts')->orderBy('posts_count', 'desc')->limit(10)->get());  //вывод полулярных тегов в главно меню
        });

        view()->composer('User.pages.index', function ($view) {
            //вывод топ постов по просмотрам в сайдбаре
            $view->with('viewed_posts', Post::orderBy('views', 'desc')->limit(5)->get());
        });

        view()->composer('User.includes.Footer', function ($view) {
            //вывод топ тегов по кол-ву постов в футере
            $view->with('popular_tags', Tag::withCount('posts')->orderBy('posts_count', 'desc')->limit(10)->get());
        });

        view()->composer('User.includes.TopPosts', function ($view) {
            //вывод топ постов по просмотрам
            $view->with('top_posts', Post::orderBy('views', 'desc')->limit(5)->get());
        });

        view()->composer('User.pages.index', function ($view) {
            //вывод популярных категорий в сайдбаре главной страницы
            $view->with('popular_categories', Category::withCount('posts')->orderBy('posts_count', 'desc')->limit(5)->get());
        });

        view()->composer('User.includes.PopularNews', function ($view) {
            //вывод комментируемых постов на главной
            $view->with('top_comments', Post::withCount('comments')->orderBy('comments_count', 'desc')->limit(4)->get());
        });

        view()->composer('Admin.includes.menu', function ($view) {
            //подсчёт постов ожидающих модерации для админки
            $view->with('moderation_posts', Post::where('is_published', '=', '0')->count());
        });

        view()->composer('admin.pages.index', function ($view) {
            $view->with('posts', Post::count());    //подсчёт кол-ва постов для главной админки
            $view->with('comments', Comment::count());  //подсчёт кол-ва комментов для главной админки
            $view->with('categories', Category::count());   //подсчёт кол-ва категорий для главной админки
            $view->with('users', User::count());    //подсчёт кол-ва юзеров для главной админки
        });

    }
}
