<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioReferenciaPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_referencia_personal', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('funcionario_id')->index('funcionario_referencia_personal_funcionario_id_foreign');
            $table->string('nombre_completo', 191);
            $table->string('profesion', 191)->nullable();
            $table->string('telefono', 191)->nullable();
            $table->string('celular', 191)->nullable();
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
        Schema::dropIfExists('funcionario_referencia_personal');
    }
}
