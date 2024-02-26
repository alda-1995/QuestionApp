<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResultPlayer extends Model
{
    use HasFactory;
    protected $primaryKey = 'test_result_id';
    protected $fillable = [
        'status',
        'user_id',
        'test_id',
        'is_approved'
    ];

    public function test_info()
    {
        return $this->belongsTo(Test::class, 'test_id', 'test_id');
    }

    public function answers(){
        return $this->hasMany(Answers::class, 'test_result_id', 'test_result_id');
    }
}
