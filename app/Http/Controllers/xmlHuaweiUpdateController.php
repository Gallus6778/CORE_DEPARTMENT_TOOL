<?php

namespace App\Http\Controllers;

use App\Imports\xmlHuaweiUpdateImport;
use App\Imports\hw_3G_dataImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class xmlHuaweiUpdateController extends Controller
{
    public function cdd3gIndex(){

        return view('BSS-operations.cdd3gUpdate');
    }

    public function cdd3gStore(Request $req){
        DB::table('xmlhuaweiupdate')->delete();

        // Extensions de fichier admis
        $this->validate($req,[
            'file'=> 'required|mimes:xlsx,xls,csv'
        ]);

// receive the excel path
        $file = $req->file;

        // Import this file
        Excel::import(new xmlHuaweiUpdateImport,$file);
        return back()->with('success','Excel data imported successfully.');
    }

    public function hw_3g_dataIndex(){
        return view('BSS-operations.hw-3G-data');
    }

    public function hw_3g_dataStore(Request $req){
        DB::table('hw_3g_data')->delete();

        // Extensions de fichier admis
        $this->validate($req,[
            'file'=> 'required|mimes:xlsx,xls,csv'
        ]);

// receive the excel path
        $file = $req->file;

        // Import this file
        Excel::import(new hw_3G_dataImport,$file);
        return back()->with('success','Excel data imported successfully.');
    }
}
