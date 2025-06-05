<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkTask extends Model
{
    use HasFactory;
    protected $table = 'homework_task';
    protected $fillable = [
        "id_homework",
        "id_task",
        "mark",
        "number",
    ];
}
