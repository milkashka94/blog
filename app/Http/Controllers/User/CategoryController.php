<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Category $category)
    {
        //Контроллер категорий
        if ($category->id == null) {
            //Если не пришёл ид категории, значит нужно вывести список всех категорий
            $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
            return view('User.pages.categories', compact('categories'));
        } else {
            //Если получили ид категории, выводим посты конкретной категории
            $randomCategories = Category::withCount('posts')->get()->random(5); //запрос рандомных категорий (для сайдбара)
            $posts = $category->posts()->where('is_published', '=', '1')->orderBy('id', 'desc')->paginate(10); //запросим посты категории
            return view('User.pages.category', compact('posts', 'category', 'randomCategories'));
        }
    }
}
