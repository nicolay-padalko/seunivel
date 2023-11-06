<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'attempt',
        'grade',
        'review',
        'timeStart',
        'timeEnd'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
