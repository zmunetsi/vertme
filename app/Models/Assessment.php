<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\AssessmentCategory;


class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status' => 1,
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function categories()
    {
        return $this->belongsToMany(AssessmentCategory::class);
        
    }

    
}
