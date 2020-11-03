<?php

namespace App\Http\Controllers;

use App\Exports\trxBlockExport;
use App\Exports\trxBlockExport_bl_trx;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class trxBlockController extends Controller
{
    public function trxBlockIndex(){

        $ligne = DB::table('trx_blocks')->paginate(10);

        return view('BSS-operations.nokia2G.trx-block', compact('ligne'));
    }

    public function alltrxExport(){

        $ligne = DB::table('trx_blocks')->get();

        foreach($ligne as $data){
             if($data->trx_state != ''){
                DB::table('all_trx')->insert([
                    'bsc_names'=>$data->bsc_names,
                    'bcf_id'=>$data->bcf_id,
                    'oam_state'=>$data->oam_state,
                    'cells_names'=>$data->cells_names,
                    'trx_id'=>$data->trx_id,
                    'trx_state'=>$data->trx_state,
                    'recommandation'=>$data->recommandation
                ]);
             }
        }

        return Excel::download(new trxBlockExport, 'all_trx_state ' . date("F j, Y, g:i a") .'.xlsx' );

    }

    public function blockTrxExport(){
    // $ligne = DB::table('trx_blocks')->where('trx_state','!=','WO')->get();

        $ligne = DB::table('trx_blocks')->get();
        // DB::delete('delete from all-trx');

        // dd($ligne);
        foreach($ligne as $data){

            DB::table('bl_trx')->insert([
                'bsc_names'=>$data->bsc_names,
                'bcf_id'=>$data->bcf_id,
                'oam_state'=>$data->oam_state,
                'cells_names'=>$data->cells_names,
                'trx_id'=>$data->trx_id,
                'trx_state'=>$data->trx_state,
                'recommandation'=>$data->recommandation
            ]);

        }

        return Excel::download(new trxBlockExport_bl_trx, 'bl_trx_state ' . date("F j, Y, g:i a") .'.xlsx');

    }
    /////////////////////////////////////////////////////
    public function trxBlockStore(Request $request){

        // ALWAYS DELETE THE CONTENT OF TABLE UPGRADECAPACITYNOKIA IN DATABASE
        // dd($request);
        DB::delete('delete from trx_blocks');
        DB::delete('delete from all_trx');
        DB::delete('delete from bl_trx');

        // Extensions de fichier admis
        $this->validate($request,[
            'file'=> 'required|mimes:txt,log,xml'
        ]);

        // receive the txt path
        $file = $request->file;

        $file = fopen($file, 'a+');

        $contentOfFile = [];
        $count = 0;

        while(!feof($file)){

            // ENREGISTREMENT DANS UN TABLEAU TOUTES LES LIGNES DU CHIER TXT IMPORTER
            $contentOfFile [] = fgets($file);
            $count += 1;
        }

    // initiation des variables necessaires

    $oam_state = NULL;
    $trx_state = NULL;
    $cells_names = NULL;
    $bsc_names = NULL;
    $trx_id = NULL;
    $bcf_id = NULL;


    $q = 0;
    $j = 0;
    $k = 0;
    $progressBar = 0;
    $incProgress = $count/100;

        while($q < $count){

            $ligne = $contentOfFile[$q];

            $bsc_names = substr($ligne,-48,6);


            // BSC 01
            if($bsc_names == 'YABC01')
            {
                $ligneBcf = $contentOfFile[$q+9];

                $bcf = substr($ligneBcf,-75,3);

                if($bsc_names == 'YABC01' && $bcf == 'BCF'){

                    $j = $q + 9;
                    while($j < $count){
                        $ligneBcf = $contentOfFile[$j];

                        $bcf = substr($ligneBcf,-75,3);
                        if($bcf == 'BCF'){

                            // On recupere les $bcf_id et $oam_state
                            $bcf_id = substr($ligneBcf,-71,4);
                            $oam_state =substr($ligneBcf,-4,2);

                            $site = $bcf_id;

                            $k = $j + 2;

                            while($k < $count){

                                $ligneCellsNames = $contentOfFile[$k];
                                $characterCells = substr($ligneCellsNames,-3,1);

                                //  on recupere le nom de la cellule
                                $cells_names = substr($ligneCellsNames,-23,7);

                                $site = substr($cells_names,-5, 4);

                                if($characterCells == '-' && $site === $bcf_id){

                                    $m = $k + 2;
                                    // while($m < $count){

                                        // $ligneCellsNames = $contentOfFile[$m];


                                        $ligneTrx =$contentOfFile[$m];
                                        $trx = substr($ligneTrx,-51,3);
                                        $n = $m;
                                        while($trx == 'TRX'){

                                            $ligneTrx =$contentOfFile[$n];
                                            $trx = substr($ligneTrx,-51,3);


                                            // On recupere les $trx_id et $trx_state
                                            $trx_id = substr($ligneTrx,-46,2);
                                            $trx_state = substr($ligneTrx,-40,6);

                                            $lenOfTrxState = strlen($trx_state);

                                            $lenTrx = substr($trx_state, -$lenOfTrxState, 2);

                                            if ($lenTrx == 'BL') {

                                                DB::table('trx_blocks')->insert([
                                                    'bsc_names'=>$bsc_names,
                                                    'bcf_id'=>$bcf_id,
                                                    'oam_state'=>$oam_state,
                                                    'cells_names'=>$cells_names,
                                                    'trx_id'=>$trx_id,
                                                    'trx_state'=>$trx_state
                                                ]);
                                            }
                                            $n++;
                                        }

                                }
                                $k++;
                            }
                        }
                        $j++;
                    }
                }
            }

            // BSC 02
            elseif($bsc_names == 'YABC02'){
                $ligneBcf = $contentOfFile[$q+9];

                $bcf = substr($ligneBcf,-75,3);

                if($bsc_names == 'YABC02' && $bcf == 'BCF'){

                    $j = $q + 9;
                    while($j < $count){
                        $ligneBcf = $contentOfFile[$j];

                        $bcf = substr($ligneBcf,-75,3);
                        if($bcf == 'BCF'){

                            // On recupere les $bcf_id et $oam_state
                            $bcf_id = substr($ligneBcf,-71,4);
                            $oam_state =substr($ligneBcf,-4,2);

                            $site = $bcf_id;

                            $k = $j + 2;

                            while($k < $count){

                                $ligneCellsNames = $contentOfFile[$k];
                                $characterCells = substr($ligneCellsNames,-3,1);

                                //  on recupere le nom de la cellule
                                $cells_names = substr($ligneCellsNames,-23,7);

                                $site = substr($cells_names,-5, 4);

                                if($characterCells == '-' && $site === $bcf_id){

                                    $m = $k + 2;
                                    // while($m < $count){

                                        // $ligneCellsNames = $contentOfFile[$m];


                                        $ligneTrx =$contentOfFile[$m];
                                        $trx = substr($ligneTrx,-51,3);
                                        $n = $m;
                                        while($trx == 'TRX'){

                                            $ligneTrx =$contentOfFile[$n];
                                            $trx = substr($ligneTrx,-51,3);


                                            // On recupere les $trx_id et $trx_state
                                            $trx_id = substr($ligneTrx,-46,2);
                                            $trx_state = substr($ligneTrx,-40,6);

                                            $lenOfTrxState = strlen($trx_state);

                                            $lenTrx = substr($trx_state, -$lenOfTrxState, 2);

                                            if ($lenTrx == 'BL') {
                                                DB::table('trx_blocks')->insert([
                                                    'bsc_names'=>$bsc_names,
                                                    'bcf_id'=>$bcf_id,
                                                    'oam_state'=>$oam_state,
                                                    'cells_names'=>$cells_names,
                                                    'trx_id'=>$trx_id,
                                                    'trx_state'=>$trx_state
                                                ]);
                                            }
                                            $n++;
                                        }

                                }
                                $k++;
                            }
                        }
                        $j++;
                    }
                }
			}

				// BSC 03
            elseif($bsc_names == 'YABC03'){
                $ligneBcf = $contentOfFile[$q+9];

                $bcf = substr($ligneBcf,-75,3);

                if($bsc_names == 'YABC03' && $bcf == 'BCF'){

                    $j = $q + 9;
                    while($j < $count){
                        $ligneBcf = $contentOfFile[$j];

                        $bcf = substr($ligneBcf,-75,3);
                        if($bcf == 'BCF'){

                            // On recupere les $bcf_id et $oam_state
                            $bcf_id = substr($ligneBcf,-71,4);
                            $oam_state =substr($ligneBcf,-4,2);

                            $site = $bcf_id;

                            $k = $j + 2;

                            while($k < $count){

                                $ligneCellsNames = $contentOfFile[$k];
                                $characterCells = substr($ligneCellsNames,-3,1);

                                //  on recupere le nom de la cellule
                                $cells_names = substr($ligneCellsNames,-23,7);

                                $site = substr($cells_names,-5, 4);

                                if($characterCells == '-' && $site === $bcf_id){

                                    $m = $k + 2;
                                    // while($m < $count){

                                        // $ligneCellsNames = $contentOfFile[$m];


                                        $ligneTrx =$contentOfFile[$m];
                                        $trx = substr($ligneTrx,-51,3);
                                        $n = $m;
                                        while($trx == 'TRX'){

                                            $ligneTrx =$contentOfFile[$n];
                                            $trx = substr($ligneTrx,-51,3);


                                            // On recupere les $trx_id et $trx_state
                                            $trx_id = substr($ligneTrx,-46,2);
                                            $trx_state = substr($ligneTrx,-40,6);
                                            $lenOfTrxState = strlen($trx_state);

                                            $lenTrx = substr($trx_state, -$lenOfTrxState, 2);

                                            if ($lenTrx == 'BL') {
                                                DB::table('trx_blocks')->insert([
                                                    'bsc_names'=>$bsc_names,
                                                    'bcf_id'=>$bcf_id,
                                                    'oam_state'=>$oam_state,
                                                    'cells_names'=>$cells_names,
                                                    'trx_id'=>$trx_id,
                                                    'trx_state'=>$trx_state
                                                ]);
                                            }
                                            $n++;
                                        }

                                }
                                $k++;
                            }
                        }
                        $j++;
                    }
                }
            }


            // BSC 04
            elseif($bsc_names == 'YABC04'){
                $ligneBcf = $contentOfFile[$q+9];

                $bcf = substr($ligneBcf,-75,3);

                if($bsc_names == 'YABC04' && $bcf == 'BCF'){

                    $j = $q + 9;
                    while($j < $count){
                        $ligneBcf = $contentOfFile[$j];

                        $bcf = substr($ligneBcf,-75,3);
                        if($bcf == 'BCF'){

                            // On recupere les $bcf_id et $oam_state
                            $bcf_id = substr($ligneBcf,-71,4);
                            $oam_state =substr($ligneBcf,-4,2);

                            $site = $bcf_id;

                            $k = $j + 2;

                            while($k < $count){

                                $ligneCellsNames = $contentOfFile[$k];
                                $characterCells = substr($ligneCellsNames,-3,1);

                                //  on recupere le nom de la cellule
                                $cells_names = substr($ligneCellsNames,-23,7);

                                $site = substr($cells_names,-5, 4);

                                if($characterCells == '-' && $site === $bcf_id){

                                    $m = $k + 2;
                                    // while($m < $count){

                                        // $ligneCellsNames = $contentOfFile[$m];


                                        $ligneTrx =$contentOfFile[$m];
                                        $trx = substr($ligneTrx,-51,3);
                                        $n = $m;
                                        while($trx == 'TRX'){

                                            $ligneTrx =$contentOfFile[$n];
                                            $trx = substr($ligneTrx,-51,3);


                                            // On recupere les $trx_id et $trx_state
                                            $trx_id = substr($ligneTrx,-46,2);
                                            $trx_state = substr($ligneTrx,-40,6);
                                            $lenOfTrxState = strlen($trx_state);

                                            $lenTrx = substr($trx_state, -$lenOfTrxState, 2);

                                            if ($lenTrx == 'BL') {
                                                DB::table('trx_blocks')->insert([
                                                    'bsc_names'=>$bsc_names,
                                                    'bcf_id'=>$bcf_id,
                                                    'oam_state'=>$oam_state,
                                                    'cells_names'=>$cells_names,
                                                    'trx_id'=>$trx_id,
                                                    'trx_state'=>$trx_state
                                                ]);
                                            }
                                            $n++;
                                        }

                                }
                                $k++;
                            }
                        }
                        $j++;
                    }
                }
            }


            // BSC 05
            elseif($bsc_names == 'YABC05'){
                $ligneBcf = $contentOfFile[$q+9];

                $bcf = substr($ligneBcf,-75,3);

                if($bsc_names == 'YABC05' && $bcf == 'BCF'){

                    $j = $q + 9;
                    while($j < $count){
                        $ligneBcf = $contentOfFile[$j];

                        $bcf = substr($ligneBcf,-75,3);
                        if($bcf == 'BCF'){

                            // On recupere les $bcf_id et $oam_state
                            $bcf_id = substr($ligneBcf,-71,4);
                            $oam_state =substr($ligneBcf,-4,2);

                            $site = $bcf_id;

                            $k = $j + 2;

                            while($k < $count){

                                $ligneCellsNames = $contentOfFile[$k];
                                $characterCells = substr($ligneCellsNames,-3,1);

                                //  on recupere le nom de la cellule
                                $cells_names = substr($ligneCellsNames,-23,7);

                                $site = substr($cells_names,-5, 4);

                                if($characterCells == '-' && $site === $bcf_id){

                                    $m = $k + 2;
                                    // while($m < $count){

                                        // $ligneCellsNames = $contentOfFile[$m];


                                        $ligneTrx =$contentOfFile[$m];
                                        $trx = substr($ligneTrx,-51,3);
                                        $n = $m;
                                        while($trx == 'TRX'){

                                            $ligneTrx =$contentOfFile[$n];
                                            $trx = substr($ligneTrx,-51,3);


                                            // On recupere les $trx_id et $trx_state
                                            $trx_id = substr($ligneTrx,-46,2);
                                            $trx_state = substr($ligneTrx,-40,6);
                                            $lenOfTrxState = strlen($trx_state);

                                            $lenTrx = substr($trx_state, -$lenOfTrxState, 2);

                                            if ($lenTrx == 'BL') {
                                                DB::table('trx_blocks')->insert([
                                                    'bsc_names'=>$bsc_names,
                                                    'bcf_id'=>$bcf_id,
                                                    'oam_state'=>$oam_state,
                                                    'cells_names'=>$cells_names,
                                                    'trx_id'=>$trx_id,
                                                    'trx_state'=>$trx_state
                                                ]);
                                            }
                                            $n++;
                                        }

                                }
                                $k++;
                            }
                        }
                        $j++;
                    }
                }
            }


				// BSC 06
            elseif($bsc_names == 'YABC06'){
                $ligneBcf = $contentOfFile[$q+9];

                $bcf = substr($ligneBcf,-75,3);

                if($bsc_names == 'YABC06' && $bcf == 'BCF'){

                    $j = $q + 9;
                    while($j < $count){
                        $ligneBcf = $contentOfFile[$j];

                        $bcf = substr($ligneBcf,-75,3);
                        if($bcf == 'BCF'){

                            // On recupere les $bcf_id et $oam_state
                            $bcf_id = substr($ligneBcf,-71,4);
                            $oam_state =substr($ligneBcf,-4,2);

                            $site = $bcf_id;

                            $k = $j + 2;

                            while($k < $count){

                                $ligneCellsNames = $contentOfFile[$k];
                                $characterCells = substr($ligneCellsNames,-3,1);

                                //  on recupere le nom de la cellule
                                $cells_names = substr($ligneCellsNames,-23,7);

                                $site = substr($cells_names,-5, 4);

                                if($characterCells == '-' && $site === $bcf_id){

                                    $m = $k + 2;
                                    // while($m < $count){

                                        // $ligneCellsNames = $contentOfFile[$m];


                                        $ligneTrx =$contentOfFile[$m];
                                        $trx = substr($ligneTrx,-51,3);
                                        $n = $m;
                                        while($trx == 'TRX'){

                                            $ligneTrx =$contentOfFile[$n];
                                            $trx = substr($ligneTrx,-51,3);


                                            // On recupere les $trx_id et $trx_state
                                            $trx_id = substr($ligneTrx,-46,2);
                                            $trx_state = substr($ligneTrx,-40,6);

                                            $lenOfTrxState = strlen($trx_state);

                                            $lenTrx = substr($trx_state, -$lenOfTrxState, 2);

                                            if ($lenTrx == 'BL') {
                                                DB::table('trx_blocks')->insert([
                                                    'bsc_names'=>$bsc_names,
                                                    'bcf_id'=>$bcf_id,
                                                    'oam_state'=>$oam_state,
                                                    'cells_names'=>$cells_names,
                                                    'trx_id'=>$trx_id,
                                                    'trx_state'=>$trx_state
                                                ]);
                                            }
                                            $n++;
                                        }

                                }
                                $k++;
                            }
                        }
                        $j++;
                    }
                }
            }

				// BSC 07
            elseif($bsc_names == 'YABC07'){
                $ligneBcf = $contentOfFile[$q+9];

                $bcf = substr($ligneBcf,-75,3);

                if($bsc_names == 'YABC07' && $bcf == 'BCF'){

                    $j = $q + 9;
                    while($j < $count){
                        $ligneBcf = $contentOfFile[$j];

                        $bcf = substr($ligneBcf,-75,3);
                        if($bcf == 'BCF'){

                            // On recupere les $bcf_id et $oam_state
                            $bcf_id = substr($ligneBcf,-71,4);
                            $oam_state =substr($ligneBcf,-4,2);

                            $site = $bcf_id;

                            $k = $j + 2;

                            while($k < $count){

                                $ligneCellsNames = $contentOfFile[$k];
                                $characterCells = substr($ligneCellsNames,-3,1);

                                //  on recupere le nom de la cellule
                                $cells_names = substr($ligneCellsNames,-23,7);

                                $site = substr($cells_names,-5, 4);

                                if($characterCells == '-' && $site === $bcf_id){

                                    $m = $k + 2;
                                    // while($m < $count){

                                        // $ligneCellsNames = $contentOfFile[$m];


                                        $ligneTrx =$contentOfFile[$m];
                                        $trx = substr($ligneTrx,-51,3);
                                        $n = $m;
                                        while($trx == 'TRX'){

                                            $ligneTrx =$contentOfFile[$n];
                                            $trx = substr($ligneTrx,-51,3);


                                            // On recupere les $trx_id et $trx_state
                                            $trx_id = substr($ligneTrx,-46,2);
                                            $trx_state = substr($ligneTrx,-40,6);

                                            $lenOfTrxState = strlen($trx_state);

                                            $lenTrx = substr($trx_state, -$lenOfTrxState, 2);

                                            if ($lenTrx == 'BL') {
                                                DB::table('trx_blocks')->insert([
                                                    'bsc_names'=>$bsc_names,
                                                    'bcf_id'=>$bcf_id,
                                                    'oam_state'=>$oam_state,
                                                    'cells_names'=>$cells_names,
                                                    'trx_id'=>$trx_id,
                                                    'trx_state'=>$trx_state
                                                ]);
                                            }
                                            $n++;
                                        }

                                }
                                $k++;
                            }
                        }
                        $j++;
                    }
                }
            }
            $q ++;
        }

        fclose($file);
        return back()->with('success','Log data imported successfully.');
    }

}
