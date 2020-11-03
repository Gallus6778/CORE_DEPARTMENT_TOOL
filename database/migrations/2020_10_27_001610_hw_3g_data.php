<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hw3gData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hw_3g_data', function (Blueprint $table) {
            $table->id();
            $table->string('rnc');
            $table->string('ma_tram');
            $table->string('rnc_cp_ip');
            $table->string('rnc_up_ip');
            $table->string('ip_clock_server1');
            $table->string('ip_clock_server2');
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
        Schema::dropIfExists('hw_3g_data');
    }
}
