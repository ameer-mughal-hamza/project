<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('age')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('temprature')->nullable();
            $table->string('medicine_type');
            $table->string('medicine_name');
            $table->string('medicine_quantity');
            $table->string('history')->nullable();
            $table->integer('patient_id');
            $table->integer('doctor_id');
            $table->boolean('deleted_flag')->default(0);
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
        Schema::dropIfExists('medicines');
    }
}
