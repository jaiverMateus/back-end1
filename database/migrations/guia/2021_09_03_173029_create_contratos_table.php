<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('centro_costo_id')->nullable();
            $table->unsignedBigInteger('dependencia_id')->nullable();
            $table->unsignedBigInteger('turno_fijo_id')->nullable();
            $table->unsignedBigInteger('jefe_id')->nullable();
            $table->string('vacaciones_acumuladas', 191)->nullable()->default('0');
            $table->string('fecha_inicio', 191)->nullable();
            $table->string('fecha_fin', 191)->nullable();
            $table->string('salario', 191)->nullable();
            $table->string('cargo_id', 191)->nullable();
            $table->unsignedInteger('tipo_contrato_id')->nullable()->index('funcionario_tipo_contrato_id_foreign');
            $table->boolean('liquidado')->default(0);
            $table->boolean('subsidio_transporte')->default(0);
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
        Schema::dropIfExists('contratos');
    }
}
