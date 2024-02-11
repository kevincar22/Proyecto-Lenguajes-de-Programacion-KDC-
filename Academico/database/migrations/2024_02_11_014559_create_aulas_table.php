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
        Schema::create('aula', function (Blueprint $table) {
            $table->id('idaula');
            $table->string('codigo',60);
            $table->bigInteger('idasignatura')->unsigned()->index();
            $table->foreign('idasignatura')->references('idmateria')->on('materia')->onDelete('no action');
            $table->bigInteger('idprofesor')->unsigned()->index();
            $table->foreign('idprofesor')->references('idprofesor')->on('profesor')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aula');
    }
};
