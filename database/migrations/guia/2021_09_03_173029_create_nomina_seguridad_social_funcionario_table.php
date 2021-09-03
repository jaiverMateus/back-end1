<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominaSeguridadSocialFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomina_seguridad_social_funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefijo', 191);
            $table->string('concepto', 191);
            $table->decimal('porcentaje', 4, 3);
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
        Schema::dropIfExists('nomina_seguridad_social_funcionario');
    }
}
