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
        Schema::create('alumnosXfamiliars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumno')
            ->constrained('alumnos', 'id_alumno')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('id_familiar')
            ->constrained('familiars', 'id')
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
        Schema::dropIfExists('alumnosXfamiliars');
    }
};
