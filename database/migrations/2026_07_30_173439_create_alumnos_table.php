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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id_alumno');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('dni')->unique();
            $table->string('email');
            $table->integer('telefono')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('acta_nacimiento')->nullable();
            $table->string('inscripcion')->nullable();
            $table->string('constanciaregular')->nullable();
            $table->string('apto_herramientas')->nullable();
            $table->string('certificado7mo')->nullable();
            $table->foreignId('id_curso')
            ->constrained('cursos', 'id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
