<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfilCSV extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilCSV', function (Blueprint $table) {
            $table->id();
            $table->string('$operation')->nullable();
            $table->string('$dn')->nullable();
            $table->string('$templateName')->nullable();
            $table->string('NodeBIPAddress')->nullable();
            $table->string('CControlPortID')->nullable();
            $table->string('DNBAPICSUIndex')->nullable();
            $table->string('SCTPPortNumberDNBAP')->nullable();
            $table->string('MinSCTPPortIub')->nullable();
            $table->string('name')->nullable();
            $table->string('NBAPDSCP')->nullable();
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
        Schema::dropIfExists('profilCSV');
    }
}
