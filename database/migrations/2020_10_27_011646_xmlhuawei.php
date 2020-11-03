<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Xmlhuawei extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xmlhuawei', function (Blueprint $table) {
            $table->id();
            $table->string('Directoryname');
            $table->string('nodeb_name');
            $table->string('bts_service_ip');
            $table->string('ipclk_ip_0');
            $table->string('ipclk_ip_1');
            $table->string('rru_name_RRU1');
            $table->string('rru_name_RRU2');
            $table->string('rru_name_RRU3');
            $table->string('devip_ip');
            $table->string('ippath_local_ip');
            $table->string('ippath_peer_ip');
            $table->string('ippath_descri');
            $table->string('nexthop_ip');
            $table->string('omch_ip');
            $table->string('sctp_local_ip');
            $table->string('sctp_peer_ip');
            $table->string('sctp1_descri');
            $table->string('sctp2_descri');
            $table->string('site_name');
            $table->string('cell1_id');
            $table->string('cell2_id');
            $table->string('cell3_id');
            $table->string('ret1_devicename');
            $table->string('ret2_devicename');
            $table->string('ret3_devicename');
            $table->string('cell1_tilt');
            $table->string('cell2_tilt');
            $table->string('cell3_tilt');
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
        Schema::dropIfExists('xmlhuawei');
    }
}
