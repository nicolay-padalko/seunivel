<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadAnswer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'answer_id',
        'answer',
        'question',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
