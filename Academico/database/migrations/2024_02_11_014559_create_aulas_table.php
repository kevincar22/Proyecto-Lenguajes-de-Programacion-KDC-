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
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',60);
            $table->string('tema',100)->nullable();
            $table->date('FechaInicio')->nullable();
            $table->bigInteger('IdAsignatura')->unsigned()->index();
            $table->foreign('IdAsignatura')->references('id')->on('asignaturas')->onDelete('no action');
            $table->bigInteger('IdProfesor')->unsigned()->index();
            $table->foreign('IdProfesor')->references('id')->on('profesors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
