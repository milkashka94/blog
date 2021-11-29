<?php

namespace App\Http\Controllers\Admin\Post\Moderate;

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
        //Контроллер, отвечающий за одобрение/редактирование поста, ожидающего модерацию в админке
        $data = $request->validated();  //провалидируем пришедшие данные
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
            return redirect()->route('moderation.index')->with('success', 'Пост проверен');
        } catch (\Exception $exception) {
            //В транзакции что-то пошло не так
            DB::rollBack(); //Откатываем изменения
            return $exception->getMessage();
        }
    }
}
