<?php

namespace App\Http\Controllers\User\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Comments\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Post $post
     * @param StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post, StoreRequest $request)
    {
        //Контроллер добавления комментария к посту
        $data = $request->validated();  //провалидируем данные
        $data['user_id'] = auth()->user()->id;  //добавляем ид автора
        $data['post_id'] = $post->id;   //добавляем ид поста
        Comment::create($data); //добавляем коммент
        return redirect()->route('post', $post->id);
    }
}
