<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request, Post $post)
    {
        //Контроллер добавления поста в админке
        $data = $request->validated();  //провалидируем пришедшие данные
        try {
            DB::BeginTransaction(); //старт транзакциим
            if ($request->hasFile('image')) {
                //если к посту пришла картинка, загрузим ее в хранилище
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $data['author'] = Auth::user()->id;  //Присвоим создаваемому посту автора
            $post = Post::create($data);    //добавляем в БД пост
            $post->tags()->sync($request->tags);    //синхронизируем теги
            DB::commit();   //проводим транзакцию, все ок
            return redirect()->route('posts.index')->with('success', 'Пост создан успешно');
        } catch (\Exception $exception) {
            DB::rollBack(); //с транзакцией что-то пошло не так, откатываемся
            return $exception->getMessage();
        }

    }
}
