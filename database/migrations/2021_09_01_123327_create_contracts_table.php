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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('number');
            $table->unsignedInteger('administrator_id');
            $table->enum('contract_type', ['Capita', 'Evento', 'Particular']);
            $table->unsignedInteger('payment_method_id');
            $table->unsignedInteger('benefits_plan_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('policy');
            $table->string('price');
            $table->unsignedInteger('price_list_id');
            $table->string('variation')->nullable();
            $table->timestamps();
            $table->integer('company_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('regimen_id')->nullable();
            $table->integer('location_id')->nullable();
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
