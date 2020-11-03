<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SiteName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SiteName', function (Blueprint $table) {
            $table->string('site_name');
            $table->string('bcf_id')->nullable($value = true);
            $table->string('module_location');
            $table->string('bsc_name');
            $table->string('unicastMasterIpAddress');
            $table->string('bcsu_ip');
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
        Schema::dropIfExists('SiteName');
    }
}
