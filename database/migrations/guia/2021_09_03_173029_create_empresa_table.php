<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social', 191);
            $table->string('imagen', 200)->nullable();
            $table->enum('tipo_documento', ['NIT', 'Cédula de ciudadanía', 'Cédula de extranjería', 'Tarjeta de identidad']);
            $table->string('numero_documento', 191);
            $table->integer('digito_verificacion');
            $table->date('fecha_constitucion')->nullable();
            $table->string('email_contacto', 191)->unique();
            $table->string('telefono_contacto', 191)->nullable();
            $table->integer('max_horas_extras')->default(0);
            $table->integer('max_festivos_legales')->default(0);
            $table->integer('max_llegadas_tarde')->default(0);
            $table->integer('salario_base')->nullable();
            $table->integer('auxilio_transporte')->nullable();
            $table->string('hora_inicio_noche', 191)->nullable();
            $table->string('hora_fin_noche', 191)->nullable();
            $table->text('festivos')->nullable();
            $table->string('frecuencia_pago', 191)->nullable();
            $table->string('medio_pago', 191)->nullable();
            $table->string('tipo_cuenta', 191)->nullable();
            $table->string('numero_cuenta', 191)->nullable();
            $table->string('operador_pago', 191)->nullable();
            $table->boolean('ley_1429')->default(0);
            $table->boolean('ley_590')->default(0);
            $table->boolean('ley_1607')->default(1);
            $table->timestamps();
            $table->unsignedInteger('arl_id')->nullable()->index('empresa_arl_id_foreign');
            $table->unsignedInteger('banco_id')->nullable()->index('empresa_banco_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
