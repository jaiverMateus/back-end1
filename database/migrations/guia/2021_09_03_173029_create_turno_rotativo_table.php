<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnoRotativoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turno_rotativo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 191);
            $table->boolean('extras');
            $table->integer('tolerancia_entrada');
            $table->integer('tolerancia_salida');
            $table->string('hora_inicio_uno', 191);
            $table->string('hora_fin_uno', 191);
            $table->string('hora_inicio_dos', 191)->nullable();
            $table->string('hora_fin_dos', 191)->nullable();
            $table->enum('jornada_turno', ['Diurno', 'Nocturno']);
            $table->string('color', 191);
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
        Schema::dropIfExists('turno_rotativo');
    }
}
