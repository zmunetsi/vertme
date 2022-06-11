<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assessment;
use App\Models\User;

class AssessmentTrack extends Model
{
    use HasFactory;

    protected $passMark =  0;

    protected $fillable = [
        'user_id',
        'assessment_id',
        'score',
        'completed',
        'started_at',
        'finished_at',
    ];

    public function setPassMark($passMark)
    {
        $this->passMark = $passMark;
    }

    public function getPassMark()
    {
        return $this->passMark;
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
