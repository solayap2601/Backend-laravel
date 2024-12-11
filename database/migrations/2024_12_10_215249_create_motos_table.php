<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('motoss', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('color');
            $table->integer('anio');
            $table->string('placa')->unique();
            $table->timestamps();
        });
    } 

    public function down()
    {
        Schema::dropIfExists('motos');
    }
};