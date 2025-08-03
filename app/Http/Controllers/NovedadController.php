<?php

namespace App\Http\Controllers;

use App\Models\Novedad; // Importa el modelo Novedad
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Para depuración

class NovedadController extends Controller
{
    /**
     * Muestra una lista de todas las novedades publicadas.
     */
    public function index()
    {
        Log::info('--- Iniciando NovedadController@index ---');

        // Obtener todas las novedades que están publicadas, ordenadas por fecha de publicación descendente
        $novedades = Novedad::where('publicado', true)
                            ->orderBy('fecha_publicacion', 'desc')
                            ->get();

        Log::info('Novedades encontradas para la vista de listado: ' . $novedades->count());
        if ($novedades->isEmpty()) {
            Log::warning('No se encontraron novedades publicadas para la página de novedades.');
        }

        // Pasa las novedades a la vista
        return view('web.novedades', compact('novedades'));
    }

    /**
     * Muestra el detalle de una novedad específica por su slug.
     */
    public function show($slug)
    {
        Log::info('--- Iniciando NovedadController@show para slug: ' . $slug . ' ---');

        // Busca la novedad por slug y que esté publicada
        $novedad = Novedad::where('slug', $slug)
                          ->where('publicado', true)
                          ->firstOrFail(); // firstOrFail lanzará 404 si no la encuentra

        Log::info('Novedad encontrada: ' . $novedad->titulo);

        // Pasa la novedad a la vista de detalle
        return view('web.novedad-detalle', compact('novedad'));
    }
}
