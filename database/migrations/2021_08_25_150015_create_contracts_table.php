<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('number');
            $table->unsignedInteger('administrator_id');
            $table->enum("contract_type",["Capita","Evento","Particular"]);
            $table->unsignedInteger('payment_method_id');
            $table->unsignedInteger('benefit_plan_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('policy');
            $table->string('price');
            $table->unsignedInteger('price_list_id');
            $table->string('variation');
            $table->string('company_id');
            $table->string('departament_id');
            $table->string('municipality_id');
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
        Schema::dropIfExists('contracts');
    }
}
