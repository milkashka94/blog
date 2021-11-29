<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title'];    //делаем поле title доступным для заполнения

    public function posts()
    {
        //установка связи категорий и постов
        return $this->hasMany(Post::class, 'category_id', "id");
    }
}
