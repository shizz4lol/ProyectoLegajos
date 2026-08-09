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
        Schema::create('cursosXdivisions', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');            
            $table->string('turno');
            $table->foreignId('id_curso')
            ->constrained('cursos','id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('id_division')
            ->constrained('divisions','id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursosXdivisions');
    }
};
