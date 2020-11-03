<?php

namespace App\Exports;

use App\trxBlock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class trxBlockExport implements FromCollection,WithHeadings
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
        $trxBlock = new trxBlock;
        return collect($trxBlock->getTrxBlock());

    }
}
