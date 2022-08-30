<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id();
            $table->string('ci',20);
            $table->string('fechanac',20);
            $table->text('codex_postulante');
            $table->text('codex_comp');
            $table->integer('id_item');
            $table->integer('id_convocatoria');
            $table->integer('id_carrera');
            $table->text('file');
            $table->string('fisico',5);
            $table->string('puntos',5);
            $table->string('habilitado',100);
            $table->string('verificado',5);
            $table->string('cumple',200);
            $table->text('detalle');
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
        Schema::dropIfExists('postulantes');
    }
}
