<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDataNodeBPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updateDataNodeBPlan', function (Blueprint $table) {
            $table->string('sit');
            $table->string('tinh');
            $table->string('rnc_name');
            $table->string('lac');
            $table->string('ma_tram');
            $table->string('ip_network_service');
            $table->string('ip_service');
            $table->string('gateway_service');
            $table->string('ip_mask_service');
            $table->string('ip_network_oam');
            $table->string('ip1_oam');
            $table->string('ip2_oam');
            $table->string('gateway_oam');
            $table->string('ip_mask_oam');
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
        Schema::dropIfExists('updateDataNodeBPlan');
    }
}
