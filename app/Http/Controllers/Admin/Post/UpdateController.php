<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateRequest $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, Post $post)
    {
        //Контроллер, отвечающий за апдейт поста в админке
        $data = $request->validated();  //провалидируем данные
        try {
            DB::BeginTransaction(); //стартуем транзакцию
            //обновляем изображение поста
            if ($request->hasFile('image')) {
                $data['image'] = $post->updatePostImage($data['image'], isset($data['deleteimg']));
            } else {
                $data['image'] = $post->updatePostImage($data['image'] = false, isset($data['deleteimg']));
            }
            $post->update($data);   //обновляем пост
            $post->tags()->sync($request->tags);    //синхронизируем теги
            DB::commit();   //всё ок, проводим транзакцию
            return redirect()->route('posts.index')->with('success', 'Изменения внесены');
        } catch (\Exception $exception) {
            //В транзакции что-то пошло не так
            DB::rollBack(); //Откатываем изменения
            return $exception->getMessage();
        }
    }
}
