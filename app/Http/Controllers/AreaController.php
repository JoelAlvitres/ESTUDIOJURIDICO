<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Para depuración

class AreaController extends Controller
{
    /**
     * Muestra una lista de todas las áreas de práctica.
     */
    public function index()
    {
        Log::info('--- Iniciando AreaController@index ---');
        $areas = Area::all(); // Obtiene todas las áreas

        Log::info('Áreas encontradas: ' . $areas->count());
        if ($areas->isEmpty()) {
            Log::warning('No se encontraron áreas de práctica.');
        }

        // Pasa las áreas a la vista de listado
        return view('web.areas', compact('areas'));
    }

    /**
     * Muestra el detalle de un área específica por su slug.
     */
    public function show($slug)
    {
        Log::info('--- Iniciando AreaController@show para slug: ' . $slug . ' ---');

        // Busca el área por su slug
        $area = Area::where('slug', $slug)->firstOrFail(); // firstOrFail lanzará 404 si no la encuentra

        Log::info('Área encontrada: ' . $area->nombre);

        // Pasa el área a la vista de detalle
        return view('web.area-detalle', compact('area'));
    }
}
