<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assessment;

class AssessmentCategory extends Model
{
    use HasFactory;

    public function assessments()
    {
        return $this->belongsToMany(Assessment::class);
    }
}
