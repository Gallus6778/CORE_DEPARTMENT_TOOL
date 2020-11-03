<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class xmlHuaweiUpdateImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$value){
            if($key>=1)
            {
                DB::table('xmlHuaweiUpdate')->insert([
                    'site'=>$value[0],
                    'cell'=>$value[1],
                    'rien'=>$value[2],
                    'cell-config'=>$value[3],
                    'lac'=>$value[4],
                    'rnc'=>$value[5],
                    'vendor'=>$value[6],
                    'ci'=>$value[7],
                    'psc'=>$value[8],
                    'frequency_ul'=>$value[9],
                    'frequency_dl'=>$value[10]
                ]);
            }
        }
    }
}
