<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class trxBlock_bl_trx extends Model
{
    protected $table ='trx_blocks';

    public function getTrxBlock(){
        // $records = DB::table('trx_blocks')->DB::select('select "bsc_names","bcf_id","oam_state","cells_names","trx_id","trx_state","recommandation" from trx_blocks where trx_state <> :trx_state', ['trx_state' => ''])->get();

        $records = DB::table('bl_trx')->select("bsc_names","bcf_id","oam_state","cells_names","trx_id","trx_state","recommandation")->get()->toArray();

        return $records;
    }
}
