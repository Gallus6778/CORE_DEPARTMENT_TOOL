<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDataNpgep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updateData_npgep', function (Blueprint $table) {
            $table->string('rnc_names');
            $table->integer('npgep_index');
            $table->integer('ifge_index');
            $table->string('rnc_npgep_ifge');
            $table->string('vlan');
            $table->string('npgep_ip');
            $table->string('gateway');
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
        Schema::dropIfExists('updateData_npgep');
    }
}
