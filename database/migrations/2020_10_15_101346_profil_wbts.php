<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfilWbts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilWbts', function (Blueprint $table) {
            $table->id();
            $table->string('$operation')->nullable();
            $table->string('$dn')->nullable();
            $table->string('$siteId')->nullable();
            $table->string('$templateName')->nullable();
            $table->string('name')->nullable();
            $table->string('WBTSName')->nullable();
            $table->string('BTSAdditionalInfo')->nullable();
            $table->string('NBAPCommMode')->nullable();
            $table->string('IPBasedRouteIdIub')->nullable();
            $table->string('IPNBId')->nullable();
            $table->string('HSUPAXUsersEnabled')->nullable();
            $table->string('DSCPLow')->nullable();
            $table->string('DSCPMedHSPA')->nullable();
            $table->string('DSCPHigh')->nullable();
            $table->string('DSCPMedDCH')->nullable();
            $table->string('HSDPAULCToDSCP')->nullable();
            $table->string('HSUPADLCToDSCP')->nullable();
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
        Schema::dropIfExists('profilWbts');
    }
}
