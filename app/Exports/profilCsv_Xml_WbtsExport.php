<?php

namespace App\Exports;

use App\profilCsv_Xml_Wbts;
use Maatwebsite\Excel\Concerns\FromCollection;
use \Maatwebsite\Excel\Concerns\WithHeadings;

class profilCsv_Xml_WbtsExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        $operation = '$operation';
        $dn = '$dn';
        $siteId = '$siteId';
        $templateName = '$templateName';

        return [
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
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $profilCsv_Xml = new profilCsv_Xml_Wbts();
        return collect($profilCsv_Xml->getProfilCsv_Xml_Wbts());
    }
}
