<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class upgradeFrequency implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // foreach($data->toArray() as $key=>$value)
        // {
            {
                foreach($collection as $key=>$value)
                if($key>1)
                {
                    DB::table('upgradefrequency')->insert(['cells_names'=>$value[1],'sites_names'=>$value[0],'trx_id'=>$value[2],'tsc'=>$value[3],'frequency'=>$value[4],'ch0_type'=>$value[5],'ch1_type'=>$value[6],'ch2_type'=>$value[7],'ch3_type'=>$value[8],'ch4_type'=>$value[9],'ch5_type'=>$value[10],'ch6_type'=>$value[11],'ch7_type'=>$value[12],'mPlaneRemoteIpAddress'=>$value[13],'cuPlaneLocalIpAddress'=>$value[14],'index_bcsu'=>$value[15],'sctp_port'=>$value[16]]);

                        // 'site_names'=>$row['site_names'],
                        // 'cells_id'=>$row['cells_names'],
                        // 'trx_id'=>$row['trx_id'],
                        // 'tsc'=>$row['tsc'],
                        // 'frequency'=>$row['frequency'],
                        // 'ch0_type'=>$row['ch0_type'],
                        // 'ch1_type'=>$row['ch1_type'],
                        // 'ch2_type'=>$row['ch2_type'],
                        // 'ch3_type'=>$row['ch3_type'],
                        // 'ch4_type'=>$row['ch4_type'],
                        // 'ch5_type'=>$row['ch5_type'],
                        // 'ch6_type'=>$row['ch6_type'],
                        // 'ch7_type'=>$row['ch7_type'],
                        // 'mPlaneRemoteIpAddress'=>$row['mPlaneRemoteIpAddress'],
                        // 'cuPlaneLocalIpAddress'=>$row['cuPlaneLocalIpAddress'],
                        // 'index_bcsu'=>$row['index_bcsu'],
                        // 'stcp_port'=>$row['sctp_port']
                }
            }
            // if(!empty($insert_data))
            // {
            //     DB::table('upgradeFrequency')->insert($insert_data);
            // }
        }

    }

