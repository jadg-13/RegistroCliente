<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;

class CustomerExportController extends Controller
{
    public function export()
    {
        return Excel::download(new CustomerExport, 'customers.xlsx');
    }
}
