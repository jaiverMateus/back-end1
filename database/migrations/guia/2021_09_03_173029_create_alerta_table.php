<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha')->nullable();
            $table->text('detalles')->nullable();
            $table->integer('funcionario_id');
            $table->string('estado', 191);
            $table->string('tipo', 191);
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
        Schema::dropIfExists('alerta');
    }
}
