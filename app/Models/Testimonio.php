<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    use HasFactory;

    // Asegúrate de que el nombre de la tabla es correcto
    protected $table = 'testimonios';

    // AÑADE 'testimonio' a este array para permitir que Filament lo guarde.
    protected $fillable = [
        'nombre_cliente',
        'cargo',
        'testimonio', // ¡Este campo es fundamental!
        'publicado',  // También debes permitir la asignación para este campo
    ];
}
