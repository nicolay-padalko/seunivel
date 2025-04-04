<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;

    protected $table = 'read_answers';

    protected $fillable = [
        'r_answer_id',
        'r_answer',
        'question',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
