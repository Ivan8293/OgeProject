<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $table = 'tasks';

    // В Task
    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'topic_task', 'id_task', 'id_topic');
    }
}