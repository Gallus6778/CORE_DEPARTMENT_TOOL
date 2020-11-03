<?php

namespace App\Http\Controllers;

use App\Imports\updateScriptConfigImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class updateScriptConfig extends Controller
{
    public function updateScriptConfigIndex(){
        $ligne = DB::table('updateScriptConfig')->paginate(5);
        return view('BSS-operations.updateScriptConfig',compact('ligne'));
    }

    public function updateScriptConfigStore(Request $req){

        DB::table('updatescriptconfig')->delete();
        // Extensions de fichier admis
        $this->validate($req,[
            'file'=> 'required|mimes:xlsx,xls,csv'
        ]);

        // receive the excel path
        $file = $req->file;

        // Import this file
        Excel::import(new updateScriptConfigImport,$file);

        return back()->with('success','Excel data imported successfully.');
    }
}
