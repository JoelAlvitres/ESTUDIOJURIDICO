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
        Schema::create('novedads', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Título de la novedad
            $table->string('slug')->unique(); // Slug para URLs amigables
            $table->text('contenido'); // Contenido principal de la novedad (usará un editor de texto enriquecido)
            $table->string('imagen_destacada')->nullable(); // Ruta de la imagen principal
            $table->string('autor')->nullable(); // Opcional: Autor de la novedad
            $table->timestamp('fecha_publicacion')->default(now()); // Fecha de publicación
            $table->boolean('publicado')->default(true); // Si está publicado o en borrador
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novedads');
    }
};