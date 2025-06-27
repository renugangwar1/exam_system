<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    protected $fillable = ['user_id', 'exam_id', 'submitted', 'score','rank', 'submitted_answers'];

   
    protected $casts = [
        'submitted_answers' => 'array',
        'submitted' => 'boolean',
    ];

   public function exam()
{
    return $this->belongsTo(Exam::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
