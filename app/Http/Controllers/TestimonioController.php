<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonio; // Asegúrate de que el modelo está importado

class TestimonioController extends Controller
{
    /**
     * Muestra la vista con todos los testimonios.
     */
    public function index()
    {
        // Obtiene todos los registros de la tabla 'testimonios'
        // y los ordena por el más reciente
        $testimonios = Testimonio::latest()->get();

        // Retorna la vista 'web.testimonios.index' y le pasa la variable $testimonios
        return view('web.testimonios.index', ['testimonios' => $testimonios]);
    }

    /**
     * Almacena un nuevo testimonio en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validar los datos del formulario.
        // ¡HEMOS AÑADIDO 'cargo' A LA VALIDACIÓN!
        $validatedData = $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'comentario' => 'required|string',
            'cargo' => 'required|string|max:255', // Nuevo campo que tu base de datos ahora requiere
        ]);

        try {
            // 2. Crear un nuevo testimonio con TODOS los datos validados.
            // Esto asegura que el campo 'cargo' también se envíe a la base de datos.
            $testimonio = Testimonio::create($validatedData);

            // 3. Retornar el testimonio creado como una respuesta JSON.
            // Opcional: podrías redirigir a una vista en su lugar.
            return response()->json($testimonio, 201); // 201 es el código de "Creado"
        } catch (\Exception $e) {
            // Manejar cualquier error de la base de datos.
            return response()->json(['error' => 'Hubo un problema al crear el testimonio: ' . $e->getMessage()], 500);
        }
    }
}
