<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_documento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('funcionario_id')->index('funcionario_documento_funcionario_id_foreign');
            $table->string('nombre', 191);
            $table->string('path', 191);
            $table->string('extension', 191);
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
        Schema::dropIfExists('funcionario_documento');
    }
}
