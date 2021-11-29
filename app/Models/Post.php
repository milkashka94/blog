<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'content', 'category_id', 'image', 'author', 'is_published']; //установка полей доступными для заполнения
    protected $with = ['category']; //установка жадной загрузки

    public function category()
    {
        //установка связи поста и категории
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        //установка связи поста и тегов
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function user()
    {
        //установка связи поста и пользователя
        return $this->belongsTo(User::class,'author', 'id');
    }

    public function comments()
    {
        //установка связи поста и комментов
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function getDate()
    {
        //функция приведения даты поста к нормальному виду
        Carbon::setLocale('ru_RU');
        return Carbon::parse($this->created_at);
        //return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }

    public function updatePostImage($image, $save)
    {
        if ($image) {
            //Пришло новое изображение, загружаем
            $image = Storage::disk('public')->put('/images', $image);
        } else {
            if ($this->image == 'images/no_image.png') {
                //изображение не пришло, но его и небыло ранее
                $image = 'images/no_image.png';
            } else {
                //изображение не пришло, присутствует ранее загруженное
                if ($save) {
                    $image = 'images/no_image.png';
                } else {
                    $image = $this->image;
                }
            }
        }
        return $image;
    }
}
