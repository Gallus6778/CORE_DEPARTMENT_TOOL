<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlTrx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bl_trx', function (Blueprint $table) {
            $table->string('bsc_names');
            $table->string('bcf_id');
            $table->string('oam_state');
            $table->string('cells_names');
            $table->string('trx_id')->nullable($value = true);
            $table->string('trx_state')->nullable($value = true);
            $table->string('recommandation')->nullable($value = true);
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
        Schema::dropIfExists('bl_trx');
    }
}
