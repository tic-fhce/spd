<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApelacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apelacions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_postulante');
            $table->integer('id_convocatoria');
            $table->integer('id_item');
            $table->string('por',200);
            $table->text('detalle');
            $table->text('obs');
            $table->text('respuesta');
            $table->text('estado');
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
        Schema::dropIfExists('apelacions');
    }
}
