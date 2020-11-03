<?php

namespace App\Exports;

use App\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeExport implements FromCollection, WithHeadingRow
{

    public function heading():array{
        return[
            "Id",
            "Name",
            "Email",
            "Phone",
            "Salary",
            "Department"
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Employee::getEmployee());
        // return Employee::all();
    }
}
