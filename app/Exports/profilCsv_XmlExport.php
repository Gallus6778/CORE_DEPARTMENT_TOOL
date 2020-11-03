<?php

namespace App\Exports;

use App\profilCsv_Xml;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class profilCsv_XmlExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        $operation = '$operation';
        $dn = '$dn';
        $templateName = '$templateName';

        return [
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
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $profilCsv_Xml = new profilCsv_Xml;
        return collect($profilCsv_Xml->getProfilCsv_Xml());
    }
}
