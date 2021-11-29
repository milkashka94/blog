<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'post_id', 'text'];   //установка полей доступными для заполнения
    protected $with = ['user']; //установка жадной загрузки

    public function user()
    {
        //установка связи комментов и пользователя
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function post()
    {
        //установка связи комментов и поста
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function getDate()
    {
        //функция приведения даты коммента к нормальному формату
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y H:i:s');
    }
}
