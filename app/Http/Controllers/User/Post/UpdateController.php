<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Post\UpdateRequest;
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
        //Контроллер обновления поста через сайт
        $data = $request->validated();  //провалидируем данные
        try {
            DB::BeginTransaction(); //стартуем транзакцию
            if (!isset($data['image'])) {
                if (($post->image) != ('images/no_image.png')) {
                    if (isset($data['deleteimg'])) {
                        //Новая катинка к посту не пришла, раньше картинка была, но активен чекбокс удаления
                        $data['image'] = 'images/no_image.png'; //Удалили картинку, установив noimage
                    } else {
                        //Новая картинка к посту не пришла, раньше картинка была, чекбокс удаления не активен
                        $data['image'] = $post->image;  //Оставили старую картинку
                    }
                } else {
                    //Новая картинка не пришла, но её и небыло ранее
                    $data['image'] = 'images/no_image.png'; //Оставляем noimage
                }
            } else {
                //Пришла новая картинка, загружаем её
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $post->update($data);   //обновляем пост
            $post->tags()->sync($request->tags);    //синхронизируем теги
            DB::commit();   //всё ок, проводим транзакцию
            return redirect()->route('post', $post->id)->with('success', 'Изменения внесены');
        } catch (\Exception $exception) {
            //В транзакции что-то пошло не так
            DB::rollBack(); //Откатываем изменения
            return $exception->getMessage();
        }
    }
}
