<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ugradeCapacityNokiaImport;

use App\Imports\upgradecapacitynokiaperspImport;
use Illuminate\Support\Facades\DB;

class upgradeCapacityNokiaController extends Controller
{
    public function upgradeCapacityNokiaPerspIndex(){

        
        $data = DB::table('upgradecapacitynokiapersp')->paginate(10);

        return view('BSS-operations.nokia2G.upgradeCapacityNokiaPersp', compact('data'));
    }

    public function upgradeCapacityNokiaPerspStore(Request $req){

        // ALWAYS DELETE THE CONTENT OF TABLE UPGRADECAPACITYNOKIA IN DATABASE
        DB::delete('delete from upgradecapacitynokiapersp');

        // Extensions de fichier admis
        $this->validate($req,[
            'file'=> 'required|mimes:xlsx,xls,csv'
        ]);

        // receive the excel path
        $file = $req->file;

        // Import this file
        Excel::import(new upgradecapacitynokiaperspImport,$file);

        return back()->with('success','Excel data imported successfully.');
    }

    public function downloadScript(){
        DB::table('upgradecapacitynokiapersp')->delete();

        return Response::download('storage/script-bsc.txt');
    }
}
