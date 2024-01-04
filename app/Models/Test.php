<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'message_success',
        'message_fail',
        'status',
        'user_id',
    ];
}
