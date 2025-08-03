<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Novedad;
use App\Models\Testimonio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebController extends Controller
{
    /**
     * Muestra la página de inicio.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // Obtiene las últimas 3 áreas de práctica.
        $ultimasAreas = Area::orderBy('created_at', 'desc')->take(3)->get();
        // Obtiene las 3 últimas novedades.
        $novedades = Novedad::orderBy('fecha_publicacion', 'desc')->take(3)->get();
        
        try {
            // Consulta para obtener los 3 últimos testimonios.
            $testimonios = Testimonio::orderBy('created_at', 'desc')->take(3)->get();
        } catch (\Exception $e) {
            // Si ocurre un error, registra el mensaje y devuelve una colección vacía.
            Log::error('Error al obtener testimonios: ' . $e->getMessage());
            $testimonios = collect(); 
        }

        return view('web.home', compact('ultimasAreas', 'novedades', 'testimonios'));
    }

    /**
     * Muestra la página "Nosotros".
     *
     * @return \Illuminate\View\View
     */
    public function nosotros()
    {
        return view('web.nosotros');
    }

    /**
     * Muestra la página "Contacto".
     *
     * @return \Illuminate\View\View
     */
    public function contacto()
    {
        return view('web.contacto');
    }
}
