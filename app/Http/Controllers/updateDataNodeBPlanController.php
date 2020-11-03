<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\updateDataNodeBPlanImport;
use Illuminate\Support\Facades\DB;

class updateDataNodeBPlanController extends Controller
{
    public function updateDataNodeBPlanIndex(){
        $ligne = DB::table('updatedatanodebplan')->paginate(4);
        return view('BSS-operations.updateData_BTS_IP_PLANNING_NODEB',compact('ligne'));
    }
    public function updateDataNodeBPlanStore(Request $req){
         DB::table('updatedatanodebplan')->delete();

        // Extensions de fichier admis
        $this->validate($req,[
            'file'=> 'required|mimes:xlsx,xls,csv'
        ]);

        // receive the excel path
        $file = $req->file;
        Excel::import(new updateDataNodeBPlanImport(), $file);

        return back()->with('success','Excel data imported successfully.');
    }

}
