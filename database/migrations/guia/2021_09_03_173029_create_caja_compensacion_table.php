<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajaCompensacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caja_compensacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 191);
            $table->string('nit', 191)->unique();
            $table->string('cuenta_contable', 191)->default('237010');
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
        Schema::dropIfExists('caja_compensacion');
    }
}
