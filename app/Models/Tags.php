<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    /**
     * Таблица БД, ассоциированная с моделью.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Задачи, привязанные тегу.
     */
    public function tasks()
    {
        return $this->belongsToMany(Tasks::class);
    }
}
