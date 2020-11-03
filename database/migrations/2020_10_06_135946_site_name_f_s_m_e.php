<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SiteNameFSME extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siteNameFSME', function (Blueprint $table) {
            $table->string('rnc_name');
            $table->string('npgep_id');
            $table->string('ifge_id');
            $table->string('vlan');
            $table->string('npgep_ip');
            $table->string('npgep_gw');
            $table->string('site_name');
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
        Schema::dropIfExists('siteNameFSME');
    }
}
