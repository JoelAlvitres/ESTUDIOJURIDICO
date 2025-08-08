<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use Illuminate\Support\Str;

class ProfesionalController extends Controller
{
    public function show($slug)
    {
        $profesional = Profesional::where('slug', $slug)
                        ->where('publicado', true)
                        ->firstOrFail();

        // Opcional: incrementar contador de visitas
        // $profesional->increment('visitas'); // Necesitarías agregar este campo a la migración

        return view('web.profesional.show', [
            'profesional' => $profesional,
            'metaTitle' => "{$profesional->nombre_completo} - {$profesional->cargo}",
            'metaDescription' => Str::limit(strip_tags($profesional->biografia_corta), 160)
        ]);
    }
}