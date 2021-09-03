<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensiones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit', 191)->unique();
            $table->string('nombre', 191);
            $table->string('cuenta_contable', 191)->default('238030');
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
        Schema::dropIfExists('pensiones');
    }
}
