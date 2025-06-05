<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassHomework extends Model
{
    use HasFactory;
    protected $table = 'class_homework';
    protected $fillable = [
        'id_class',
        'id_homework',
        'create_date',
        'finish_date',
    ];
}
