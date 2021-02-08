<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id();
            $table->string('gestion',250);
            $table->integer('id_carrera');
            $table->string('fecha_ini',50);
            $table->string('fecha_fin',50);
            $table->string('numeroconvocatoria',50);
            $table->integer('id_concepto');
            $table->text('detalle');
            $table->string('estado',2);
            $table->text('pdf');

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
        Schema::dropIfExists('convocatorias');
    }
}
