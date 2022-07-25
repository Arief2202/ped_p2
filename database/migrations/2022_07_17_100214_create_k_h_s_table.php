<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKHSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_h_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId("witel_id");
            $table->foreignId("sto_id");
            $table->string("id_project");
            // $table->string("program_sap");
            $table->string("tematik");
            $table->string("nama_lop_feeder");
            $table->string("periode_pengajuan");
            $table->string("status");
            $table->string("kebutuhan")->nullable();
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
        Schema::dropIfExists('k_h_s');
    }
}
