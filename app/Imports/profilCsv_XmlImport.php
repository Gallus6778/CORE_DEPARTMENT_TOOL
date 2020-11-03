<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class profilCsv_XmlImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

            foreach($collection as $key=>$value)
            {
                if($key>0){
                    DB::table('profilCSV_site_name')->insert([
                        'rnc_name'=>$value[0],
                        'site_name'=>$value[1]
                        ]);
                }
            }
    }
}
