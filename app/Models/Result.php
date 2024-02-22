<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $primaryKey = 'result_id';
    protected $fillable = [
        'status',
        'user_id',
        'test_id'
    ];
}
