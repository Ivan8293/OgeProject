<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    use HasFactory;
    protected $table = 'topics';

    // Определение связи с моделью TaskOge
    public function taskOge()
    {
        return $this->belongsTo(TaskOge::class, 'id_task_oge', 'id');
    }
}
