<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorevasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factorevas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_carrera');
            $table->integer('id_convocatoria');
            $table->integer('id_concepto');
            $table->string('item',10);
            $table->text('detalle');
            $table->float('maximo',8,2);
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
        Schema::dropIfExists('factorevas');
    }
}
