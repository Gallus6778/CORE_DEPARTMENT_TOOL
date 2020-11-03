<?php

namespace App\Http\Controllers;

use App\Imports\updateDataBTSPlanImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class updateDataBTSPlanController extends Controller
{
    public function updateDataBTSPlanIndex(){
     return view('BSS-operations.updateData_BTS_IP_PLANNING_BTS');
    }

    public function updateDataBTSPlanStore(Request $req){
        DB::table('bts_ip_planning')->delete();

        // Fichiers admis
        $this->validate($req,[
            'file'=> 'required|mimes:xlsx,xls,csv'
        ]);

        $file = $req->file;
        Excel::import(new updateDataBTSPlanImport(), $file);

        return back()->with('success','Excel data imported successfully.');
    }
}
