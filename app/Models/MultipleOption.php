<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleOption extends Model
{
    use HasFactory;

    protected $table = 'multipleOption_answers';

    protected $fillable = [
        'mo_answer_id',
        'mo_answer',
        'question',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
