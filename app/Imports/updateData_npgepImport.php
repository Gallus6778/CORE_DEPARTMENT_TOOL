<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class updateData_npgepImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$value)
        {
            if($key>1){
                DB::table('updateData_npgep')->insert([
                    'rnc_names' => $value[0],
                    'npgep_index' => $value[1],
                    'ifge_index' => $value[2],
                    'rnc_npgep_ifge' => $value[3],
                    'vlan' =>$value[4],
                    'npgep_ip' => $value[5],
                    'gateway' => $value[6],
                ]);
            }


        }
    }
}
