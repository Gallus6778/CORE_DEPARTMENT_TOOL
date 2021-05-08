<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class upgradeCapacityNokiaUpdateController extends Controller
{
    public function upgradeCapacityNokiaUpdateIndex(){
        $data = DB::table('upgradecapacitynokiaupdate')->paginate(5);

        return view('BSS-operations.upgradeCapacityUpdate', compact('data'));
    }

    public function upgradeCapacityNokiaUpdateStore(Request $request){

        // ALWAYS DELETE THE CONTENT OF TABLE UPGRADECAPACITYNOKIA IN DATABASE
        DB::delete('delete from upgradecapacitynokiaupdate');

        // Extensions de fichier admis

//        $this->validate($request,[
//            'file'=> 'required|mimes:txt,log,xml|max:49999999'
//        ]);

        // receive the excel path
//        $file = $request->file;

        $file = "C:\wamp64\www\New-Laravel-Project\CoreDepartmentTool\public\zero.log";

//        $file = $_ENV(USERNAME);
//        $file = 'C:\Users\NOAH Gallus\Bureau\zero.log';


//        dd($file);

        // Add data into database
        $file = fopen($file, 'a+');

        $contentOfFile = [];
        $count = 0;

        while(!feof($file)){
            $contentOfFile [] = fgets($file);
            $count += 1;
        }

        // initiation des variables necessaires

        $bsc_names = NULL;
        $bsc_name = NULL;
        $bcf_id = NULL;
        $bts_id = NULL;
        $adm_state = NULL;
        $op_state = NULL;
        $cells_names = NULL;
        $trx_id = NULL;
        $bcsu_id = NULL;
        $trx_state = NULL;
        $trx_power = NULL;
        $d_name = NULL;

        $id = 1;

        $q = 0;
        $j = 1;
        $k = 0;

        $compteurLigneBsc = 1;

        while($q < $count){

            $ligne = $contentOfFile[$q];

            $bsc_names = substr($ligne,-48,6);
            $bsc_name = substr($ligne,-48,6);

            if ($bsc_names == 'YABC01'){

                $j = $q +6;
                $ligne_bcf_id = $contentOfFile[$j];

                $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                if ($bsc_names == 'YABC01' && $bcf == 'BCF'){

                    $compteurLigneBcf = $j;
                    while ($j < $count && $bsc_name <> 'YABC02'){

                        //////////////////////////////////////////
                        $ligne = $contentOfFile[$j];

                        $bsc_name = substr($ligne,-48,6);
                        /// //////////////////////////////////////

                        $ligne_bcf_id = $contentOfFile[$j];

                        $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                        if ($bcf == 'BCF'){
                            $bcf_id = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 4, 4);
                            $adm_state = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 28, 8);
                            $op_state = substr($ligne_bcf_id, -8, 6);

                            //Ligne BTS ET CELL NAME
                            $compteurBts = $j+2;
                            $compteurTrx = $j+3;
                            $compteurBcsu = $j+4;
                            $compteurGtrx = $j + 6;
                            $compteurEtrx = $j + 7;
                            $compteurFreq = $j + 10;
                            $compteurTrxPower = $j + 18;
                            $compteurDname1 = $j + 21;
                            $compteurDname2 = $j + 24;

                            $ligne_bts_id = $contentOfFile[$compteurBts];
                            $ligne_trx_id = $contentOfFile[$compteurTrx];
                            $ligne_bcsu_id = $contentOfFile[$compteurBcsu];
                            $ligneGtrx = $contentOfFile[$compteurGtrx];
                            $ligneEtrx = $contentOfFile[$compteurEtrx];
                            $ligneFreq = $contentOfFile[$compteurFreq];
                            $ligneTrxPower = $contentOfFile[$compteurTrxPower];
                            $ligneDname1 = $contentOfFile[$compteurDname1];
                            $ligneDname2 = $contentOfFile[$compteurDname2];

                            $bts = substr($ligne_bts_id, -strlen($ligne_bcf_id), 3);
                            $bts_id = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 4, 4);

                            $cells_names = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 10, 7);

                            $trx = substr($ligne_trx_id, -strlen($ligne_trx_id), 3);
                            $trx_id = substr($ligne_trx_id, -strlen($ligne_trx_id) + 4, 3);
                            $trx_state = substr($ligne_trx_id, -8, 6);

                            $bcsu = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 1, 4);
                            $bcsu_id = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 6, 1);

                            $gtrx = substr($ligneGtrx, -strlen($ligneGtrx), 4);
                            $gtrx_state = substr($ligneGtrx, -strlen($ligneGtrx) + 10, 1);

                            $etrx = substr($ligneEtrx, -strlen($ligneEtrx), 4);
                            $etrx_state = substr($ligneEtrx, -strlen($ligneEtrx) + 10, 1);
                            $pref_state = substr($ligneEtrx, -3, 1);

                            $freq = substr($ligneFreq, -strlen($ligneFreq), 4);
                            $freqValue = substr($ligneFreq, -strlen($ligneFreq) + 8, 3);
                            $tsc = substr($ligneFreq, -strlen($ligneFreq) + 19, 3);
                            $tscValue = substr($ligneFreq, -strlen($ligneFreq) + 25, 1);

                            $trx_power = substr($ligneTrxPower, -strlen($ligneTrxPower) + 13, 5);

                            $d_name1 = substr($ligneDname1, -strlen($ligneDname1) + 30, 5);
                            $d_name2 = substr($ligneDname2, -strlen($ligneDname2) + 30, 5);

                            $d_nameInitialChar1 = substr($ligneDname1, -strlen($ligneDname1), 4);
                            $d_nameInitialChar2 = substr($ligneDname2, -strlen($ligneDname2), 4);

                            $bcsu_ip = null;
                            $bcsu_id = '' . $bcsu_id . '';

                            switch ($bcsu_id) {
                                case '1':
                                    $bcsu_ip = '10.92.42.2';
                                    break;
                                case '2':
                                    $bcsu_ip = '10.92.42.3';
                                    break;
                                case '3':
                                    $bcsu_ip = '10.92.42.1';
                                    break;
                            }

                            // dd($bcsu_id);

                            if ($d_nameInitialChar2 == 'D-CH'){

                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name2,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);

                            }elseif ($d_nameInitialChar1 == 'D-CH'){
                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name1,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);
                            }
                            $id++;
                        }
                        $compteurLigneBcf++;
                        $j++;
                    }
                }
            }

            elseif ($bsc_names == 'YABC02'){

                $j = $q +6;
                $ligne_bcf_id = $contentOfFile[$j];

                $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                if ($bsc_names == 'YABC02' && $bcf == 'BCF'){

                    $compteurLigneBcf = $j;
                    while ($j < $count && $bsc_name <> 'YABC03'){

                        //////////////////////////////////////////
                        $ligne = $contentOfFile[$j];

                        $bsc_name = substr($ligne,-48,6);
                        /// //////////////////////////////////////

                        $ligne_bcf_id = $contentOfFile[$j];

                        $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                        if ($bcf == 'BCF'){
                            $bcf_id = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 4, 4);
                            $adm_state = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 28, 8);
                            $op_state = substr($ligne_bcf_id, -8, 6);

                            //Ligne BTS ET CELL NAME
                            $compteurBts = $j+2;
                            $compteurTrx = $j+3;
                            $compteurBcsu = $j+4;
                            $compteurGtrx = $j + 6;
                            $compteurEtrx = $j + 7;
                            $compteurFreq = $j + 10;
                            $compteurTrxPower = $j + 18;
                            $compteurDname1 = $j + 21;
                            $compteurDname2 = $j + 24;

                            $ligne_bts_id = $contentOfFile[$compteurBts];
                            $ligne_trx_id = $contentOfFile[$compteurTrx];
                            $ligne_bcsu_id = $contentOfFile[$compteurBcsu];
                            $ligneGtrx = $contentOfFile[$compteurGtrx];
                            $ligneEtrx = $contentOfFile[$compteurEtrx];
                            $ligneFreq = $contentOfFile[$compteurFreq];
                            $ligneTrxPower = $contentOfFile[$compteurTrxPower];
                            $ligneDname1 = $contentOfFile[$compteurDname1];
                            $ligneDname2 = $contentOfFile[$compteurDname2];

                            $bts = substr($ligne_bts_id, -strlen($ligne_bcf_id), 3);
                            $bts_id = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 4, 4);

                            $cells_names = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 10, 7);

                            $trx = substr($ligne_trx_id, -strlen($ligne_trx_id), 3);
                            $trx_id = substr($ligne_trx_id, -strlen($ligne_trx_id) + 4, 3);
                            $trx_state = substr($ligne_trx_id, -8, 6);

                            $bcsu = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 1, 4);
                            $bcsu_id = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 6, 1);

                            $gtrx = substr($ligneGtrx, -strlen($ligneGtrx), 4);
                            $gtrx_state = substr($ligneGtrx, -strlen($ligneGtrx) + 10, 1);

                            $etrx = substr($ligneEtrx, -strlen($ligneEtrx), 4);
                            $etrx_state = substr($ligneEtrx, -strlen($ligneEtrx) + 10, 1);
                            $pref_state = substr($ligneEtrx, -3, 1);

                            $freq = substr($ligneFreq, -strlen($ligneFreq), 4);
                            $freqValue = substr($ligneFreq, -strlen($ligneFreq) + 8, 3);
                            $tsc = substr($ligneFreq, -strlen($ligneFreq) + 19, 3);
                            $tscValue = substr($ligneFreq, -strlen($ligneFreq) + 25, 1);

                            $trx_power = substr($ligneTrxPower, -strlen($ligneTrxPower) + 13, 5);

                            $d_name1 = substr($ligneDname1, -strlen($ligneDname1) + 30, 5);
                            $d_name2 = substr($ligneDname2, -strlen($ligneDname2) + 30, 5);

                            $d_nameInitialChar1 = substr($ligneDname1, -strlen($ligneDname1), 4);
                            $d_nameInitialChar2 = substr($ligneDname2, -strlen($ligneDname2), 4);

                            $bcsu_ip = null;
                            $bcsu_id = '' . $bcsu_id . '';

                            switch ($bcsu_id) {
                                case '0':
                                    $bcsu_ip = '10.92.42.19';
                                    break;
                                case '1':
                                    $bcsu_ip = '10.92.42.17';
                                    break;
                                case '2':
                                    $bcsu_ip = '10.92.42.18';
                                    break;
                            }

                            if ($d_nameInitialChar2 == 'D-CH'){

                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name2,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);

                            }elseif ($d_nameInitialChar1 == 'D-CH'){
                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name1,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);
                            }

                            $id++;

                        }
                        $compteurLigneBcf++;
                        $j++;
                    }
                }
            }

//////////////////////////////////////////////////////////////////////////////////////////
            elseif ($bsc_names == 'YABC03'){

                $j = $q +6;
                $ligne_bcf_id = $contentOfFile[$j];

                $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                if ($bsc_names == 'YABC03' && $bcf == 'BCF'){

                    $compteurLigneBcf = $j;
                    while ($j < $count && $bsc_name <> 'YABC04'){

                        //////////////////////////////////////////
                        $ligne = $contentOfFile[$j];

                        $bsc_name = substr($ligne,-48,6);
                        /// //////////////////////////////////////

                        $ligne_bcf_id = $contentOfFile[$j];

                        $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                        if ($bcf == 'BCF'){
                            $bcf_id = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 4, 4);
                            $adm_state = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 28, 8);
                            $op_state = substr($ligne_bcf_id, -8, 6);

                            //Ligne BTS ET CELL NAME
                            $compteurBts = $j+2;
                            $compteurTrx = $j+3;
                            $compteurBcsu = $j+4;
                            $compteurGtrx = $j + 6;
                            $compteurEtrx = $j + 7;
                            $compteurFreq = $j + 10;
                            $compteurTrxPower = $j + 18;
                            $compteurDname1 = $j + 21;
                            $compteurDname2 = $j + 24;

                            $ligne_bts_id = $contentOfFile[$compteurBts];
                            $ligne_trx_id = $contentOfFile[$compteurTrx];
                            $ligne_bcsu_id = $contentOfFile[$compteurBcsu];
                            $ligneGtrx = $contentOfFile[$compteurGtrx];
                            $ligneEtrx = $contentOfFile[$compteurEtrx];
                            $ligneFreq = $contentOfFile[$compteurFreq];
                            $ligneTrxPower = $contentOfFile[$compteurTrxPower];
                            $ligneDname1 = $contentOfFile[$compteurDname1];
                            $ligneDname2 = $contentOfFile[$compteurDname2];

                            $bts = substr($ligne_bts_id, -strlen($ligne_bcf_id), 3);
                            $bts_id = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 4, 4);

                            $cells_names = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 10, 7);

                            $trx = substr($ligne_trx_id, -strlen($ligne_trx_id), 3);
                            $trx_id = substr($ligne_trx_id, -strlen($ligne_trx_id) + 4, 3);
                            $trx_state = substr($ligne_trx_id, -8, 6);

                            $bcsu = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 1, 4);
                            $bcsu_id = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 6, 1);

                            $gtrx = substr($ligneGtrx, -strlen($ligneGtrx), 4);
                            $gtrx_state = substr($ligneGtrx, -strlen($ligneGtrx) + 10, 1);

                            $etrx = substr($ligneEtrx, -strlen($ligneEtrx), 4);
                            $etrx_state = substr($ligneEtrx, -strlen($ligneEtrx) + 10, 1);
                            $pref_state = substr($ligneEtrx, -3, 1);

                            $freq = substr($ligneFreq, -strlen($ligneFreq), 4);
                            $freqValue = substr($ligneFreq, -strlen($ligneFreq) + 8, 3);
                            $tsc = substr($ligneFreq, -strlen($ligneFreq) + 19, 3);
                            $tscValue = substr($ligneFreq, -strlen($ligneFreq) + 25, 1);

                            $trx_power = substr($ligneTrxPower, -strlen($ligneTrxPower) + 13, 5);

                            $d_name1 = substr($ligneDname1, -strlen($ligneDname1) + 30, 5);
                            $d_name2 = substr($ligneDname2, -strlen($ligneDname2) + 30, 5);

                            $d_nameInitialChar1 = substr($ligneDname1, -strlen($ligneDname1), 4);
                            $d_nameInitialChar2 = substr($ligneDname2, -strlen($ligneDname2), 4);

                            $bcsu_ip = null;
                            $bcsu_id = '' . $bcsu_id . '';

                            switch ($bcsu_id) {
                                case '1':
                                    $bcsu_ip = '10.92.42.33';
                                    break;
                                case '2':
                                    $bcsu_ip = '10.92.42.34';
                                    break;
                                case '3':
                                    $bcsu_ip = '10.92.42.35';
                                    break;
                            }

                            if ($d_nameInitialChar2 == 'D-CH'){

                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name2,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);

                            }elseif ($d_nameInitialChar1 == 'D-CH'){
                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name1,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);
                            }

                            $id++;

                        }
                        $compteurLigneBcf++;
                        $j++;
                    }
                }
            }

/////////////////////////////////////////////////////////////////////////////////
            elseif ($bsc_names == 'YABC04'){

                $j = $q +6;
                $ligne_bcf_id = $contentOfFile[$j];

                $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                if ($bsc_names == 'YABC04' && $bcf == 'BCF'){

                    $compteurLigneBcf = $j;
                    while ($j < $count && $bsc_name <> 'YABC05'){

                        //////////////////////////////////////////
                        $ligne = $contentOfFile[$j];

                        $bsc_name = substr($ligne,-48,6);
                        /// //////////////////////////////////////

                        $ligne_bcf_id = $contentOfFile[$j];

                        $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                        if ($bcf == 'BCF'){
                            $bcf_id = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 4, 4);
                            $adm_state = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 28, 8);
                            $op_state = substr($ligne_bcf_id, -8, 6);

                            //Ligne BTS ET CELL NAME
                            $compteurBts = $j+2;
                            $compteurTrx = $j+3;
                            $compteurBcsu = $j+4;
                            $compteurGtrx = $j + 6;
                            $compteurEtrx = $j + 7;
                            $compteurFreq = $j + 10;
                            $compteurTrxPower = $j + 18;
                            $compteurDname1 = $j + 21;
                            $compteurDname2 = $j + 24;

                            $ligne_bts_id = $contentOfFile[$compteurBts];
                            $ligne_trx_id = $contentOfFile[$compteurTrx];
                            $ligne_bcsu_id = $contentOfFile[$compteurBcsu];
                            $ligneGtrx = $contentOfFile[$compteurGtrx];
                            $ligneEtrx = $contentOfFile[$compteurEtrx];
                            $ligneFreq = $contentOfFile[$compteurFreq];
                            $ligneTrxPower = $contentOfFile[$compteurTrxPower];
                            $ligneDname1 = $contentOfFile[$compteurDname1];
                            $ligneDname2 = $contentOfFile[$compteurDname2];

                            $bts = substr($ligne_bts_id, -strlen($ligne_bcf_id), 3);
                            $bts_id = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 4, 4);

                            $cells_names = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 10, 7);

                            $trx = substr($ligne_trx_id, -strlen($ligne_trx_id), 3);
                            $trx_id = substr($ligne_trx_id, -strlen($ligne_trx_id) + 4, 3);
                            $trx_state = substr($ligne_trx_id, -8, 6);

                            $bcsu = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 1, 4);
                            $bcsu_id = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 6, 1);

                            $gtrx = substr($ligneGtrx, -strlen($ligneGtrx), 4);
                            $gtrx_state = substr($ligneGtrx, -strlen($ligneGtrx) + 10, 1);

                            $etrx = substr($ligneEtrx, -strlen($ligneEtrx), 4);
                            $etrx_state = substr($ligneEtrx, -strlen($ligneEtrx) + 10, 1);
                            $pref_state = substr($ligneEtrx, -3, 1);

                            $freq = substr($ligneFreq, -strlen($ligneFreq), 4);
                            $freqValue = substr($ligneFreq, -strlen($ligneFreq) + 8, 3);
                            $tsc = substr($ligneFreq, -strlen($ligneFreq) + 19, 3);
                            $tscValue = substr($ligneFreq, -strlen($ligneFreq) + 25, 1);

                            $trx_power = substr($ligneTrxPower, -strlen($ligneTrxPower) + 13, 5);

                            $d_name1 = substr($ligneDname1, -strlen($ligneDname1) + 30, 5);
                            $d_name2 = substr($ligneDname2, -strlen($ligneDname2) + 30, 5);

                            $d_nameInitialChar1 = substr($ligneDname1, -strlen($ligneDname1), 4);
                            $d_nameInitialChar2 = substr($ligneDname2, -strlen($ligneDname2), 4);


                            $bcsu_ip = null;
                            $bcsu_id = '' . $bcsu_id . '';

                            switch ($bcsu_id) {
                                case '0':
                                    $bcsu_ip = '10.92.42.49';
                                    break;
                                case '1':
                                    $bcsu_ip = '10.92.42.50';
                                    break;
                                case '3':
                                    $bcsu_ip = '10.92.42.51';
                                    break;
                            }
                            if ($d_nameInitialChar2 == 'D-CH'){

                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name2,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);

                            }elseif ($d_nameInitialChar1 == 'D-CH'){
                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name1,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);
                            }

                            $id++;

                        }
                        $compteurLigneBcf++;
                        $j++;
                    }
                }
            }

////////////////////////////////////////////////////////////////////////////////////////
            elseif($bsc_names == 'YABC05'){

                $j = $q +6;
                $ligne_bcf_id = $contentOfFile[$j];

                $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                if ($bsc_names == 'YABC05' && $bcf == 'BCF'){

                    $compteurLigneBcf = $j;
                    while ($j < $count && $bsc_name <> 'YABC06'){

                        //////////////////////////////////////////
                        $ligne = $contentOfFile[$j];

                        $bsc_name = substr($ligne,-48,6);
                        /// //////////////////////////////////////
                        $ligne_bcf_id = $contentOfFile[$j];

                        $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                        if ($bcf == 'BCF'){
                            $bcf_id = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 4, 4);
                            $adm_state = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 28, 8);
                            $op_state = substr($ligne_bcf_id, -8, 6);

                            //Ligne BTS ET CELL NAME
                            $compteurBts = $j+2;
                            $compteurTrx = $j+3;
                            $compteurBcsu = $j+4;
                            $compteurGtrx = $j + 6;
                            $compteurEtrx = $j + 7;
                            $compteurFreq = $j + 10;
                            $compteurTrxPower = $j + 18;
                            $compteurDname1 = $j + 21;
                            $compteurDname2 = $j + 24;

                            $ligne_bts_id = $contentOfFile[$compteurBts];
                            $ligne_trx_id = $contentOfFile[$compteurTrx];
                            $ligne_bcsu_id = $contentOfFile[$compteurBcsu];
                            $ligneGtrx = $contentOfFile[$compteurGtrx];
                            $ligneEtrx = $contentOfFile[$compteurEtrx];
                            $ligneFreq = $contentOfFile[$compteurFreq];
                            $ligneTrxPower = $contentOfFile[$compteurTrxPower];
                            $ligneDname1 = $contentOfFile[$compteurDname1];
                            $ligneDname2 = $contentOfFile[$compteurDname2];

                            $bts = substr($ligne_bts_id, -strlen($ligne_bcf_id), 3);
                            $bts_id = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 4, 4);

                            $cells_names = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 10, 7);

                            $trx = substr($ligne_trx_id, -strlen($ligne_trx_id), 3);
                            $trx_id = substr($ligne_trx_id, -strlen($ligne_trx_id) + 4, 3);
                            $trx_state = substr($ligne_trx_id, -8, 6);

                            $bcsu = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 1, 4);
                            $bcsu_id = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 6, 1);

                            $gtrx = substr($ligneGtrx, -strlen($ligneGtrx), 4);
                            $gtrx_state = substr($ligneGtrx, -strlen($ligneGtrx) + 10, 1);

                            $etrx = substr($ligneEtrx, -strlen($ligneEtrx), 4);
                            $etrx_state = substr($ligneEtrx, -strlen($ligneEtrx) + 10, 1);
                            $pref_state = substr($ligneEtrx, -3, 1);

                            $freq = substr($ligneFreq, -strlen($ligneFreq), 4);
                            $freqValue = substr($ligneFreq, -strlen($ligneFreq) + 8, 3);
                            $tsc = substr($ligneFreq, -strlen($ligneFreq) + 19, 3);
                            $tscValue = substr($ligneFreq, -strlen($ligneFreq) + 25, 1);

                            $trx_power = substr($ligneTrxPower, -strlen($ligneTrxPower) + 13, 5);

                            $d_name1 = substr($ligneDname1, -strlen($ligneDname1) + 30, 5);
                            $d_name2 = substr($ligneDname2, -strlen($ligneDname2) + 30, 5);

                            $d_nameInitialChar1 = substr($ligneDname1, -strlen($ligneDname1), 4);
                            $d_nameInitialChar2 = substr($ligneDname2, -strlen($ligneDname2), 4);

                            $bcsu_ip = null;
                            $bcsu_id = '' . $bcsu_id . '';

                            switch ($bcsu_id) {
                                case '0':
                                    $bcsu_ip = '10.92.42.67';
                                    break;
                                case '1':
                                    $bcsu_ip = '10.92.42.65';
                                    break;
                                case '3':
                                    $bcsu_ip = '10.92.42.66';
                                    break;
                            }

//                            dd($bcsu_id);
                            if ($d_nameInitialChar2 == 'D-CH'){

                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name2,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);

                            }elseif ($d_nameInitialChar1 == 'D-CH'){
                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name1,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);
                            }

                            $id++;

                        }
                        $compteurLigneBcf++;
                        $j++;
                    }
                }
            }

/////////////////////////////////////////////////////////////////////////////////////////////////
            elseif ($bsc_names == 'YABC06'){

                $j = $q +6;
                $ligne_bcf_id = $contentOfFile[$j];

                $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                if ($bsc_names == 'YABC06' && $bcf == 'BCF'){

                    $compteurLigneBcf = $j;
                    while ($j < $count && $bsc_name <> 'YABC07'){

                        //////////////////////////////////////////
                        $ligne = $contentOfFile[$j];

                        $bsc_name = substr($ligne,-48,6);
                        /// //////////////////////////////////////
                        $ligne_bcf_id = $contentOfFile[$j];

                        $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                        if ($bcf == 'BCF'){
                            $bcf_id = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 4, 4);
                            $adm_state = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 28, 8);
                            $op_state = substr($ligne_bcf_id, -8, 6);

                            //Ligne BTS ET CELL NAME
                            $compteurBts = $j+2;
                            $compteurTrx = $j+3;
                            $compteurBcsu = $j+4;
                            $compteurGtrx = $j + 6;
                            $compteurEtrx = $j + 7;
                            $compteurFreq = $j + 10;
                            $compteurTrxPower = $j + 18;
                            $compteurDname1 = $j + 21;
                            $compteurDname2 = $j + 24;

                            $ligne_bts_id = $contentOfFile[$compteurBts];
                            $ligne_trx_id = $contentOfFile[$compteurTrx];
                            $ligne_bcsu_id = $contentOfFile[$compteurBcsu];
                            $ligneGtrx = $contentOfFile[$compteurGtrx];
                            $ligneEtrx = $contentOfFile[$compteurEtrx];
                            $ligneFreq = $contentOfFile[$compteurFreq];
                            $ligneTrxPower = $contentOfFile[$compteurTrxPower];
                            $ligneDname1 = $contentOfFile[$compteurDname1];
                            $ligneDname2 = $contentOfFile[$compteurDname2];

                            $bts = substr($ligne_bts_id, -strlen($ligne_bcf_id), 3);
                            $bts_id = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 4, 4);

                            $cells_names = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 10, 7);

                            $trx = substr($ligne_trx_id, -strlen($ligne_trx_id), 3);
                            $trx_id = substr($ligne_trx_id, -strlen($ligne_trx_id) + 4, 3);
                            $trx_state = substr($ligne_trx_id, -8, 6);

                            $bcsu = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 1, 4);
                            $bcsu_id = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 6, 1);

                            $gtrx = substr($ligneGtrx, -strlen($ligneGtrx), 4);
                            $gtrx_state = substr($ligneGtrx, -strlen($ligneGtrx) + 10, 1);

                            $etrx = substr($ligneEtrx, -strlen($ligneEtrx), 4);
                            $etrx_state = substr($ligneEtrx, -strlen($ligneEtrx) + 10, 1);
                            $pref_state = substr($ligneEtrx, -3, 1);

                            $freq = substr($ligneFreq, -strlen($ligneFreq), 4);
                            $freqValue = substr($ligneFreq, -strlen($ligneFreq) + 8, 3);
                            $tsc = substr($ligneFreq, -strlen($ligneFreq) + 19, 3);
                            $tscValue = substr($ligneFreq, -strlen($ligneFreq) + 25, 1);

                            $trx_power = substr($ligneTrxPower, -strlen($ligneTrxPower) + 13, 5);

                            $d_name1 = substr($ligneDname1, -strlen($ligneDname1) + 30, 5);
                            $d_name2 = substr($ligneDname2, -strlen($ligneDname2) + 30, 5);

                            $d_nameInitialChar1 = substr($ligneDname1, -strlen($ligneDname1), 4);
                            $d_nameInitialChar2 = substr($ligneDname2, -strlen($ligneDname2), 4);

                            $bcsu_ip = null;
                            $bcsu_id = '' . $bcsu_id . '';

                            switch ($bcsu_id) {
                                case '1':
                                    $bcsu_ip = '10.92.42.81';
                                    break;
                                case '2':
                                    $bcsu_ip = '10.92.42.83';
                                    break;
                                case '3':
                                    $bcsu_ip = '10.92.42.82';
                                    break;
                            }

                            if ($d_nameInitialChar2 == 'D-CH'){

                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name2,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);

                            }elseif ($d_nameInitialChar1 == 'D-CH'){
                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name1,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);
                            }

                            $id++;

                        }
                        $compteurLigneBcf++;
                        $j++;
                    }
                }
            }

/////////////////////////////////////////////////////////////////////////////////////////
            elseif ($bsc_names == 'YABC07'){

                $j = $q +6;
                $ligne_bcf_id = $contentOfFile[$j];

                $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                if ($bsc_names == 'YABC07' && $bcf == 'BCF'){

                    $compteurLigneBcf = $j;
                    while ($j < $count){

                        $ligne_bcf_id = $contentOfFile[$j];

                        $bcf = substr($ligne_bcf_id, -strlen($ligne_bcf_id), 3);

                        if ($bcf == 'BCF'){
                            $bcf_id = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 4, 4);
                            $adm_state = substr($ligne_bcf_id, -strlen($ligne_bcf_id) + 28, 8);
                            $op_state = substr($ligne_bcf_id, -8, 6);

                            //Ligne BTS ET CELL NAME
                            $compteurBts = $j+2;
                            $compteurTrx = $j+3;
                            $compteurBcsu = $j+4;
                            $compteurGtrx = $j + 6;
                            $compteurEtrx = $j + 7;
                            $compteurFreq = $j + 10;
                            $compteurTrxPower = $j + 18;
                            $compteurDname1 = $j + 21;
                            $compteurDname2 = $j + 24;

                            $ligne_bts_id = $contentOfFile[$compteurBts];
                            $ligne_trx_id = $contentOfFile[$compteurTrx];
                            $ligne_bcsu_id = $contentOfFile[$compteurBcsu];
                            $ligneGtrx = $contentOfFile[$compteurGtrx];
                            $ligneEtrx = $contentOfFile[$compteurEtrx];
                            $ligneFreq = $contentOfFile[$compteurFreq];
                            $ligneTrxPower = $contentOfFile[$compteurTrxPower];
                            $ligneDname1 = $contentOfFile[$compteurDname1];
                            $ligneDname2 = $contentOfFile[$compteurDname2];

                            $bts = substr($ligne_bts_id, -strlen($ligne_bcf_id), 3);
                            $bts_id = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 4, 4);

                            $cells_names = substr($ligne_bts_id, -strlen($ligne_bcf_id) + 10, 7);

                            $trx = substr($ligne_trx_id, -strlen($ligne_trx_id), 3);
                            $trx_id = substr($ligne_trx_id, -strlen($ligne_trx_id) + 4, 3);
                            $trx_state = substr($ligne_trx_id, -8, 6);

                            $bcsu = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 1, 4);
                            $bcsu_id = substr($ligne_bcsu_id, -strlen($ligne_bcsu_id) + 6, 1);

                            $gtrx = substr($ligneGtrx, -strlen($ligneGtrx), 4);
                            $gtrx_state = substr($ligneGtrx, -strlen($ligneGtrx) + 10, 1);

                            $etrx = substr($ligneEtrx, -strlen($ligneEtrx), 4);
                            $etrx_state = substr($ligneEtrx, -strlen($ligneEtrx) + 10, 1);
                            $pref_state = substr($ligneEtrx, -3, 1);

                            $freq = substr($ligneFreq, -strlen($ligneFreq), 4);
                            $freqValue = substr($ligneFreq, -strlen($ligneFreq) + 8, 3);
                            $tsc = substr($ligneFreq, -strlen($ligneFreq) + 19, 3);
                            $tscValue = substr($ligneFreq, -strlen($ligneFreq) + 25, 1);

                            $trx_power = substr($ligneTrxPower, -strlen($ligneTrxPower) + 13, 5);

                            $d_name1 = substr($ligneDname1, -strlen($ligneDname1) + 30, 5);
                            $d_name2 = substr($ligneDname2, -strlen($ligneDname2) + 30, 5);

                            $d_nameInitialChar1 = substr($ligneDname1, -strlen($ligneDname1), 4);
                            $d_nameInitialChar2 = substr($ligneDname2, -strlen($ligneDname2), 4);


                            $bcsu_ip = null;
                            $bcsu_id = '' . $bcsu_id . '';

                            switch ($bcsu_id) {
                                case '1':
                                    $bcsu_ip = '10.92.40.97';
                                    break;
                                case '2':
                                    $bcsu_ip = '10.92.40.98';
                                    break;
                                case '3':
                                    $bcsu_ip = '10.92.40.99';
                                    break;
                            }

                            if ($d_nameInitialChar2 == 'D-CH'){

                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name2,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);

                            }elseif ($d_nameInitialChar1 == 'D-CH'){
                                DB::table('upgradecapacitynokiaupdate')->insert([
                                    'bsc_name' => $bsc_names,
                                    'bcf_id' => $bcf_id,
                                    'bts_id' => $bts_id,
                                    'adm_state' => $adm_state,
                                    'op_state' => $op_state,
                                    'cell_name' => $cells_names,
                                    'trx_id' => $trx_id,
                                    'bcsu_id' => $bcsu_id,
                                    'bcsu_ip' => $bcsu_ip,
                                    'trx_state' => $trx_state,
                                    'trx_power' => $trx_power,
                                    'dname' => $d_name1,
                                    'gtrx_state' => $gtrx_state,
                                    'etrx_state' => $etrx_state,
                                    'pref_state' => $pref_state,
                                    'freqValue' => $freqValue,
                                    'tscValue' => $tscValue
                                ]);
                            }
                            $id++;

                        }
                        $compteurLigneBcf++;
                        $j++;
                    }
                }
            }
            $q ++;
            $compteurLigneBsc++;
        }
        fclose($file);


        return back()->with('success','Log data imported successfully.');
    }
}
