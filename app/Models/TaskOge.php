<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskOge extends Model
{
    use HasFactory;
    protected $table = 'task_oge';

    public function topics()
    {
        return $this->hasMany(Topic::class, 'id_task_oge', 'id');
    }
}
