<?php

namespace App\Http\Controllers\User\Offer;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Offer\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        //Контроллер добавления поста пришедшего через форму предложения новости сайта
        $data = $request->validated();  //провалидируем данные
        try {
            DB::BeginTransaction(); //старт транзакциим
            if ($request->hasFile('image')) {
                //если пришёл файл, загружаем его
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            if (Auth()->user()->role_id < 3) {
                //если роль пользователя, добавившего новость < 3, то модерация не требуется, добавляем сразу
                $data['is_published'] = '1';
            } else {
                //пост отправил пользователь, пост будет ожидать модерации
                $data['is_published'] = '0';
            }
            $data['author'] = Auth::user()->id; //получаем ид автора поста
            if (!isset($data['image'])) {
                //УБРАТЬ
                $data['image'] = 'images/no_image.png';
            }
            $post = Post::create($data);    //добавляем пост в бд
            $post->tags()->sync($request->tags);    //синхронизируем теги
            DB::commit();   //проводим транзакцию, все ок
            return redirect()->route('main')->with('success', 'Пост поступил на модерацию');
        } catch (\Exception $exception) {
            DB::rollBack(); //что-то пошло не так, откатываем транзакцию
            return $exception->getMessage();
        }
    }
}
