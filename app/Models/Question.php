<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assessment;
use App\Models\Option;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'assessment_id',
    ];


    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

}
