<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonificacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('contable_ingreso_id');
            $table->string('valor', 191);
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
        Schema::dropIfExists('bonificacions');
    }
}
