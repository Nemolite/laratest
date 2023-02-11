<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    /**
     * Таблица БД, ассоциированная с моделью.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * Теги, привязанные к задаче.
     */
    public function tags(){

        return $this->belongsToMany(Tags::class);
    }
}
