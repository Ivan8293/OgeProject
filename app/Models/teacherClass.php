<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacherClass extends Model
{
    use HasFactory;
    protected $table = 'teacher_class';
    protected $fillable = ['id_teacher', 'id_class'];

    public $timestamps = false; // Отключаем временные метки
}