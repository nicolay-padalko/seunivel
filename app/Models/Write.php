<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Write extends Model
{
    use HasFactory;

    protected $table = 'write_answers';


    protected $fillable = [
        'w_answer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
