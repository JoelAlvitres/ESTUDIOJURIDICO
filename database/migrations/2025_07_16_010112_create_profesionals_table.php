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
        Schema::create('profesionales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('slug')->unique(); // El slug es importante que sea único
            $table->string('cargo')->nullable();
            $table->string('especialidad')->nullable();
            $table->text('biografia_corta')->nullable(); // RichEditor usa 'text' o 'longText'
            $table->longText('biografia_completa')->nullable(); // Para contenido más largo
            $table->string('foto')->nullable(); // Para guardar la ruta de la imagen
            $table->string('enlace_linkedin')->nullable();
            $table->string('email')->nullable();
            $table->integer('orden')->default(0); // Para el ordenamiento, con un valor por defecto
            $table->boolean('publicado')->default(false); // Para mostrar/ocultar en el frontend
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesionales');
    }
};