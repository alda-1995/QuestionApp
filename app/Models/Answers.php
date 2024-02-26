<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;
    protected $primaryKey = 'answer_id';
    protected $fillable = [
        'response_question',
        'status',
        'test_result_id',
        'question_id'
    ];
}
