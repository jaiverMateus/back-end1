<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioExperienciaLaboralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_experiencia_laboral', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('funcionario_id')->index('funcionario_experiencia_laboral_funcionario_id_foreign');
            $table->string('nombre_empresa', 191);
            $table->string('cargo', 191)->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->text('labores')->nullable();
            $table->string('nombre_jefe', 191)->nullable();
            $table->string('telefono_empresa', 191);
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
        Schema::dropIfExists('funcionario_experiencia_laboral');
    }
}
