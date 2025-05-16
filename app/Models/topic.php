<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    use HasFactory;
    protected $table = 'topics';
    protected $primaryKey = 'topic_id';

    // Определение связи с моделью TaskOge
    public function taskOge()
    {
        return $this->belongsTo(TaskOge::class, 'id_task_oge', 'id');
    }
    // В Topic
    public function tasks()
{
    return $this->belongsToMany(
        Task::class,
        'topic_task',   // имя промежуточной таблицы
        'id_topic',     // внешний ключ для Topic в таблице pivot
        'id_task',      // внешний ключ для Task в таблице pivot
        'topic_id',           // локальный ключ Topic (обычно 'id', если у вас другое — укажите)
        'task_id'       // локальный ключ Task (если у вас не 'id', а 'task_id')
    );
}
}
