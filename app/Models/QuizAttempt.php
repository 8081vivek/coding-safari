<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    protected $table = 'quiz_attempts';

    protected $fillable = [
        'course',
        'answers',
        'score',
        'name',
        'mobile',
        'email',
        'branch',
        'college',
        'date'
    
    ];
}