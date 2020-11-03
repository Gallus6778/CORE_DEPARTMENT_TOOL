<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\upgradeFrequency;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class ScriptController extends Controller
{
    public function upgradeFrequencyIndex(){

        $data = DB::table('upgradeFrequency')->get();//->orderBy('id','DESC')->get();
        return view('BSS-operations.operations-home', compact('data'));
/////////////////////////////
// $nom1 = 'noah';
//         $nom2='agoua';
//         $prenom1='gallus';
//         $prenom2='aristide';

//         $data =[
//             'nom1'=> $nom1,
//             'nom2'=> $nom2,
//             'prenom1'=> $prenom1,
//             'prenom2'=> $prenom2
//         ];

//         $script ='//-----------------************* Titres : Mes noms*****************-----------------
//         Mes noms sont "' . $data['nom1'] . '" et "' . $data['nom2'] . '"
//         Et mes prenoms sont "' . $data['prenom1'] . ' et "' . $data['prenom2'] . '"';


//         $monFichier = fopen('../storage/upgrade-frequency.txt', 'a+');

//         // ECRIRE DANS LE FICHIER
//         // fputs($monFichier,$info);
//         fputs($monFichier,$script);


//         // RECUPERATION LIGNE PAR LIGNE DU CONTENU DU FICHIER CONTENEUR.TXT
//         $result = file_get_contents('../storage/upgrade-frequency.txt');

//         fclose($monFichier);

//         $nameOfFile = 'upgrade-frequency.txt';

//         return response()->download($result, $nameOfFile);
///////////////////////////////////

    }

    public function upgradeFrequencyStore(Request $request){
        // $file =$request->file('file');

        // Excel::import(new upgradeFrequency, $file);
        DB::delete('delete from upgradeFrequency');
        $this->validate($request,[
            'select_file'=> 'required|mimes:xls,xlsx,csv'
        ]);

        // $path = $request->file('select_file');//->getRealPath();
        $path = $request->select_file;//->getRealPath();
        $data = Excel::import(new upgradeFrequency,$path);//->get();
        echo 'import reussi';
    }
}
