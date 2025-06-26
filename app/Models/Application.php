<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
   'user_id',
        'exam_id',
        'name',
        'roll_no',
        'score',
        'rank',
        'submitted',
];
}
