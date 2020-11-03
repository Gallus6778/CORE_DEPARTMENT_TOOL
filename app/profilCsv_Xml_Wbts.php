<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class profilCsv_Xml_Wbts extends Model
{
    protected $table ='profilWbts';

    public function getProfilCsv_Xml_Wbts(){

        $operation = '$operation';
        $dn = '$dn';
        $siteId = '$siteId';
        $templateName = '$templateName';

        $records = DB::table('profilWbts')->select(
            "$operation",
            "$dn",
            "$siteId",
            "$templateName",
            "name",
            "WBTSName",
            "BTSAdditionalInfo",
            "NBAPCommMode",
            "IPBasedRouteIdIub",
            "IPNBId",
            "HSUPAXUsersEnabled",
            "DSCPLow",
            "DSCPMedHSPA",
            "DSCPHigh",
            "DSCPMedDCH",
            "HSDPAULCToDSCP",
            "HSUPADLCToDSCP"
        )->get()->toArray();

        return $records;
    }
}
