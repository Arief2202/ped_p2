<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanOltTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan_olt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('witel_id');
            $table->foreignId('sto_id');
            $table->string('kode_sto')->nullable();
            $table->string('alamat')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->string('tahap_pemenuhan')->nullable();
            $table->string('pln')->nullable();
            $table->string('uplink')->nullable();
            $table->string('metro')->nullable();
            $table->string('jarak_sto')->nullable();
            $table->string('sitac')->nullable();
            $table->integer('jml_odp')->nullable();
            $table->string('kebutuhan')->nullable();
            $table->string('prioritas')->nullable();
            $table->string('propose_box')->nullable();
            $table->string('jadwal_order')->nullable();
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
        Schema::dropIfExists('usulan_olt');
    }
}
