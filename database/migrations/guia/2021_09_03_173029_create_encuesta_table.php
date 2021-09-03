<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 500)->nullable();
            $table->enum('tipo_aplicacion', ['sms', 'correo', 'ambos'])->nullable();
            $table->enum('frecuencia_aplicacion', ['diaria', 'semanal', 'quincenal', 'mensual', 'trimestral', 'semestral', 'anual', 'bimensual'])->nullable();
            $table->enum('restrictiva', ['si', 'no'])->nullable();
            $table->enum('estado', ['Activa', 'Inactiva'])->default('Activa');
            $table->text('descripcion')->nullable();
            $table->text('terminos')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_envio')->nullable();
            $table->text('minutos_anticipacion')->nullable();
            $table->unsignedBigInteger('centro_costo_id')->nullable();
            $table->unsignedBigInteger('dependencia_id')->nullable();
            $table->timestamps();
            $table->string('link', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta');
    }
}
