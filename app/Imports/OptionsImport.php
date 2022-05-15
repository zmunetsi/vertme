<?php

namespace App\Imports;

use App\Models\Option;
use Maatwebsite\Excel\Concerns\ToModel;

class OptionsImport implements ToModel
{

    protected $question_id;

    public function __construct ( $question_id ){
      $this->question_id = $question_id;
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Option([
            'option' => $row[0],
            'value'  => $row[1],
            'question_id' => $this->question_id ?? $row[2]
        ]);
    }
}
