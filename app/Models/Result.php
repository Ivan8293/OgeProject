<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results';

    protected $fillable = [
        'id_student',
        'id_task',
        'solve_date',
        'mark',
        'result',
    ];
}
