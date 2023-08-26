<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerExport implements FromCollection
{

    protected $registros;

    public function __construct($registros)
    {
        $this->registros = $registros;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->registros);
    }


    //original
    /**
    * @return \Illuminate\Support\Collection
    */
    
   /* public function collection()
    {
        return Customer::all();
    }*/
}
