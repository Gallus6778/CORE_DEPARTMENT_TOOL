<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateScriptConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updateScriptConfig', function (Blueprint $table) {
            $table->id();
            $table->string('wbts_name');
            $table->string('rnc_name');
            $table->string('npgep_index');
            $table->string('ifge_index');
            $table->string('npgep_ip');
            $table->string('npgep_gw');
            $table->string('vlan');
            $table->string('ip_base_route');
            $table->string('mini_sctp_port')->nullable();
            $table->string('route_bw');
            $table->string('committed_sig');
            $table->string('committed_sig_bw');
            $table->string('ip_cp_up1');
            $table->string('ip_cp_up2');
            $table->string('ip_cp_up3');
            $table->string('ip_cp_up4');
            $table->string('ip_oam1');
            $table->string('ip_oam2');
            $table->string('ip_oam3');
            $table->string('ip_oam4');
            $table->string('static_route');
            $table->string('add_static_route');
            $table->string('add_ip_base_route');
            $table->string('map_to_vlan');
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
        Schema::dropIfExists('updateScriptConfig');
    }
}
