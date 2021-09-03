<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiarioTurnoFijoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diario_turno_fijo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('funcionario_id')->index('diario_turno_fijo_funcionario_id_foreign');
            $table->date('fecha');
            $table->unsignedInteger('turno_fijo_id')->index('diario_turno_fijo_turno_fijo_id_foreign');
            $table->time('hora_entrada_uno')->nullable();
            $table->time('hora_salida_uno')->nullable();
            $table->time('hora_entrada_dos')->nullable();
            $table->time('hora_salida_dos')->nullable();
            $table->string('img_uno', 191)->nullable();
            $table->string('img_dos', 191)->nullable();
            $table->string('img_tres', 191)->nullable();
            $table->string('img_cuatro', 191)->nullable();
            $table->string('latitud', 191)->nullable();
            $table->string('longitud', 191)->nullable();
            $table->string('latitud_dos', 191)->nullable();
            $table->string('longitud_dos', 191)->nullable();
            $table->string('latitud_tres', 191)->nullable();
            $table->string('longitud_tres', 191)->nullable();
            $table->string('latitud_cuatro', 191)->nullable();
            $table->string('longitud_cuatro', 191)->nullable();
            $table->timestamps();
            $table->decimal('temp_uno', 11, 1)->nullable()->default(0.0);
            $table->decimal('temp_dos', 11, 1)->nullable()->default(0.0);
            $table->decimal('temp_tres', 11, 1)->nullable()->default(0.0);
            $table->decimal('temp_cuatro', 11, 1)->nullable()->default(0.0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diario_turno_fijo');
    }
}
