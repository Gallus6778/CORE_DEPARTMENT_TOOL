<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\updateData_npgepImport;

class updateDataController extends Controller
{
    public function updateData_npgepIndex(){
        return view('BSS-operations.updateData_npgep');
    }
    public function updateData_npgepStore(Request $req){

//        DB::table('updatedata_npgep')
        // Extensions de fichier admis
        $this->validate($req,[
            'file'=> 'required|mimes:xlsx,xls,csv'
        ]);

        // receive the excel path
        $file = $req->file;
        Excel::import(new updateData_npgepImport(), $file);

        return back()->with('success','Excel data imported successfully.');

    }
}
