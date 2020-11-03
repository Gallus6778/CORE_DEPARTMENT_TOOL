<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class ugradeCapacityNokiaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        // $users = App\upgradecapacitynokia::all();;
        $counter = 0;

        foreach($collection as $key=>$value)
        {
            if($key>1){
                DB::table('upgradecapacitynokia')->insert([
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
                    'mPlaneRemoteIpAddress'=>$value[14],
                    'cuPlaneLocalIpAddress'=>$value[15],
                    'index_bcsu'=>$value[16],
                    'sctp_port'=>$value[17]
                    ]);
            }


        }

        // ///////////////////////////////
        $data = DB::table('upgradecapacitynokia')->get();

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

//            $info = null;
            $d_name = null;

            $bsc = $datas->bsc_names;

            if($bsc == 'YABC01'){

                // identiification du site
                $site = strlen($datas->sites_names);
                $trx_id = $datas->trx_id;

                $cells_names = $datas->cells_names;

                if($site == 6)
                {
                    if($cells_names == 'YAO0011')
                    {
                        $d_name = 'T200' . $trx_id . '';
                    }else{
                        $dernier_character = substr($datas->sites_names,-3,3);
                        switch($trx_id){
                            case 1:
                            case 2:
                            case 3:
                            case 4:
                            case 5:
                            case 6:
                            case 7:
                            case 8:
                            case 9:
                                $d_name = 'T' . $dernier_character . '' . $trx_id .'';
                            break;
                            case 10:
                                $d_name = 'T' . $dernier_character . 'A';
                            break;
                            case 11:
                                $d_name = 'T' . $dernier_character . 'B';
                            break;
                            case 12:
                                $d_name = 'T' . $dernier_character . 'C';
                            break;
                            case 13:
                                $d_name = 'T' . $dernier_character . 'D';
                            break;
                            case 14:
                                $d_name = 'T' . $dernier_character . 'E';
                            break;
                            case 15:
                                $d_name = 'C' . $dernier_character . '1';
                            break;
                            case 16:
                                $d_name = 'C' . $dernier_character . '2';
                            break;
                            case 17:
                                $d_name = 'C' . $dernier_character . '3';
                            break;
                            case 18:
                                $d_name = 'C' . $dernier_character . '4';
                            break;
                            // default
                        }
                    }
                }
                elseif($site == 7)
                {

                    $dernier_character = substr($datas->sites_names,-4,3);

                    // LAST CHARACTER
                    $character =substr($datas->sites_names,-1,1);
                        if($character == 'B'){
                            switch($trx_id){
                                case 1:
                                case 2:
                                case 3:
                                case 4:
                                case 5:
                                case 6:
                                case 7:
                                case 8:
                                    case 9:
                                    $d_name = 'E' . $dernier_character . '' . $trx_id .'';
                                break;
                                case 10:
                                    $d_name = 'E' . $dernier_character . 'A';
                                break;
                                case 11:
                                    $d_name = 'E' . $dernier_character . 'B';
                                break;
                                case 12:
                                    $d_name = 'E' . $dernier_character . 'C';
                                break;
                                case 13:
                                    $d_name = 'E' . $dernier_character . 'D';
                                break;
                                case 14:
                                    $d_name = 'E' . $dernier_character . 'E';
                                break;
                                case 15:
                                    $d_name = 'F' . $dernier_character . '1';
                                break;
                                case 16:
                                    $d_name = 'F' . $dernier_character . '2';
                                break;
                                case 17:
                                    $d_name = 'F' . $dernier_character . '3';
                                break;
                                case 18:
                                    $d_name = 'F' . $dernier_character . '4';
                                break;
                                // default
                            }
                        }elseif($character == 'C')
                        {
                            switch($trx_id){
                                case 1:
                                case 2:
                                case 3:
                                case 4:
                                case 5:
                                case 6:
                                case 7:
                                case 8:
                                    case 9:
                                    $d_name = 'G' . $dernier_character . '' . $trx_id .'';
                                break;
                                case 10:
                                    $d_name = 'G' . $dernier_character . 'A';
                                break;
                                case 11:
                                    $d_name = 'G' . $dernier_character . 'B';
                                break;
                                case 12:
                                    $d_name = 'G' . $dernier_character . 'C';
                                break;
                                case 13:
                                    $d_name = 'G' . $dernier_character . 'D';
                                break;
                                case 14:
                                    $d_name = 'G' . $dernier_character . 'E';
                                break;
                                case 15:
                                    $d_name = 'H' . $dernier_character . '1';
                                break;
                                case 16:
                                    $d_name = 'H' . $dernier_character . '2';
                                break;
                                case 17:
                                    $d_name = 'H' . $dernier_character . '3';
                                break;
                                case 18:
                                    $d_name = 'H' . $dernier_character . '4';
                                break;
                                // default
                            }
                        }
                        else{}
                }else{}

                $info1 = '

//**********ADD Trx ' . $d_name . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $d_name . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $d_name . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $d_name . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $d_name . ',;
ZOYS:IUA:' . $d_name . ':ACT:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $d_name . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
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

//    $info = null;
    $d_name = null;

    $bsc = $datas->bsc_names;

    if($bsc == 'YABC02'){

        // identiification du site
        $site = strlen($datas->sites_names);
        $trx_id = $datas->trx_id;

        // $cells_names = $datas->cells_names;

        if($site == 6)
        {

            if($cells_names == 'YLAB021')
            {
                $d_name = 'T200' . $trx_id;
            }else{
                $dernier_character = substr($datas->sites_names,-3,3);
                switch($trx_id){
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                        $d_name = 'T' . $dernier_character . '' . $trx_id .'';
                        break;
                    case 10:
                        $d_name = 'T' . $dernier_character . 'A';
                        break;
                    case 11:
                        $d_name = 'T' . $dernier_character . 'B';
                        break;
                    case 12:
                        $d_name = 'T' . $dernier_character . 'C';
                        break;
                    case 13:
                        $d_name = 'T' . $dernier_character . 'D';
                        break;
                    case 14:
                        $d_name = 'T' . $dernier_character . 'E';
                        break;
                    case 15:
                        $d_name = 'C' . $dernier_character . '1';
                        break;
                    case 16:
                        $d_name = 'C' . $dernier_character . '2';
                        break;
                    case 17:
                        $d_name = 'C' . $dernier_character . '3';
                        break;
                    case 18:
                        $d_name = 'C' . $dernier_character . '4';
                    break;
                    // default
                }
            }

        }
        elseif($site == 7)
        {

            $dernier_character = substr($datas->sites_names,-4,3);

            // LAST CHARACTER
            $character =substr($datas->sites_names,-1,1);
                if($character == 'B'){
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'E' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'E' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'E' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'E' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'E' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'E' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'F' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'F' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'F' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'F' . $dernier_character . '4';
                        break;
                        // default
                    }
                }elseif($character == 'C')
                {
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'G' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'G' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'G' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'G' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'G' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'G' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'H' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'H' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'H' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'H' . $dernier_character . '4';
                        break;
                        // default
                    }
                }
                else{}
        }else{}

        $info2 = '

//**********ADD Trx ' . $d_name . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $d_name . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $d_name . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $d_name . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $d_name . ',;
ZOYS:IUA:' . $d_name . ':ACT:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $d_name . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
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

//    $info = null;
    $d_name = null;

    $bsc = $datas->bsc_names;

    if($bsc == 'YABC03'){

        // identiification du site
        $site = strlen($datas->sites_names);
        $trx_id = $datas->trx_id;
        if($site == 6)
        {
            $dernier_character = substr($datas->sites_names,-3,3);
            switch($trx_id){
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                    $d_name = 'T' . $dernier_character . '' . $trx_id .'';
                break;
                case 10:
                    $d_name = 'T' . $dernier_character . 'A';
                break;
                case 11:
                    $d_name = 'T' . $dernier_character . 'B';
                break;
                case 12:
                    $d_name = 'T' . $dernier_character . 'C';
                break;
                case 13:
                    $d_name = 'T' . $dernier_character . 'D';
                break;
                case 14:
                    $d_name = 'T' . $dernier_character . 'E';
                break;
                case 15:
                    $d_name = 'C' . $dernier_character . '1';
                break;
                case 16:
                    $d_name = 'C' . $dernier_character . '2';
                break;
                case 17:
                    $d_name = 'C' . $dernier_character . '3';
                break;
                case 18:
                    $d_name = 'C' . $dernier_character . '4';
                break;
                // default
            }
        }
        elseif($site == 7)
        {

            $dernier_character = substr($datas->sites_names,-4,3);

            // LAST CHARACTER
            $character =substr($datas->sites_names,-1,1);
                if($character == 'B'){
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'E' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'E' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'E' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'E' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'E' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'E' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'F' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'F' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'F' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'F' . $dernier_character . '4';
                        break;
                        // default
                    }
                }elseif($character == 'C')
                {
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'G' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'G' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'G' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'G' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'G' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'G' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'H' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'H' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'H' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'H' . $dernier_character . '4';
                        break;
                        // default
                    }
                }
                else{}
        }else{}

        $info3 = '

//**********ADD Trx ' . $d_name . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $d_name . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $d_name . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $d_name . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $d_name . ',;
ZOYS:IUA:' . $d_name . ':ACT:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $d_name . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
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

//    $info = null;
    $d_name = null;

    $bsc = $datas->bsc_names;

    if($bsc == 'YABC04'){

        // identiification du site
        $site = strlen($datas->sites_names);
        $trx_id = $datas->trx_id;
        if($site == 6)
        {
            $dernier_character = substr($datas->sites_names,-3,3);
            switch($trx_id){
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                    $d_name = 'T' . $dernier_character . '' . $trx_id .'';
                break;
                case 10:
                    $d_name = 'T' . $dernier_character . 'A';
                break;
                case 11:
                    $d_name = 'T' . $dernier_character . 'B';
                break;
                case 12:
                    $d_name = 'T' . $dernier_character . 'C';
                break;
                case 13:
                    $d_name = 'T' . $dernier_character . 'D';
                break;
                case 14:
                    $d_name = 'T' . $dernier_character . 'E';
                break;
                case 15:
                    $d_name = 'C' . $dernier_character . '1';
                break;
                case 16:
                    $d_name = 'C' . $dernier_character . '2';
                break;
                case 17:
                    $d_name = 'C' . $dernier_character . '3';
                break;
                case 18:
                    $d_name = 'C' . $dernier_character . '4';
                break;
                // default
            }
        }
        elseif($site == 7)
        {

            $dernier_character = substr($datas->sites_names,-4,3);

            // LAST CHARACTER
            $character =substr($datas->sites_names,-1,1);
                if($character == 'B'){
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'E' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'E' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'E' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'E' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'E' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'E' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'F' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'F' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'F' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'F' . $dernier_character . '4';
                        break;
                        // default
                    }
                }elseif($character == 'C')
                {
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'G' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'G' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'G' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'G' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'G' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'G' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'H' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'H' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'H' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'H' . $dernier_character . '4';
                        break;
                        // default
                    }
                }
                else{}
        }else{}

        $info4 = '

//**********ADD Trx ' . $d_name . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $d_name . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $d_name . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $d_name . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $d_name . ',;
ZOYS:IUA:' . $d_name . ':ACT:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $d_name . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
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

//    $info = null;
    $d_name = null;

    $bsc = $datas->bsc_names;

    if($bsc == 'YABC05'){

        // identiification du site
        $site = strlen($datas->sites_names);
        $trx_id = $datas->trx_id;
        if($site == 6)
        {
            $dernier_character = substr($datas->sites_names,-3,3);
            switch($trx_id){
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                    $d_name = 'T' . $dernier_character . '' . $trx_id .'';
                break;
                case 10:
                    $d_name = 'T' . $dernier_character . 'A';
                break;
                case 11:
                    $d_name = 'T' . $dernier_character . 'B';
                break;
                case 12:
                    $d_name = 'T' . $dernier_character . 'C';
                break;
                case 13:
                    $d_name = 'T' . $dernier_character . 'D';
                break;
                case 14:
                    $d_name = 'T' . $dernier_character . 'E';
                break;
                case 15:
                    $d_name = 'C' . $dernier_character . '1';
                break;
                case 16:
                    $d_name = 'C' . $dernier_character . '2';
                break;
                case 17:
                    $d_name = 'C' . $dernier_character . '3';
                break;
                case 18:
                    $d_name = 'C' . $dernier_character . '4';
                break;
                // default
            }
        }
        elseif($site == 7)
        {

            $dernier_character = substr($datas->sites_names,-4,3);

            // LAST CHARACTER
            $character =substr($datas->sites_names,-1,1);
                if($character == 'B'){
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'E' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'E' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'E' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'E' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'E' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'E' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'F' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'F' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'F' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'F' . $dernier_character . '4';
                        break;
                        // default
                    }
                }elseif($character == 'C')
                {
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'G' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'G' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'G' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'G' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'G' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'G' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'H' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'H' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'H' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'H' . $dernier_character . '4';
                        break;
                        // default
                    }
                }
                else{}
        }else{}

        $info5 = '

//**********ADD Trx ' . $d_name . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $d_name . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $d_name . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $d_name . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $d_name . ',;
ZOYS:IUA:' . $d_name . ':ACT:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $d_name . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
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

    $info = null;
    $d_name = null;

    $bsc = $datas->bsc_names;

    if($bsc == 'YABC06'){

        // identiification du site
        $site = strlen($datas->sites_names);
        $trx_id = $datas->trx_id;
        if($site == 6)
        {
            $dernier_character = substr($datas->sites_names,-3,3);
            switch($trx_id){
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                    $d_name = 'T' . $dernier_character . '' . $trx_id .'';
                break;
                case 10:
                    $d_name = 'T' . $dernier_character . 'A';
                break;
                case 11:
                    $d_name = 'T' . $dernier_character . 'B';
                break;
                case 12:
                    $d_name = 'T' . $dernier_character . 'C';
                break;
                case 13:
                    $d_name = 'T' . $dernier_character . 'D';
                break;
                case 14:
                    $d_name = 'T' . $dernier_character . 'E';
                break;
                case 15:
                    $d_name = 'C' . $dernier_character . '1';
                break;
                case 16:
                    $d_name = 'C' . $dernier_character . '2';
                break;
                case 17:
                    $d_name = 'C' . $dernier_character . '3';
                break;
                case 18:
                    $d_name = 'C' . $dernier_character . '4';
                break;
                // default
            }
        }
        elseif($site == 7)
        {

            $dernier_character = substr($datas->sites_names,-4,3);

            // LAST CHARACTER
            $character =substr($datas->sites_names,-1,1);
                if($character == 'B'){
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'E' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'E' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'E' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'E' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'E' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'E' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'F' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'F' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'F' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'F' . $dernier_character . '4';
                        break;
                        // default
                    }
                }elseif($character == 'C')
                {
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'G' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'G' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'G' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'G' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'G' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'G' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'H' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'H' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'H' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'H' . $dernier_character . '4';
                        break;
                        // default
                    }
                }
                else{}
        }else{}

        $info6 = '

//**********ADD Trx ' . $d_name . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $d_name . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $d_name . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $d_name . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $d_name . ',;
ZOYS:IUA:' . $d_name . ':ACT:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $d_name . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
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

//    $info = null;
    $d_name = null;

    $bsc = $datas->bsc_names;

    if($bsc == 'YABC07'){

        // identiification du site
        $site = strlen($datas->sites_names);
        $trx_id = $datas->trx_id;
        if($site == 6)
        {
            $dernier_character = substr($datas->sites_names,-3,3);
            switch($trx_id){
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                    $d_name = 'T' . $dernier_character . '' . $trx_id .'';
                break;
                case 10:
                    $d_name = 'T' . $dernier_character . 'A';
                break;
                case 11:
                    $d_name = 'T' . $dernier_character . 'B';
                break;
                case 12:
                    $d_name = 'T' . $dernier_character . 'C';
                break;
                case 13:
                    $d_name = 'T' . $dernier_character . 'D';
                break;
                case 14:
                    $d_name = 'T' . $dernier_character . 'E';
                break;
                case 15:
                    $d_name = 'C' . $dernier_character . '1';
                break;
                case 16:
                    $d_name = 'C' . $dernier_character . '2';
                break;
                case 17:
                    $d_name = 'C' . $dernier_character . '3';
                break;
                case 18:
                    $d_name = 'C' . $dernier_character . '4';
                break;
                // default
            }
        }
        elseif($site == 7)
        {

            $dernier_character = substr($datas->sites_names,-4,3);

            // LAST CHARACTER
            $character =substr($datas->sites_names,-1,1);
                if($character == 'B'){
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'E' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'E' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'E' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'E' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'E' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'E' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'F' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'F' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'F' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'F' . $dernier_character . '4';
                        break;
                        // default
                    }
                }elseif($character == 'C')
                {
                    switch($trx_id){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                            case 9:
                            $d_name = 'G' . $dernier_character . '' . $trx_id .'';
                        break;
                        case 10:
                            $d_name = 'G' . $dernier_character . 'A';
                        break;
                        case 11:
                            $d_name = 'G' . $dernier_character . 'B';
                        break;
                        case 12:
                            $d_name = 'G' . $dernier_character . 'C';
                        break;
                        case 13:
                            $d_name = 'G' . $dernier_character . 'D';
                        break;
                        case 14:
                            $d_name = 'G' . $dernier_character . 'E';
                        break;
                        case 15:
                            $d_name = 'H' . $dernier_character . '1';
                        break;
                        case 16:
                            $d_name = 'H' . $dernier_character . '2';
                        break;
                        case 17:
                            $d_name = 'H' . $dernier_character . '3';
                        break;
                        case 18:
                            $d_name = 'H' . $dernier_character . '4';
                        break;
                        // default
                    }
                }
                else{}
        }else{}

        $info7 = '

//**********ADD Trx ' . $d_name . ' in cell ' . $datas->cells_names . '************//

ZOYX:' . $d_name . ':IUA:S:BCSU,' . $datas->index_bcsu . ':AFAST2:4:;
ZOYP:IUA:' . $d_name . ':"' . $datas->mPlaneRemoteIpAddress . '",,' . $datas->sctp_port . ':"' . $datas->cuPlaneLocalIpAddress . '",29,,,' . $datas->sctp_port . ':;
ZDWP:' . $d_name . ':BCSU,' . $datas->index_bcsu . ':0,' . $datas->trx_id . ':' . $d_name . ',;
ZOYS:IUA:' . $d_name . ':ACT:;
ZERC:NAME=' . $datas->cells_names . ',TRX=' . $datas->trx_id . ':PREF=N,GTRX=N,:FREQ=' . $datas->frequency . ',TSC=' . $datas->tsc . ',:DNAME=' . $d_name . ':CH0=' . $datas->ch0_type . ',CH1=' . $datas->ch1_type . ',CH2=' . $datas->ch2_type . ',CH3=' . $datas->ch3_type . ',CH4=' . $datas->ch4_type . ',CH5=' . $datas->ch5_type . ',CH6=' . $datas->ch6_type . ',CH7=' . $datas->ch7_type . '::::;
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
