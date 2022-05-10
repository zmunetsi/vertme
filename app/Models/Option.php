<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'option',
        'value',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
