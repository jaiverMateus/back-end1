<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiarioTurnoRotativoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diario_turno_rotativo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('funcionario_id')->nullable()->index('diario_turno_rotativo_funcionario_id_foreign');
            $table->date('fecha')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->unsignedInteger('turno_rotativo_id')->index('diario_turno_rotativo_turno_rotativo_id_foreign');
            $table->time('hora_entrada_uno')->nullable();
            $table->time('hora_salida_uno')->nullable();
            $table->string('img_uno', 191)->nullable();
            $table->decimal('temp_uno', 10, 1)->nullable()->default(0.0);
            $table->decimal('temp_dos', 10, 1)->nullable()->default(0.0);
            $table->string('img_dos', 191)->nullable();
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
        Schema::dropIfExists('diario_turno_rotativo');
    }
}
