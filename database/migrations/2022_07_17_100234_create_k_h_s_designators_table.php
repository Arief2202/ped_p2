<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKHSDesignatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_h_s_designators', function (Blueprint $table) {
            $table->id();
            $table->integer("khs_id");
            $table->integer("designator_id");
            $table->integer("jumlah");
            $table->integer("total_material");
            $table->integer("total_jasa");
            $table->integer("total");
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
        Schema::dropIfExists('k_h_s_designators');
    }
}
