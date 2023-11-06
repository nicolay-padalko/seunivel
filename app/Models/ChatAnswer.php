<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
