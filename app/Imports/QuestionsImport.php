<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionsImport implements ToModel
{
    protected $assessment_id;

    public function __construct ( $assessment_id ){
      $this->assessment_id = $assessment_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'question' =>  $row[0],
            'assessment_id' => $this->assessment_id ?? $row[1]
        ]);
    }
}
