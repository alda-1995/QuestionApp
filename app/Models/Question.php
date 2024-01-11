<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $primaryKey = 'question_id';
    protected $fillable = [
        'name',
        'question_a',
        'question_b',
        'question_c',
        'answer_correct',
        'test_id'
    ];
}
