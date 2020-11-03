<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Upgradecapacitynokiapersp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgradecapacitynokiapersp', function (Blueprint $table) {
            $table->id();
            $table->string('bsc_names');
            $table->string('sites_names');
            $table->string('cells_names');
            $table->integer('trx_id');
            $table->string('tsc');
            $table->string('frequency');
            $table->string('ch0_type');
            $table->string('ch1_type');
            $table->string('ch2_type');
            $table->string('ch3_type');
            $table->string('ch4_type');
            $table->string('ch5_type');
            $table->string('ch6_type');
            $table->string('ch7_type');
            $table->string('mPlaneRemoteIpAddress');
            $table->string('cuPlaneLocalIpAddress');
            $table->string('index_bcsu');
            $table->string('sctp_port');
            $table->string('dname');
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
        Schema::dropIfExists('upgradecapacitynokiapersp');
    }
}
