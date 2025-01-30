<?php

namespace App\Exports;

use App\Models\Crm;
use Maatwebsite\Excel\Concerns\FromCollection;

class CrmExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Crm::all();
    }
}
