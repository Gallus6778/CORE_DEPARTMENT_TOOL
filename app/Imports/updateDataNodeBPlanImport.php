<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class updateDataNodeBPlanImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$value)
        {
            if($key>3){
                DB::table('updateDataNodeBPlan')->insert([
                    'sit'=>$value[1],
                    'tinh'=>$value[3],
                    'rnc_name'=>$value[4],
                    'lac'=>$value[5],
                    'ma_tram'=>$value[6],
                    'ip_network_service'=>$value[7],
                    'ip_service'=>$value[8],
                    'gateway_service'=>$value[9],
                    'ip_mask_service'=>$value[10],
                    'ip_network_oam'=>$value[11],
                    'ip1_oam'=>$value[12],
                    'ip2_oam'=>$value[13],
                    'gateway_oam'=>$value[14],
                    'ip_mask_oam'=>$value[15],
                ]);
            }
        }
    }
}
