<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class updateScriptConfigImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$value)
        {
            if($key>2){
                DB::table('updateScriptConfig')->insert([
                    'wbts_name'=>$value[0],
                    'rnc_name'=>$value[1],
                    'npgep_index'=>$value[2],
                    'ifge_index'=>$value[3],
                    'npgep_ip'=>$value[4],
                    'npgep_gw'=>$value[5],
                    'vlan'=>$value[6],
                    'ip_base_route'=>$value[7],
                    'mini_sctp_port'=>$value[8],
                    'route_bw'=>$value[9],
                    'committed_sig'=>$value[10],
                    'committed_sig_bw'=>$value[11],
                    'ip_cp_up1'=>$value[12],
                    'ip_cp_up2'=>$value[13],
                    'ip_cp_up3'=>$value[14],
                    'ip_cp_up4'=>$value[15],
                    'ip_oam1'=>$value[16],
                    'ip_oam2'=>$value[17],
                    'ip_oam3'=>$value[18],
                    'ip_oam4'=>$value[19],
                    'static_route'=>$value[20],
                    'add_static_route'=>$value[21],
                    'add_ip_base_route'=>$value[22],
                    'map_to_vlan'=>$value[23]
                ]);
            }
        }
    }
}
