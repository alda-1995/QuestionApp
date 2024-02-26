<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $primaryKey = 'test_id';
    protected $fillable = [
        'name',
        'description',
        'message_success',
        'message_fail',
        'status',
        'user_id',
    ];

    public function questions(){
        return $this->hasMany(Question::class, 'test_id', 'test_id');
    }

    public function test_result(){
        return $this->belongsTo(TestResultPlayer::class, 'test_id', 'test_id');
    }
}
