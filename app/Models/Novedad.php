<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'slug',
        'contenido',
        'imagen_destacada',
        'autor',
        'fecha_publicacion',
        'publicado',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_publicacion' => 'datetime', // ¡Añade esta línea!
        'publicado' => 'boolean', // Opcional, pero buena práctica si no lo tenías
    ];
}