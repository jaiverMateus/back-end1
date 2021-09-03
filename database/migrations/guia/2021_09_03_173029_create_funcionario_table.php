<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('identidad')->default(0)->unique();
            $table->string('dv', 191)->nullable();
            $table->string('nombres', 191);
            $table->string('apellidos', 191);
            $table->boolean('liquidado')->default(0);
            $table->date('fecha_nacimiento')->nullable();
            $table->text('lugar_nacimiento')->nullable();
            $table->enum('tipo_sangre', ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])->nullable();
            $table->enum('tipo_turno', ['Fijo', 'Rotativo'])->nullable();
            $table->integer('turno_fijo_id')->nullable();
            $table->string('telefono', 191)->nullable();
            $table->string('celular', 191)->nullable();
            $table->string('email', 191)->unique();
            $table->text('direccion_residencia')->nullable();
            $table->enum('estado_civil', ['Soltero(a)', 'Casado(a)', 'Divorciado(a)', 'Viudo(a)', 'Union Libre'])->nullable();
            $table->string('grado_instruccion', 191)->nullable();
            $table->string('titulo_estudio', 191)->nullable();
            $table->string('talla_pantalon', 191)->nullable();
            $table->string('talla_bata', 191)->nullable();
            $table->string('talla_botas', 191)->nullable();
            $table->string('talla_camisa', 191)->nullable();
            $table->string('image', 191)->nullable();
            $table->integer('salario')->nullable();
            $table->boolean('subsidio_transporte')->default(0);
            $table->date('fecha_ingreso')->nullable();
            $table->integer('numero_hijos')->default(0);
            $table->string('personId', 191)->nullable();
            $table->string('persistedFaceId', 191)->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->enum('sexo', ['Femenino', 'Masculino'])->nullable();
            $table->unsignedInteger('dependencia_id')->nullable()->index('funcionario_dependencia_id_foreign');
            $table->unsignedInteger('cargo_id')->nullable()->index('funcionario_cargo_id_foreign');
            $table->timestamps();
            $table->unsignedInteger('eps_id')->nullable()->index('funcionario_eps_id_foreign');
            $table->unsignedInteger('cesantias_id')->nullable()->index('funcionario_cesantias_id_foreign');
            $table->unsignedInteger('pensiones_id')->nullable()->index('funcionario_pensiones_id_foreign');
            $table->unsignedInteger('caja_compensacion_id')->nullable()->index('funcionario_caja_compensacion_id_foreign');
            $table->unsignedInteger('tipo_contrato_id')->nullable()->index('funcionario_tipo_contrato_id_foreign');
            $table->unsignedInteger('nomina_riesgos_arl_id')->nullable()->default(1)->index('funcionario_nomina_riesgos_arl_id_foreign');
            $table->unsignedInteger('jefe_id')->nullable()->index('funcionario_jefe_id_foreign');
            $table->enum('estado', ['Activo', 'Inactivo', 'Liquidado'])->default('Activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
}
