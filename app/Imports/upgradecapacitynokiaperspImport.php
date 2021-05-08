<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class upgradecapacitynokiaperspImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // $users = App\upgradecapacitynokia::all();;
        $counter = 0;
        // dd($collection);
        foreach($collection as $key=>$value)
        {
            // dd($value);
            if($key>=1){
//                dd($value[2]);
//                echo $value[2];

                $data = DB::table('upgradecapacitynokiaupdate')->where('cell_name', '=',$value[2])->get();
                $data2 = DB::table('bts_ip_planning')->where('ma_tram', '=',$value[1])->get();

//                dd($trx_id = $value[3]);
                $cells = $value[1];
                $trx_id = $value[3];

                $bcsu_id = null;
                $bcsu_ip = null;
                $d_name = null;
                $ip_service = null;

                if ($trx_id < 15){

                    foreach ($data as $datas){
                        $oldTrx_id = intval($datas->trx_id);
                        if ($oldTrx_id < 15){
                            $bcsu_id = $datas->bcsu_id;
                            $bcsu_ip = $datas->bcsu_ip;
                            $d_name = $datas->dname;
                        }
                    }

                    if ($trx_id < 10){
                        $d_name = substr($d_name, -5, 4) . '' . $trx_id;
                    }
//                    elseif ($trx_id < 15){
                    else{
                        switch ($trx_id){
                            case 10:
                                $d_name = substr($d_name, -5, 4) . 'A';
                                break;
                            case 11:
                                $d_name = substr($d_name, -5, 4) . 'B';
                                break;
                            case 12:
                                $d_name = substr($d_name, -5, 4) . 'C';
                                break;
                            case 13:
                                $d_name = substr($d_name, -5, 4) . 'D';
                                break;
                            case 14:
                                $d_name = substr($d_name, -5, 4) . 'E';
                                break;
                        }
                    }
                }
                else{

                    foreach ($data as $datas){
//                        dd(intval($datas->trx_id));

                        $bcsu_id = $datas->bcsu_id;
                        $bcsu_ip = $datas->bcsu_ip;
                        if (intval($datas->trx_id) < 15){

                            // $_name = $datas->dname;
                            $_name = null;
                        }else{
                            $_name = $datas->dname;
                        }
                    }

                    if($_name == null){
                        if (substr($cells, -1, 1) == 'B'){
                            switch ($trx_id) {
                                case 15:
                                    $d_name = 'F' . substr($cells, -4, 3) . '1';
                                    break;
                                case 16:
                                    $d_name = 'F' . substr($cells, -4, 3) . '2';
                                    break;
                                case 17:
                                    $d_name = 'F' . substr($cells, -4, 3) . '3';
                                    break;
                                case 18:
                                    $d_name = 'F' . substr($cells, -4, 3) . '4';
                                    break;
                            }

                        }elseif(substr($cells, -1, 1) == 'C') {
                            switch ($trx_id) {
                                case 15:
                                    $d_name = 'H' . substr($cells, -4, 3) . '1';
                                    break;
                                case 16:
                                    $d_name = 'H' . substr($cells, -4, 3) . '2';
                                    break;
                                case 17:
                                    $d_name = 'H' . substr($cells, -4, 3) . '3';
                                    break;
                                case 18:
                                    $d_name = 'H' . substr($cells, -4, 3) . '4';
                                    break;
                            }
                        }else{
                            switch ($trx_id) {
                                case 15:
                                    $d_name = 'C' . substr($cells, -4, 3) . '1';
                                    break;
                                case 16:
                                    $d_name = 'C' . substr($cells, -4, 3) . '2';
                                    break;
                                case 17:
                                    $d_name = 'C' . substr($cells, -4, 3) . '3';
                                    break;
                                case 18:
                                    $d_name = 'C' . substr($cells, -4, 3) . '4';
                                    break;
                            }
                        }
                    }else{
//                        $d_name = $_name;
                        switch ($trx_id) {
                            case 15:
                                $d_name = substr($_name, -5, 4) . '1';
                                break;
                            case 16:
                                $d_name = substr($_name, -5, 4) . '2';
                                break;
                            case 17:
                                $d_name = substr($_name, -5, 4) . '3';
                                break;
                            case 18:
                                $d_name = substr($_name, -5, 4) . '4';
                                break;
                        }
                    }
                    /////////////////////////////////////////
                }


//                dd($d_name);
//                if ($trx_id < 10){
//                    $d_name = substr($d_name, -5, 4) . '' . $trx_id;
//                }elseif ($trx_id < 15){
//                    switch ($trx_id){
//                        case 10:
//                            $d_name = substr($d_name, -5, 4) . 'A';
//                            break;
//                        case 11:
//                            $d_name = substr($d_name, -5, 4) . 'B';
//                            break;
//                        case 12:
//                            $d_name = substr($d_name, -5, 4) . 'C';
//                            break;
//                        case 13:
//                            $d_name = substr($d_name, -5, 4) . 'D';
//                            break;
//                        case 14:
//                            $d_name = substr($d_name, -5, 4) . 'E';
//                            break;
//                    }
//                }

//            else{
//                    switch ($trx_id) {
//                        case 15:
//                            $d_name = substr($d_name, -5, 4) . '1';
//                            break;
//                        case 16:
//                            $d_name = substr($d_name, -5, 4) . '2';
//                            break;
//                        case 17:
//                            $d_name = substr($d_name, -5, 4) . '3';
//                            break;
//                        case 18:
//                            $d_name = substr($d_name, -5, 4) . '4';
//                            break;
//                    }
//                }
//                dd($d_name);

                foreach ($data2 as $datas){
                    $ip_service = $datas->ip_service;
                }
//                dd($ip_service);

                $sctp_port = 49152 + $value[3];

                DB::table('upgradecapacitynokiapersp')->insert([
                    'bsc_names'=>$value[0],
                    'sites_names'=>$value[1],
                    'cells_names'=>$value[2],
                    'trx_id'=>$value[3],
                    'tsc'=>$value[4],
                    'frequency'=>$value[5],
                    'ch0_type'=>$value[6],
                    'ch1_type'=>$value[7],
                    'ch2_type'=>$value[8],
                    'ch3_type'=>$value[9],
                    'ch4_type'=>$value[10],
                    'ch5_type'=>$value[11],
                    'ch6_type'=>$value[12],
                    'ch7_type'=>$value[13],
                    'mPlaneRemoteIpAddress'=> $bcsu_ip,
                    'cuPlaneLocalIpAddress'=>$ip_service,
                    'index_bcsu'=>$bcsu_id,
                    'sctp_port'=>$sctp_port,
                    'dname'=>$d_name
                ]);
            }


        }

        // ///////////////////////////////
        $data = DB::table('upgradecapacitynokiapersp')->get();

        unlink('storage/script-yabc01.txt');
        unlink('storage/script-yabc02.txt');
        unlink('storage/script-yabc03.txt');
        unlink('storage/script-yabc04.txt');
        unlink('storage/script-yabc05.txt');
        unlink('storage/script-yabc06.txt');
        unlink('storage/script-yabc07.txt');

        unlink('storage/script-bsc.txt');

        // OUVERTURE DU FICHIER CONTENEUR.TXT EN MODE LECTURE ET ECRITURE
        $monFichier1 = fopen('storage/script-yabc01.txt', 'a+');
        $monFichier2 = fopen('storage/script-yabc02.txt', 'a+');
        $monFichier3 = fopen('storage/script-yabc03.txt', 'a+');
        $monFichier4 = fopen('storage/script-yabc04.txt', 'a+');
        $monFichier5 = fopen('storage/script-yabc05.txt', 'a+');
        $monFichier6 = fopen('storage/script-yabc06.txt', 'a+');
        $monFichier7 = fopen('storage/script-yabc07.txt', 'a+');

        $monScript = fopen('storage/script-bsc.txt', 'a+');

        // INITIALISATION DU CONTENU DES FICHIERS
        $initScript1 = '//***************** YABC01 ***************************
';
        $initScript2 = '//***************** YABC02 ***************************
';
        $initScript3 = '//***************** YABC03 ***************************
';
        $initScript4 = '//***************** YABC04 ***************************
';
        $initScript5 = '//***************** YABC05 ***************************
';
        $initScript6 = '//***************** YABC06 ***************************
';
        $initScript7 = '//***************** YABC07 ***************************
';
        fputs($monFichier1,$initScript1);
        fputs($monFichier2,$initScript2);
        fputs($monFichier3,$initScript3);
        fputs($monFichier4,$initScript4);
        fputs($monFichier5,$initScript5);
        fputs($monFichier6,$initScript6);
        fputs($monFichier7,$initScript7);


        $info1 = null;
        $info2 = null;
        $info3 = null;
        $info4 = null;
        $info5 = null;
        $info6 = null;
        $info7 = null;
        // SCRIPT POUR LA BSC YABC01

        foreach($data as $datas){

            $bsc = $datas->bsc_names;

            if($bsc == 'YABC01'){


                $info1 = '

//**********ADD Trx ' . $datas->dname . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $datas->dname . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $datas->dname . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $datas->dname . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $datas->dname . ',;
ZOYS:IUA:' . $datas->dname . ':ACT:;
ZEQS:NAME=' . $datas->cells_names . ':L:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $datas->dname . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
ZERS:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ',:U:;
ZEQS:NAME=' . $datas->cells_names . ':U:;
ZEEI:NAME=' . $datas->cells_names . ':;

';
                // ECRIRE DANS LE FICHIER
                fputs($monFichier1,$info1);

            }
        }


        // SCRIPT POUR LA BSC YABC02

        foreach($data as $datas){

            $bsc = $datas->bsc_names;

            if($bsc == 'YABC02'){


                $info2 = '

//**********ADD Trx ' . $datas->dname . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $datas->dname . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $datas->dname . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $datas->dname . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $datas->dname . ',;
ZOYS:IUA:' . $datas->dname . ':ACT:;
ZEQS:NAME=' . $datas->cells_names . ':L:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $datas->dname . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
ZERS:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ',:U:;
ZEQS:NAME=' . $datas->cells_names . ':U:;
ZEEI:NAME=' . $datas->cells_names . ':;

';
                // ECRIRE DANS LE FICHIER
                fputs($monFichier2,$info2);

            }
        }

        // SCRIPT POUR LA BSC YABC03

        foreach($data as $datas){

            $bsc = $datas->bsc_names;

            if($bsc == 'YABC03'){

                $info3 = '

//**********ADD Trx ' . $datas->dname . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $datas->dname . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $datas->dname . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $datas->dname . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $datas->dname . ',;
ZOYS:IUA:' . $datas->dname . ':ACT:;
ZEQS:NAME=' . $datas->cells_names . ':L:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $datas->dname . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
ZERS:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ',:U:;
ZEQS:NAME=' . $datas->cells_names . ':U:;
ZEEI:NAME=' . $datas->cells_names . ':;

';
                // ECRIRE DANS LE FICHIER
                fputs($monFichier3,$info3);

            }
        }


        // SCRIPT POUR LA BSC YABC04

        foreach($data as $datas){

            $bsc = $datas->bsc_names;

            if($bsc == 'YABC04'){

                $info4 = '

//**********ADD Trx ' . $datas->dname . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $datas->dname . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $datas->dname . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $datas->dname . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $datas->dname . ',;
ZOYS:IUA:' . $datas->dname . ':ACT:;
ZEQS:NAME=' . $datas->cells_names . ':L:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $datas->dname . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
ZERS:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ',:U:;
ZEQS:NAME=' . $datas->cells_names . ':U:;
ZEEI:NAME=' . $datas->cells_names . ':;

';
                // ECRIRE DANS LE FICHIER
                fputs($monFichier4,$info4);

            }
        }


        // SCRIPT POUR LA BSC YABC05

        foreach($data as $datas){

            $bsc = $datas->bsc_names;

            if($bsc == 'YABC05'){

                $info5 = '

//**********ADD Trx ' . $datas->dname . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $datas->dname . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $datas->dname . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $datas->dname . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $datas->dname . ',;
ZOYS:IUA:' . $datas->dname . ':ACT:;
ZEQS:NAME=' . $datas->cells_names . ':L:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $datas->dname . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
ZERS:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ',:U:;
ZEQS:NAME=' . $datas->cells_names . ':U:;
ZEEI:NAME=' . $datas->cells_names . ':;

';
                // ECRIRE DANS LE FICHIER
                fputs($monFichier5,$info5);

            }
        }

        // SCRIPT POUR LA BSC YABC06

        foreach($data as $datas){

            $bsc = $datas->bsc_names;

            if($bsc == 'YABC06'){

                $info6 = '

//**********ADD Trx ' . $datas->dname . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $datas->dname . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $datas->dname . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $datas->dname . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $datas->dname . ',;
ZOYS:IUA:' . $datas->dname . ':ACT:;
ZEQS:NAME=' . $datas->cells_names . ':L:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $datas->dname . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
ZERS:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ',:U:;
ZEQS:NAME=' . $datas->cells_names . ':U:;
ZEEI:NAME=' . $datas->cells_names . ':;

';
                // ECRIRE DANS LE FICHIER
                fputs($monFichier6,$info6);

            }
        }

        // SCRIPT POUR LA BSC YABC07

        foreach($data as $datas){

            $bsc = $datas->bsc_names;

            if($bsc == 'YABC07'){

                $info7 = '

//**********ADD Trx ' . $datas->dname . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $datas->dname . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $datas->dname . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $datas->dname . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $datas->dname . ',;
ZOYS:IUA:' . $datas->dname . ':ACT:;
ZEQS:NAME=' . $datas->cells_names . ':L:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $datas->dname . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
ZERS:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ',:U:;
ZEQS:NAME=' . $datas->cells_names . ':U:;
ZEEI:NAME=' . $datas->cells_names . ':;

';
                // ECRIRE DANS LE FICHIER
                fputs($monFichier7,$info7);

            }
        }




        fputs($monScript,file_get_contents('storage/script-yabc01.txt'));
        fputs($monScript,file_get_contents('storage/script-yabc02.txt'));
        fputs($monScript,file_get_contents('storage/script-yabc03.txt'));
        fputs($monScript,file_get_contents('storage/script-yabc04.txt'));
        fputs($monScript,file_get_contents('storage/script-yabc05.txt'));
        fputs($monScript,file_get_contents('storage/script-yabc06.txt'));
        fputs($monScript,file_get_contents('storage/script-yabc07.txt'));

//        $info1 = fgets($monFichier1);
//        fputs($monScript,$info1);
//        fputs($monScript,$info2);
//        fputs($monScript,$info3);
//        fputs($monScript,$info4);
//        fputs($monScript,$info5);
//        fputs($monScript,$info6);
//        fputs($monScript,$info7);

        fclose($monFichier1);
        fclose($monFichier2);
        fclose($monFichier3);
        fclose($monFichier4);
        fclose($monFichier5);
        fclose($monFichier6);
        fclose($monFichier7);

        fclose($monScript);
    }
}
