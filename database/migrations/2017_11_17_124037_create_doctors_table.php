<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('email');
            $table->longText('description');
            $table->integer('fee')->unsigned();
            $table->string('image_url')->nullable();
            $table->boolean('pmdc_verified')->default(0);
            $table->string('password');
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
        Schema::dropIfExists('doctors');
    }
}
