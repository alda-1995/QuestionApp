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

    public function test_data()
    {
        return $this->belongsTo(Test::class, 'test_id', 'test_id');
    }

    public function answer_data(){
        return $this->belongsTo(Answers::class, 'question_id', 'question_id');
    }
}
