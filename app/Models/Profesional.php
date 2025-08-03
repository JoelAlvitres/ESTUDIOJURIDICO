<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Necesario para el slug si lo usas en el modelo

class Profesional extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos. Asegúrate de que coincida EXACTAMENTE.
    protected $table = 'profesionales';

    // Campos que se pueden asignar masivamente (llenar desde un formulario, como Filament)
    protected $fillable = [
        'nombre_completo',
        'slug',
        'cargo',
        'especialidad',
        'biografia_corta',
        'biografia_completa',
        'foto',
        'enlace_linkedin',
        'email',
        'orden',
        'publicado',
    ];

    // Casteo de atributos para asegurar que 'publicado' se trate como un booleano
    protected $casts = [
        'publicado' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Opcional: Si no estás usando `reactive()` y `afterStateUpdated` en Filament para el slug,
    // puedes descomentar este método para que el slug se genere automáticamente al guardar el modelo.
    // public static function boot()
    // {
    //     parent::boot();
    //     static::saving(function ($profesional) {
    //         if (empty($profesional->slug) || $profesional->isDirty('nombre_completo')) {
    //             $profesional->slug = Str::slug($profesional->nombre_completo);
    //         }
    //     });
    // }
}