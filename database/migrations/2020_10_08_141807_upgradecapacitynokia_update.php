<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpgradecapacitynokiaUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgradecapacitynokiaUpdate', function (Blueprint $table) {
            $table->string('bsc_name');
            $table->string('bcf_id');
            $table->string('bts_id');
            $table->string('adm_state');
            $table->string('op_state');
            $table->string('cell_name');
            $table->string('trx_id');
            $table->string('bcsu_id');
            $table->string('bcsu_ip')->nullable();
            $table->string('trx_state');
            $table->string('trx_power');
            $table->string('dname');
            $table->string('gtrx_state');
            $table->string('etrx_state');
            $table->string('pref_state');
            $table->string('freqValue');
            $table->string('tscValue');
//            $table->string('bcsu_ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upgradecapacitynokiaUpdate');
    }
}
