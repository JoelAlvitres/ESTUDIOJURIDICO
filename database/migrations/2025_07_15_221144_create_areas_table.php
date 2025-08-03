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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del área (ej. Derecho Corporativo)
            $table->string('slug')->unique(); // Slug para URLs amigables
            $table->text('descripcion_corta')->nullable(); // Breve descripción para listados
            $table->longText('contenido'); // Contenido completo del área (usará un editor de texto enriquecido)
            $table->string('icono')->nullable(); // Opcional: para un icono SVG o clase de icono
            $table->string('imagen_destacada')->nullable(); // Opcional: imagen para el detalle del área
            $table->integer('orden')->default(0); // Para ordenar las áreas en el frontend
            $table->boolean('publicado')->default(true); // Si está publicado o en borrador
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};