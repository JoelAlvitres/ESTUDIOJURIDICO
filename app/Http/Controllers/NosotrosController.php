<?php

namespace App\Http\Controllers;

use App\Models\Profesional; // Importa el modelo Profesional
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Para depuración

class NosotrosController extends Controller
{
    public function index()
    {
        Log::info('--- Iniciando NosotrosController@index (Profesionales) ---'); // Log de inicio

        // Obtener todos los profesionales que están publicados (publicado = true)
        // y ordenarlos por el campo 'orden' de forma ascendente.
        $profesionales = Profesional::where('publicado', true)
                                    ->orderBy('orden', 'asc')
                                    ->get();

        Log::info('Consulta de Profesionales ejecutada. Cantidad de resultados: ' . $profesionales->count()); // Log la cantidad
        if ($profesionales->isEmpty()) {
            Log::warning('No se encontraron profesionales con "publicado = true".'); // Advertencia si está vacío
        } else {
            foreach ($profesionales as $profesional) {
                Log::info('Profesional encontrado: ' . $profesional->nombre_completo . ', ID: ' . $profesional->id . ', Publicado (modelo): ' . ($profesional->publicado ? 'true' : 'false'));
            }
        }

        Log::info('--- Finalizando NosotrosController@index (Profesionales) ---'); // Log de fin

        // Pasa la variable $profesionales a la vista 'web.nosotros'
        return view('web.nosotros', compact('profesionales'));
    }
}