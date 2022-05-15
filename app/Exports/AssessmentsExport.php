<?php

namespace App\Exports;

use App\Models\Assessment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssessmentsExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'ID',
            'User',
            'Title',
            'Description',
            'Created At',
            'Updated At'
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Assessment::all();
    }

    

}
