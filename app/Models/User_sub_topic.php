<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_sub_topic extends Model
{
    use HasFactory;
    protected $table = 'users_sub_topics';

    protected $fillable = [
        'user_id',
        'sub_topic_id'
    ];
}
