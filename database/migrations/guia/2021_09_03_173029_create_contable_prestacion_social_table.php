<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContablePrestacionSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contable_prestacion_social', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concepto', 191);
            $table->string('cuenta_contable', 191);
            $table->string('contrapartida', 191);
            $table->boolean('estado')->default(1);
            $table->boolean('editable')->default(1);
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
        Schema::dropIfExists('contable_prestacion_social');
    }
}
