<?php

namespace App\Exports;

use App\trxBlock_bl_trx;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class trxBlockExport_bl_trx implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            "bsc_names",
            "bcf_id",
            "oam_state",
            "cells_names",
            "trx_id",
            "trx_state",
            "recommandation"
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $trxBlock = new trxBlock_bl_trx;
        return collect($trxBlock->getTrxBlock());
        // return trxBlock::all();
    }
}
