<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class profilCsv_Xml extends Model
{
    protected $table ='profilCSV';

    public function getProfilCsv_Xml(){
        $operation = '$operation';
        $dn = '$dn';
        $templateName = '$templateName';

        $records = DB::table('profilCSV')->select(
            "$operation",
            "$dn",
            "$templateName",
            "NodeBIPAddress",
            "CControlPortID",
            "DNBAPICSUIndex",
            "SCTPPortNumberDNBAP",
            "MinSCTPPortIub",
            "name",
            "NBAPDSCP"
        )->get()->toArray();

        return $records;
    }
}
