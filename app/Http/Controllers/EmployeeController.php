<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Exports\EmployeeExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
class EmployeeController extends Controller
{
    public function addEmployee(){
        $employees=[
            ["name"=>"alice","email"=>"alice@gamil.com","phone"=>"3244567890","salary"=>3216323,"department"=>"Accounting"],
            ["name"=>"andrey","email"=>"andrey@gamil.com","phone"=>"3244567890","salary"=>3216323,"department"=>"Accounting"],
            ["name"=>"christian","email"=>"christian@gamil.com","phone"=>"3244567890","salary"=>3216323,"department"=>"Accounting"],
            ["name"=>"jovany","email"=>"jovany@gamil.com","phone"=>"3244567890","salary"=>3216323,"department"=>"Accounting"],
            ["name"=>"sylviane","email"=>"sylvaine@gamil.com","phone"=>"3244567890","salary"=>3216323,"department"=>"Accounting"],
            ["name"=>"arian","email"=>"arian@gamil.com","phone"=>"3244567890","salary"=>3216323,"department"=>"Accounting"]
        ];
        Employee::insert($employees);
        return "Records has created successfully";
    }
    public function exportIntoExcel(){
        // return Excel::download(new EmployeeExport,'employee.xlsx');
        return (new EmployeeExport)->download('employee.xlsx');
    }

    public function exportIntoCSV(){
        return Excel::download(new EmployeeExport,'employee.csv');
    }
}
