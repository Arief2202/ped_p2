<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designators', function (Blueprint $table) {
            $table->id();
            $table->string("designator");
            $table->string("deskripsi");
            $table->string("satuan");
            $table->integer("p5_material");
            $table->integer("p5_jasa");
            $table->integer("p10_material");
            $table->integer("p10_jasa");
            $table->string("jenis_material")->nullable();
            $table->string("specs")->nullable();
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
        Schema::dropIfExists('designators');
    }
}
