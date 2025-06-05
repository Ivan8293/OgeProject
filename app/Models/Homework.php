<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    protected $table = "homeworks";
    protected $primaryKey = 'homework_id';
    protected $fillable = [
        "id_teacher",
        "id_topic",
        "name",
        "description",
        "level",
    ];
}
