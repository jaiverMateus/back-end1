<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioContactoEmergenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_contacto_emergencia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('funcionario_id')->index('funcionario_contacto_emergencia_funcionario_id_foreign');
            $table->string('parentesco', 191);
            $table->string('nombre_completo', 191);
            $table->string('telefono', 191)->nullable();
            $table->string('celular', 191)->nullable();
            $table->text('direccion')->nullable();
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
        Schema::dropIfExists('funcionario_contacto_emergencia');
    }
}
