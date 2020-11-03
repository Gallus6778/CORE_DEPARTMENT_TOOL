<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class hw_3G_dataImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$value){
            if($key>2)
            {
//                dd($value[0]);
                DB::table('hw_3g_data')->insert([
                    'rnc'=>$value[0],
                    'ma_tram'=>$value[1],
                    'rnc_cp_ip'=>$value[2],
                    'rnc_up_ip'=>$value[3],
                    'ip_clock_server1'=>$value[4],
                    'ip_clock_server2'=>$value[5]
                ]);
            }
        }
    }
}
