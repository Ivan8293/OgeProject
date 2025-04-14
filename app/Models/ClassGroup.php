<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = ['name', 'number'];

    public $timestamps = false; // Отключаем временные метки
    protected $primaryKey = 'class_id';
}
