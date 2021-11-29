<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {
        //Контроллер просмотра поста на сайте
        $categories = Category::get();  //получение списка категорий
        if ($categories->count() > 5) {
            //Если категорий более 5, запрашиваем 5 рандомных категорий
            $randomCategories = $categories->random(5);
        } else {
            //Если менее 5, то выводим столько сколько есть
            $randomCategories = $categories->random($categories->count());
        }
        $post->views += 1;  //Увеличиваем счётчик просомтров
        $post->update(); //обновляем данные
        return view('User.pages.post.show', compact('post', 'randomCategories'));
    }
}
