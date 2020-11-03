<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class XmlHuaweiUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xmlHuaweiUpdate', function (Blueprint $table) {
            $table->id();
            $table->string('site');
            $table->string('cell');
            $table->string('rien')->nullable();
            $table->string('cell-config');
            $table->string('lac');
            $table->string('rnc');
            $table->string('vendor');
            $table->string('ci');
            $table->string('psc');
            $table->string('frequency_ul');
            $table->string('frequency_dl');
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
        Schema::dropIfExists('xmlHuaweiUpdate');
    }
}
